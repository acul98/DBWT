<?php



function db_select_benutzer() {
    $link = connectdb();

    $sql = "SELECT * FROM benutzer";
    $result = mysqli_query($link, $sql);

    $data = mysqli_fetch_all($result, MYSQLI_BOTH);

    mysqli_close($link);
    return $data;
}

function anzahlanmeldungen($id) {

    $link = connectdb();
    mysqli_begin_transaction($link);
    $sql = "CALL anzahlanmedlungen('$id')";

    mysqli_query($link, $sql);
    mysqli_commit($link);
    mysqli_close($link);


}

function id_finden($email) {

    $link = connectdb();
    mysqli_begin_transaction($link);

    $sql="SELECT id FROM benutzer WHERE email = '$email'";

    $result = mysqli_query($link, $sql);

    $id = mysqli_fetch_row($result);

    mysqli_commit($link);

    mysqli_close($link);

    return $id[0];
}
