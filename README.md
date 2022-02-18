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

* <b>Load Data</b>: LabENT demo allows to load input from csv file, simple add your file into 
`LabENT-docker/mysql-dump/`. The input file should have the following format: 
* * `clusterId,tripes,` triples is a list of rdf data in format 
`|subject|predicate|object|<br>|subject|predicate|object|`  
* <b>Annotate Button</b>: once the user click on, it presents the data (clusterID, set of triples) for labelling. The user should add the label in the last column in the presented table. Then, click on <b>Submit</b> button to save the data.

* <b>Export Button</b>: LabENT also allows to export the annotated data and download into your local machine.

* <b> Axiom Generator Button </b>: Once you click on, it calls the <b>Axiom-Generator</b> module that allows to upload a csv and convert it into an OWL ontology. Each row in the csv file should have the following format:
`ClusterID,Type`. You can also download the generated ontology if you click on <b>Download Ontology</b> button. 

* <b>Upload Button</b>: You can edit the generated ontology e.g. using Protege and upload it back. The upload file will be located into 
`LabENT-docker/wp-content/uploads`
---
## Aknowledgment: 
This project is configured to work as a part of DAIKIRI project pipeline for ontology learning and structured machine learning from industrial data. If you have any further questions or feedback, please feel free to contact `hamada.zahera@upb.de`





