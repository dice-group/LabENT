from os import sep
import pandas as pd

def main():

    #clustering_df= pd.read_csv("Lymphography/lymphograph-raw.csv")
    #clustering_df= clustering_df[['patient', 'class']]
    #clusters= {"Normal": "cluster-4", "Metastases":"cluster-2", "Malign-Lymph":"cluster-1", "Fibrosis":"cluster-3"}
    #clustering_df['class']= clustering_df['class'].map(lambda x: clusters[x])
    #clustering_df.to_csv("Lymphography/clusteringOutput.csv", sep=" ",index=False, header=["patient", "cluster"])


    data_df= pd.read_csv("Lymphography/preprocessing/sampledLymphograph.csv", header=None, sep=",", lineterminator="$", index_col=False)
    data_df[0]=data_df[0].apply(lambda x: x.replace("\n", "").strip())
    data_df[1]=data_df[1].apply(lambda x: x.replace("<", "&lt;").replace(">", "&gt;"))
    
    data_df.to_csv("Lymphography/annotationData.csv", line_terminator="||", index=False,header=None)


   

if __name__=="__main__":
    main()

   
