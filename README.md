# LabENT
This project employs a web application (dubb LabENT) for labelling entities in knowledge graphs that enable users to annotate selected entities based on clustering, then propagate the major type to all other entities within the same cluster. 



<p align="center">
<img src="screenshots/labENT1.png" width="800" height="400">
</p>
<p align="center">A Screenshoot of LabENT v.1</p>

---
## Docker:
> ### Build from docker-compose (recommended)
Probably the easiest way to get started is by using the provided Docker image. From the project's root directory, the image can be built like so:
* `cd labENT-docker`

Now the docker compose to build the LabENT project. This might takes few minutes to install and configure components: wordpress, PHP, and MySQL.
* `docker-compose up -d --build` 

If you are using Docker Desktop for Mac, Linux or Windows, you can use in a web browser
* `http://localhost:8000` 
---
## DAIKIRI Panel: How it works:

* <b>Load Data</b>:  `Input folder` contains a case study from BostonHouses dataset, in particular:
    * `sampleBoston.nt`: contains RDF triples in the following format: 
    ```
    <Event_1> <Feature_Category_6> <6_quantile_8> .
    <Event_1> <Feature_Category_7> <7_quantile_1> .
    <Event_2> <Feature_Category_5> <5_quantile_1> .
    <Event_2> <Feature_Category_6> <6_quantile_8> .
    <Event_3> <Feature_Category_2> <2_quantile_6> .
    <Event_3> <Feature_Category_3> <3_quantile_6> .
    ``` 
    * `clusteringOutput.csv`: contains the clustering results for the BostonHourse dataset in the following format: 
    ```
    EntityID ClusterID
    <Event_1> <Cluster_0>
    <Event_2> <Cluster_0>
    <Event_3> <Cluster_1>
    ```
<b> To process this data and load into LabENT demo, simply run:</b> `sh scripts.sh`

* <b>Annotate Button</b>: once the user click on, it presents the data (clusterID, set of triples) for labelling. The user should add the label in the last column in the presented table. Then, click on <i>Submit</i> button to save the data.

* <b>Export Button</b>: LabENT also allows to export the annotated data and download into your local machine.

* <b> Axiom Generator Button </b>: Once you click on, it calls the <i>Axiom-Generator</i> module that allows to upload two csv files: 1) labeled_data.csv, 2) clusteringOutput.csv; then generate the corresponding OWL ontology that can be download if you click on <b>Download Ontology</b> button. 

* <b>Upload Button</b>: You can edit the generated ontology e.g. using Protege and upload it back. The upload file will be located into 
`LabENT-docker/wp-content/uploads`
---
## Aknowledgment: 
This project is configured to work as a part of DAIKIRI project pipeline for ontology learning and structured machine learning from industrial data. If you have any further questions or feedback, please feel free to contact `hamada.zahera@upb.de`





