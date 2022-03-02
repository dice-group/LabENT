import pandas as pd

def main():

    data_df= pd.read_csv("Lymphography/preprocessing/sampled-lymphograph-triples.csv", header=None, sep=",", lineterminator="$",index_col=False)
    data_df[0]=data_df[0].apply(lambda x: x.replace("\n", ""))
    data_df[1]=data_df[1].apply(lambda x: x.replace("<", "&lt;").replace(">", "&gt;&nbsp;&nbsp;").replace(" .", " <br> "))
    
    data_df.to_csv("Lymphography/preprocessing/annotationData.csv", line_terminator="||", index=False,header=None)


if __name__=="__main__":
    main()

   
