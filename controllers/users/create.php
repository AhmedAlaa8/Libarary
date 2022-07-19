<?php

include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

if (image() == false) {
    header("location:/user");
} else {

    $x = insertToImage($conn, 'users', $_POST, image(), 'image');



    if ($x == true) {

        $_SESSION['su']['create'] = "enta azma";
    }
    header("location:/user_create");
}
