DELETE FROM wordpress.annotationData;
LOAD DATA LOCAL INFILE '/docker-entrypoint-initdb.d/annotationData.csv'
INTO TABLE wordpress.annotationData 
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n' (ID,Triples,Types);