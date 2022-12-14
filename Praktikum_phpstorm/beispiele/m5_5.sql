CREATE PROCEDURE anzahlanmedlungen (IN id_benutzer INTEGER)
BEGIN
UPDATE benutzer SET anzahlanmeldungen = anzahlanmeldungen + 1 WHERE id = id_benutzer;
end;