<?php

include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

insertToImage($conn, 'users', $_POST, image('users'), 'image');
header("location:/user_create");
