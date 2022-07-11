<?php




if ($_SERVER['REQUEST_URI'] == "/admin") {

    include "./public/admin/index.php";
} elseif ($_SERVER['REQUEST_URI'] == "/user") {
    include "./public/admin/pages/users/index.php";
} elseif ($_SERVER['REQUEST_URI'] == "/user_create") {
    include "./public/admin/pages/users/create.php";
} else {
    include "./public/site/index.php";
}
