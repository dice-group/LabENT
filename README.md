# LabENT
This project employs a web application (dubb LabENT) for labelling entities in knowledge graphs that enable users to annotate selected entities based on clustering, then propagate the major type to all other entities within the same cluster. 



<p align="center">
<img src="screenshots/labENT1.png" width="800" height="400">
</p>
<p align="center">A Screenshoot of LabENT v.1</p>

---
## Docker:
> ### Build from docker-compose
Probably the easiest way to get started is by using the provided Docker image. From the project's root directory, the image can be built like so:
* `cd docker-wordpress`

Now the docker compose to build the LabENT project. This might takes few minutes to install and configure components: wordpress, PHP, and MySQL.
* `docker-compose -f 'docker-compose.yml'  -p 'wordpress' start` 

If you are using Docker Desktop for Mac, Linux or Windows, you can use in a web browser
* `http://localhost:8000` 

To login into Wordpress CMS, please go to 
* `http://localhost:8000/wp-logn.php`

> ### Build from docker-hub
Get a docker image of wordpress:
* `docker pull hamadazahera/wordpress-labent:latest` 

Get a docker image of mysql:
* `docker pull hamadazahera/mysql-latent:5.7`
---
## Aknowledgment: 
This project is configured to work as a part of DAIKIRI project pipeline for ontology learning and structured machine learning from industrial data. If you have any further questions or feedback, please feel free to contact `hamada.zahera@upb.de`





