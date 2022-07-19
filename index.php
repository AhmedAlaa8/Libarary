<?php




if ($_SERVER['REQUEST_URI'] == "/admin") {

    include "./public/admin/index.php";
} elseif ($_SERVER['REQUEST_URI'] == "/user") {
    include "./public/admin/pages/users/index.php";
} elseif ($_SERVER['REQUEST_URI'] == "/user_create") {
    include "./public/admin/pages/users/create.php";
} elseif ($_SERVER['REQUEST_URI'] == "/user_edit") {
    include "./public/admin/pages/users/edit.php";
<<<<<<< HEAD
} elseif ($_SERVER['REQUEST_URI'] == "/book") {
    include "./public/admin/pages/books/index.php";
} elseif ($_SERVER['REQUEST_URI'] == "/book_create") {
    include "./public/admin/pages/books/create.php";
} elseif ($_SERVER['REQUEST_URI'] == "/book_edit") {
    include "./public/admin/pages/books/edit.php";
=======
>>>>>>> baa3e4eaefe0bc10aaba7f7ef7100e7da449c3c8
} else {
    include "./public/site/index.php";
}
