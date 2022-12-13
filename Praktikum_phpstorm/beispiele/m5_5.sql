CREATE PROCEDURE anzahlanmedlungen (IN email_db VARCHAR (80))
BEGIN
    UPDATE benutzer SET anzahlanmeldungen += 1 WHERE id = id_benutzer;
end;

