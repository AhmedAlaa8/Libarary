<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

$id = $_POST['id'];

if (!isset($_POST['is_exist'])) {

    $_POST['is_exist'] = "0";
}

update($conn, $_POST, 'books', $id);

header("location:/book");
