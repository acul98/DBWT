CREATE TABLE bewertungen
(bewertungs_id INT8 PRIMARY KEY AUTO_INCREMENT,
 bemerkung VARCHAR(200) NOT NULL,
 bewertungszeitpunkt DATETIME,
 hervorgehoben BOOLEAN NOT NULL DEFAULT false,
 sternebwertung VARCHAR(80) NOT NULL,
);


ALTER TABLE bewertungen
   ADD CONSTRAINT b_id_ref_benutzer_id
      FOREIGN KEY ()