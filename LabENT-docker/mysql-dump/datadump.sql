CREATE TABLE IF NOT EXISTS wordpress.annotationData (
`ID` VARCHAR(11) NOT NULL,
`Triples` TEXT NOT NULL, 
`Types` VARCHAR(50));

DELETE FROM wordpress.annotationData;
LOAD DATA LOCAL INFILE '/docker-entrypoint-initdb.d/annotationData.csv'
INTO TABLE wordpress.annotationData 
FIELDS TERMINATED BY ','
LINES TERMINATED BY '||' (ID,Triples,Types);
