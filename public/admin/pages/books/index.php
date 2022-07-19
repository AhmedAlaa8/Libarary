<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/frontFunc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";


// $books =  select($conn, "books");

$query = "SELECT users.name as uname , books.id ,books.name , books.user_id , books.receipt ,books.back,books.phone,books.is_exist FROM users JOIN books on users.id = books.user_id";

$x = mysqli_query($conn, $query);

$books = mysqli_fetch_all($x, 1);




?>

<?php include layouts("header.php"); ?>


<!-- Navbar -->
<?php include layouts("nav.php") ?>
<!-- /.navbar -->

<!-- asoide -->
<?php include layouts("aside.php") ?>
<!-- asoide -->


<div class="content-wrapper">

    <div class="content-header">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> id</th>
                                            <th>name</th>
                                            <th>receipt(s)</th>
                                            <th>back</th>
                                            <th>phone</th>
                                            <th>user</th>
                                            <th>is_exist</th>
                                            <th>D&E</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($books as $key => $book) : ?>



                                            <tr>
                                                <td><?= $book['id'] ?></td>
                                                <td><?= $book['name'] ?> </td>
                                                <td><?= $book['receipt'] ?></td>
                                                <td> <?= $book['back'] ?></td>
                                                <td><?= $book['phone'] ?></td>
                                                <td><?= $book['uname'] ?></td>

                                                <?php
                                                if ($book['is_exist'] == 1) {
                                                    echo "<td class='text-primary' > موجود </td>";
                                                } else {
                                                    echo "<td class='text-warning'> غير موجود </td>";
                                                }
                                                ?>





                                                <td>

                                                    <a class="btn btn-danger " href="/controllers/books/delete.php?id=<?= $book['id'] ?>"> Delete</a>

                                                    <form action="book_edit" method="post">

                                                        <input type="hidden" value="<?= $book['id'] ?>" name="id">

                                                        <button type="submit" class="btn btn-info my-2">Edit</button>

                                                    </form>



                                                </td>
                                            </tr>
                                        <?php endforeach ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th> id</th>
                                            <th>name</th>
                                            <th>receipt(s)</th>
                                            <th>back</th>
                                            <th>phone</th>
                                            <th>user</th>
                                            <th>is_exist</th>
                                            <th>D&E</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
            </div>

        </section>


        <!-- footer -->
        <?php include layouts("footer.php") ?>
        <!-- footer -->