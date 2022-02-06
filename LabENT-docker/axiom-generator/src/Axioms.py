from vectograph.transformers import GraphGenerator
from vectograph.quantizer import QCUT
import pandas as pd

from rdflib import Namespace, URIRef, Graph, plugin
from rdflib.namespace import RDF
from sklearn import datasets

from rdflib import URIRef, BNode, Literal
from rdflib.serializer import Serializer
import os



## file Upload
OUT_FOLDER = "../uploads" #os.path.join(path, 'uploads')

if not os.path.isdir(OUT_FOLDER):
    os.mkdir(OUT_FOLDER)

class AxiomGenerator: 

    def __init__(self, data_df):
        
        data = Namespace("http://www.daikiri-semantification.org#")

        self.X_transformed = QCUT(min_unique_val_per_column=6, num_quantile=5).transform(pd.DataFrame(data_df))

        # Add prefix
        self.X_transformed.index = 'Onto' + self.X_transformed.index.astype(str)
        self.kg = GraphGenerator().transform(self.X_transformed)

        self.RDF_graph = Graph()
        for sub, pred, obj in self.kg:
            nSubj= URIRef(sub)
            predURI=URIRef(pred)
            nObj=BNode(obj)

            self.RDF_graph.add( (nSubj, predURI, nObj) )            
        #write attempt
        file = open(OUT_FOLDER+'/semantification-ontology.owl', mode="wb")
        file.write(self.RDF_graph.serialize(format='n3', indent=4))
        file.close()
        print('OWL ontology is successfully generated!')

        
