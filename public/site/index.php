<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";

include $_SERVER['DOCUMENT_ROOT'] . "/functions/frontFunc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

$books = select($conn, 'books');



?>

<?php include sitelayouts("hedder.php"); ?>
<?php include sitelayouts("site.php"); ?>
<?php include sitelayouts("footer.php"); ?>

