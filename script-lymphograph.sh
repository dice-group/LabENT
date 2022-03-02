python3 Lymphography/preprocessing/preprocessing.py
mv Lymphography/preprocessing/annotationData.csv LabENT-docker/mysql-dump/annotationData.csv

# send data to LabENT demo
cd LabENT-docker/mysql-dump
cat datadump.sql | docker exec -i labent-docker_db_1 mysql --host 0.0.0.0 --port 3306 -uroot -pwordpress wordpress

chown www-data:www-data -R LabENT/LabENT-docker/wp-content


