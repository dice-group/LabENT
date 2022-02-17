DELETE From wordpress.entitylabels;
LOAD DATA LOCAL INFILE '/docker-entrypoint-initdb.d/entity-labels.csv'
INTO TABLE wordpress.entitylabels 
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n' (entityID,EntityTriples,eType);