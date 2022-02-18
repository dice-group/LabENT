import os
from owlready2 import *

## file Upload
OUT_FOLDER = "uploads"

if not os.path.isdir(OUT_FOLDER):
    os.mkdir(OUT_FOLDER)

class AxiomGenerator:

    def __init__(self, reader):
        onto = get_ontology("http://daikiri-semantificaion.de/onto.owl")
        with onto:
            for id_, type_ in reader:
                type_ = Thing
                Class = types.new_class(id_, (type_,))

            onto.save(OUT_FOLDER+'/semantification-ontology.owl')

        

