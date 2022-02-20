# preprocessing input file
cd Input
python3 preprocessing.py

# move the output file into the mount volume of mysql container to be
# loaded into the database
cd ..
mv Input/annotationData.csv labENT-docker/mysql-dump/annotationData.csv

# send data to LabENT demo
cd LabENT-docker/mysql-dump
cat datadump.sql | docker exec -i labent-docker-db-1 mysql --host 0.0.0.0 --port 3306 -uroot -pwordpress wordpress

