import pandas as pd
from random import choice
from string import ascii_lowercase,digits


def main():
    lympho_df=pd.read_csv("./lymphography.data")
    
    #define mapping dict to restore original values

    classes= {1:"Normal", 2:"Metastases", 3:"Malign-Lymph", 4:"Fibrosis"}
    lymphatics= {1:"normal", 2:"arched", 3:"deformed", 4:"displaced"}
    blockOfAffere= {1: "no", 2:"yes"}
    blockOfLymphC= {1: "no", 2:"yes"}
    BlockOfLymphS= {1: "no", 2:"yes"}
    ByPass= {1: "no", 2:"yes"}
    extravasates={1: "no", 2:"yes"}
    regenerationOF={1: "no", 2:"yes"}
    earlyUptakeIn={1: "no", 2:"yes"}
    changesInLym={1: "bean",2: "oval",3: "round"}
    defectInNode= {1:"no",2: "lacunar", 3:"lac. marginal", 4:"lac. central"}
    changesInNode= {1: "no",2: "lacunar",3: "lac. margin",4: "lac. central"}
    changesInstru={1:"no", 2:"grainy", 3:"drop-like", 4:"coarse", 5:"diluted"
                , 6:"reticular", 7:"stripped", 8:"faint" }
    specialForms= {1:"no", 2:"chalices", 3:"vesicles"}
    dislocationOf= {1: "no", 2:"yes"}
    exclusionOfNo= {1: "no", 2:"yes"}

    
    lympho_df['class'] = lympho_df['class'].map(lambda x: classes[x])
    lympho_df['exclusionOfNo'] = lympho_df['exclusionOfNo'].map(lambda x: exclusionOfNo[x])
    
    lympho_df['dislocationOf'] = lympho_df['dislocationOf'].map(lambda x: dislocationOf[x])
    lympho_df['specialForms'] = lympho_df['specialForms'].map(lambda x: specialForms[x])
    lympho_df['changesInstru'] = lympho_df['changesInstru'].map(lambda x: changesInstru[x])
    lympho_df['changesInNode'] = lympho_df['changesInNode'].map(lambda x: changesInNode[x])
    lympho_df['defectInNode'] = lympho_df['defectInNode'].map(lambda x: defectInNode[x])
    lympho_df['changesInLym'] = lympho_df['changesInLym'].map(lambda x: changesInLym[x])

    lympho_df['earlyUptakeIn'] = lympho_df['earlyUptakeIn'].map(lambda x: earlyUptakeIn[x])
    lympho_df['regenerationOF'] = lympho_df['regenerationOF'].map(lambda x: regenerationOF[x])
    lympho_df['extravasates'] = lympho_df['extravasates'].map(lambda x: extravasates[x])
    
    lympho_df['ByPass'] = lympho_df['ByPass'].map(lambda x: ByPass[x])
    lympho_df['BlockOfLymphS'] = lympho_df['BlockOfLymphS'].map(lambda x: BlockOfLymphS[x])
    lympho_df['blockOfLymphC'] = lympho_df['blockOfLymphC'].map(lambda x: blockOfLymphC[x])
    lympho_df['blockOfAffere'] = lympho_df['blockOfAffere'].map(lambda x: blockOfAffere[x])
    lympho_df['lymphatics'] = lympho_df['lymphatics'].map(lambda x: lymphatics[x])

    lympho_df['patient']=[''.join(choice(ascii_lowercase + digits) for _ in range(6)) for _ in range(len(lympho_df))]

    lympho_df.to_csv("./lymphograph-raw.csv", index=False, header=True)
if __name__=="__main__":
   main()