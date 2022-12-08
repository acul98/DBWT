<?php

function db_select_password_user() {
    $link = connectdb();

    $sql = "SELECT passwort FROM benutzer";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

function db_select_email_user() {
    $link = connectdb();

    $sql = "SELECT email FROM benutzer";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;

}