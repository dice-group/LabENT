import pandas as pd

import argparse

def preprocessingInput(entities_df, clustering_df, output_file="./annotationData.csv"): 

    # drop last column which contains (.)
    entities_df = entities_df.iloc[:, :-1]
    grouped_entities_df= entities_df.groupby(0) 

    output_data= {}
    output_df= pd.DataFrame()

    for entity_id, row in clustering_df.iterrows():        
        triples= grouped_entities_df.get_group(entity_id).values.tolist()
        rdf_list=[]
        for value in triples:
            rdf_triple= "||".join([entity_id]+value).replace(">","").replace("<","")
            rdf_list.append(rdf_triple)

        rdf_triples=" <br> ".join(rdf_list)
        
        cluster_id= row[0][1:-1]

        if cluster_id in output_data:
            output_data[cluster_id]=output_data[cluster_id]+"<br>"+rdf_triples
        else:
            output_data[cluster_id]=rdf_triples
        
    output_df['clusterID']= list(output_data.keys())
    output_df['triples']= output_data.values()
    output_df['type']= ""

    output_df.to_csv(output_file, header=None, index=False)


def main():

    # creating an ArgumentParsert object
    parser = argparse.ArgumentParser()

    parser.add_argument('--triples_data', default="./sampledBoston.nt",help="Path of input file, entity triples")
    parser.add_argument('--clustering_data', default="./clusteringOutput.csv", help="specify the path of clustering file")
    parser.add_argument('--output_file', default="./annotationData.csv")

    args = parser.parse_args()

    entities_df= pd.read_csv(args.triples_data, sep=" ", header=None, index_col=0)
    clustering_df= pd.read_csv(args.clustering_data, sep=" ", header=0, index_col=0)
    
    preprocessingInput(entities_df, clustering_df, args.output_file)


if __name__=="__main__":
   main()