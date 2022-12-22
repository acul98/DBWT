CREATE TABLE bewertungen
(bewertungs_id INT8 PRIMARY KEY,
 bemerkung VARCHAR(200) NOT NULL,
 bewertungszeitpunkt DATETIME,
 hervorgehoben BOOLEAN NOT NULL DEFAULT false,
 sternebwertung VARCHAR(80) NOT NULL
);





Drop TABLE bewertungen;

ALTER TABLE bewertungen
   ADD CONSTRAINT bewerungen_id_ref_benutzer_id
      FOREIGN KEY (bewertungs_id) REFERENCES benutzer(id);