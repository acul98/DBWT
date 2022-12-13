use emensawerbeseite;

CREATE VIEW view_suppengerichte AS
    SELECT * FROM gericht WHERE name LIKE '%suppe%';

CREATE VIEW view_anmeldungen AS
    SELECT anzahlanmeldungen, name FROM benutzer ORDER BY anzahlanmeldungen DESC;

CREATE VIEW view_kategoriegerichte_vegetarisch AS
    SELECT k.name, g.id, g.name AS Gericht FROM kategorie k
    LEFT JOIN gericht g ON k.id = g.id
    WHERE g.vegetarisch = '1';
    RIGHT JOIN gericht g ON k.id = g.id
    WHERE g.vegetarisch = '1';


