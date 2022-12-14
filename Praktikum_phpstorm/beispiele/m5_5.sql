CREATE PROCEDURE anzahlanmedlungen (IN email_db VARCHAR (80))
BEGIN
UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen+1 WHERE email = email_db;
end;


CREATE PROCEDURE anzahlanmedlungen (IN id_benutzer INTEGER)
BEGIN
UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen + 1 WHERE id = id_benutzer;
end;