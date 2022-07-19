<?php


include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

$id = $_GET['id'];


delete($conn, $id, 'books');


header("location:/book");
