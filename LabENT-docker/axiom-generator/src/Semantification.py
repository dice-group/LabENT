from .Axioms import AxiomGenerator
from .DataLoader import DataLoader

class Semantification:
    def __init__(self, data_df):

        #self.loader= DataLoader(data_path='../../axiom-uploads/labeled_entities.csv', config_path='.configuration.json')
        
        #self.config= self.loader.get_Configuration()

        #generate Axioms and save into OWL file (default format XML)
        self.axioms= AxiomGenerator(data_df)

if __name__ == "__main__":
    Semantification()