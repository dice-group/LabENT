from sys import prefix
import pandas as pd #for handling csv and csv contents
from rdflib import Graph, Literal, URIRef, Namespace #basic RDF handling


class RDFConverter: 

    def __init__(self, path="Lymphography/preprocessing/lymphograph-raw.csv"):

        df=pd.read_csv(path, sep=",", index_col=0)

        g = Graph(base="http://www.daikiri.cc/lymphography#") 
        
        schema = Namespace('http://www.daikiri.cc/lymphography#')
        g.namespace_manager.bind('schm', schema)
        ppl = Namespace('http://daikiri.cc/people/')
        g.namespace_manager.bind('ppl', ppl)

        g.bind('schm', schema)
        g.bind('ppl', ppl)   

        col_names= df.columns.values

        for index, row in df.iterrows():
            for col in col_names: # use column name as predicate, cell value as an object.
                g.add((URIRef(index), URIRef(schema+col), Literal(row[col])))

            
        #write attempt
        g.serialize('Lymphography/preprocessing/lymphograph-triples.nt', format='nt')
        g.serialize('Lymphography/preprocessing/lymphograph-triples.xml', format='xml')


def main():

    RDFConverter()

if __name__=="__main__":
    main()
