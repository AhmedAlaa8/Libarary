<?php

session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

if (image() == false) {

    $_SESSION['errors']['name'] = "enta homar";


    header("location:/user_create");
} else {

    $x = insertToImage($conn, 'users', $_POST, image(), 'image');



    if ($x == true) {

        $_SESSION['su']['create'] = "enta azma";
    }
    header("location:/user_create");
}
