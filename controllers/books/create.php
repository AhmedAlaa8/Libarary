<?php

include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";


if ($_POST['user_id'] == 0) {
    header("location:/book");
} else {


    $x = insert($conn, 'books', $_POST);


    if ($x == true) {

        $_SESSION['su']['create'] = "enta azma";
    }
    header("location:/book_create");
}
