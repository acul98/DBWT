use emensawerbeseite;

CREATE VIEW view_suppengerichte AS
    SELECT * FROM gericht WHERE name LIKE '%suppe%';

CREATE VIEW view_anmeldungen AS
    SELECT anzahlanmeldungen, name FROM benutzer ORDER BY anzahlanmeldungen DESC;



CREATE VIEW `view1_kategoriegerichte_vegetarisch` AS
SELECT kategorie.name AS Kategorie, gericht.name AS Vegetarische_Gerichte FROM kategorie
LEFT JOIN gericht_hat_kategorie ON kategorie.id = gericht_hat_kategorie.kategorie_id                                                                                  left join gericht on gericht_hat_kategorie.gericht_id = gericht.id
WHERE gericht.vegetarisch = 1 OR gericht_hat_kategorie.kategorie_id IS NULL
UNION
SELECT kategorie.name AS Kategorie, gericht.name AS Vergetarische_Gerichte FROM kategorie
LEFT JOIN gericht_hat_kategorie ON kategorie.id = gericht_hat_kategorie.kategorie_id
RIGHT JOIN gericht ON gericht_hat_kategorie.gericht_id = gericht.id
WHERE gericht.vegetarisch = 1;
