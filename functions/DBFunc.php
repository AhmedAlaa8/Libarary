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

    $password = $arr['password'];

    if ($arr['name'] == "") {

        $_SESSION['errors']['name'] = "enta homar";
        header("location:/user_create");
    } elseif (empty($arr['email'])) {
        $_SESSION['errors']['email'] = "email is empty";
        header("location:/user_create");
    } elseif (preg_match("/^[a-zA-Z1-9' ]*$/", $password)) {
        $_SESSION['errors']['password'] = "password is empty";
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

    if (isset($_FILES)) {

        $nameimage = $_FILES['image']['name'];

        $tmp_name = $_FILES['image']['tmp_name'];

        $type =  explode(".", $nameimage);

        $type =  end($type);

        if ($type == "jpg" || $type == "png" || $type == "jpeg") {

            $rand = rand(100, 1000000);

            $name = 'users' . $rand . "." . $type;


            move_uploaded_file($tmp_name, "../../public/admin/pages/image/$name");
            return $name;
        }
    } else {
        $_SESSION['errors']['image'] = "enta homar";
        return false;
    }
}

function select($conn, $table_name)
{

    $query = "SELECT * FROM `$table_name`";
    $x = mysqli_query($conn, $query);
    return mysqli_fetch_all($x, 1);
}

function selectwhere($conn, $table_name, $id)
{

    $query = "SELECT * FROM `$table_name` WHERE id = $id";
    $x = mysqli_query($conn, $query);
    return mysqli_fetch_all($x, 1);
}

function delete($conn, $id)
{

    $query = "DELETE FROM users WHERE `id` = $id";
    mysqli_query($conn, $query);
}

function update($conn, $arr, $table_name, $id, $image = null, $nameColameImageInData = null)
{


    $z = "";

    foreach ($arr as $key => $value) {


        $x = "`" . $key . "`" . "=" . "'" . $value . "'" . ",";

        $z .= $x;
    }

    $z = rtrim($z, ",");


    if ($image == null) {
        $query = " UPDATE $table_name SET $z  WHERE `id` = $id";
    } else {
        $query = " UPDATE $table_name SET $z,`$nameColameImageInData`='$image'  WHERE `id` = $id";
    }



    mysqli_query($conn, $query);
}
