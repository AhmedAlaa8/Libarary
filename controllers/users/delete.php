<?php


include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

$id = $_GET['id'];

<<<<<<< HEAD
delete($conn, $id, 'users');
=======
delete($conn, $id);
>>>>>>> baa3e4eaefe0bc10aaba7f7ef7100e7da449c3c8

header("location:/user");
