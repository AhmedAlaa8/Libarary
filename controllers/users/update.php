<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

$id = $_POST['id'];

if (!isset($_POST['is_admin'])) {

    $_POST['is_admin'] = "0";
}

update($conn, $_POST, 'users', $id, image(), 'image');

header("location:/user");
