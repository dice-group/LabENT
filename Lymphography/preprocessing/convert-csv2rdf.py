import pandas as pd #for handling csv and csv contents
from rdflib import Graph, Literal, URIRef, Namespace #basic RDF handling


schema = Namespace('http://www.example.org/lymphography#')
ppl = Namespace('http://example.org/people/')


df=pd.read_csv("preprocessing/lymphograph-raw.csv",sep=",")

g = Graph()

for index, row in df.iterrows():

    g.add((URIRef(ppl+row['patient']), URIRef(schema+'exclusionOfNo'), Literal(row['exclusionOfNo']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'dislocationOf'), Literal(row['dislocationOf']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'lymphatics'), Literal(row['lymphatics']) ))

    g.add((URIRef(ppl+row['patient']), URIRef(schema+'blockOfLymphC'), Literal(row['blockOfLymphC']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'blockOfAffere'), Literal(row['blockOfAffere']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'BlockOfLymphS'), Literal(row['BlockOfLymphS']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'ByPass'), Literal(row['ByPass']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'extravasates'), Literal(row['extravasates']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'regenerationOF'), Literal(row['regenerationOF']) ))

    g.add((URIRef(ppl+row['patient']), URIRef(schema+'earlyUptakeIn'), Literal(row['earlyUptakeIn']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'changesInLym'), Literal(row['changesInLym']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'defectInNode'), Literal(row['defectInNode']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'changesInNode'), Literal(row['changesInNode']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'changesInstru'), Literal(row['changesInstru']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'specialForms'), Literal(row['specialForms']) ))

    g.add((URIRef(ppl+row['patient']), URIRef(schema+'lymNodesEnlar'), Literal(row['lymNodesEnlar']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'lymNodesdimin'), Literal(row['lymNodesdimin']) ))
    g.add((URIRef(ppl+row['patient']), URIRef(schema+'numOfNodes'), Literal(row['numOfNodes']) ))
    

#write attempt
g.serialize('preprocessing/lymphograph-triples.rdf', format='xml')
