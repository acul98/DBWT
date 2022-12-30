CREATE TABLE bewertungen
(bewertungs_id INT8 NOT NULL,
 bemerkung VARCHAR(200) NOT NULL,
 bewertungszeitpunkt DATETIME,
 hervorgehoben BOOLEAN NOT NULL DEFAULT false,
 sternebewertung VARCHAR(80) NOT NULL,
 gericht_id INT8 NOT NULL
);

CREATE UNIQUE INDEX bewertungen_index
    ON bewertungen (bewertungs_id, gericht_id);



Drop TABLE bewertungen;

ALTER TABLE bewertungen
   ADD CONSTRAINT bewerungen_id_ref_benutzer_id
      FOREIGN KEY (bewertungs_id) REFERENCES benutzer(id);

ALTER TABLE bewertungen
    ADD CONSTRAINT bewgericht_id_ref_gericht_id
        FOREIGN KEY (gericht_id) REFERENCES gericht(id);