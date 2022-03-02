CREATE TABLE IF NOT EXISTS wordpress.dummy (
`ID` VARCHAR(11) NOT NULL,
`Triples` TEXT NOT NULL, 
`Types` VARCHAR(50)) ENGINE=myISAM;

DROP TABLE IF EXISTS wordpress.annotationData;

RENAME TABLE wordpress.dummy TO wordpress.annotationData;

DELETE FROM wordpress.annotationData;
LOAD DATA LOCAL INFILE '/docker-entrypoint-initdb.d/annotationData.csv'
INTO TABLE wordpress.annotationData 
FIELDS TERMINATED BY ','
LINES TERMINATED BY '||' (ID,Triples,Types);
