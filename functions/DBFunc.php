<?php

session_start();


$conn = mysqli_connect("localhost", "root", "", "Library");

function insert($conn, $tablename, array $arr)
{

    $z = "";
    $n = "";

    foreach ($arr as $key => $value) {

        $x = "`" . $key . "`" . ",";
        $z .= $x;
        $c = "'" . $value . "'" . ",";
        $n .= $c;
    }

    $z = rtrim($z, ",");
    $n = rtrim($n, ",");


    $query = "INSERT INTO $tablename($z) VALUES ($n)";


    return mysqli_query($conn, $query);
}

function insertToImage($conn, $tablename, array $arr, $image, $nameColameImageInData)
{


    if ($arr['name'] == "") {

        $_SESSION['errors']['name'] = "enta homar";
        header("location:/user_create");
    }

    $z = "";
    $n = "";

    foreach ($arr as $key => $value) {

        $x = "`" . $key . "`" . ",";
        $z .= $x;
        $c = "'" . $value . "'" . ",";
        $n .= $c;
    }

    $z = rtrim($z, ",");
    $n = rtrim($n, ",");


    $query = "INSERT INTO $tablename(`$nameColameImageInData`,$z) VALUES ('$image',$n)";


    return mysqli_query($conn, $query);
}


function image()
{


    $nameimage = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    $type =  explode(".", $nameimage);

    $type =  end($type);

    if ($type == "jpg" || $type == "png" || $type == "jpeg") {

        $rand = rand(100, 1000000);

        $name = 'users' . $rand . "." . $type;


        move_uploaded_file($tmp_name, "../../public/admin/pages/image/$name");
    }

    return $name;
}
