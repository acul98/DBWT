<?php



function db_select_benutzer() {
    $link = connectdb();

    $sql = "SELECT * FROM benutzer";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

