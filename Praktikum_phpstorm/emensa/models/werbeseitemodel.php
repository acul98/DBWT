<?php

function Gerichteausgabe()
{
    $link = connectdb();

    $tabelle = "SELECT g.id, g.bildname, g.name, preis_extern, preis_intern, group_concat(gha.code) AS acode, group_concat(a.name) AS aname   
                      FROM gericht_hat_allergen gha
                      RIGHT JOIN gericht g ON g.id = gha.gericht_id
                      LEFT JOIN allergen a ON a.code = gha.code
                      GROUP BY g.name ORDER BY 'ASC' LIMIT 5 ;";


    $result = mysqli_query($link, $tabelle);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}



