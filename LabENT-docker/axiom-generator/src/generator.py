import os
from owlready2 import *

## file Upload
OUT_FOLDER = "uploads"

if not os.path.isdir(OUT_FOLDER):
    os.mkdir(OUT_FOLDER)

class AxiomGenerator:

    def __init__(self, reader_file1, reader_file2):
        onto = get_ontology("http://daikiri-semantificaion.de/onto.owl")

        classes= {}

        with onto:
            for id_, type_ in reader_file1:
                parent = Thing
                Class = types.new_class(type_, (parent,))
                classes[id_]= Class
            
            for entity_id, cluster_id in reader_file2:
                # assign each entity it's cluster type
                individual= classes[cluster_id[1:-1]](entity_id[1:-1])

            onto.save(OUT_FOLDER+'/semantification-ontology.owl')

        

        

