<?php


include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/frontFunc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";

$id = $_POST['id'];

$users = select($conn, 'users');
$book = selectwhere($conn, 'books', $id)[0];




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

        <?php if (isset($_SESSION['su']['create'])) : ?>


            <div class="alert alert-success" role="alert">
                <?= $_SESSION['su']['create'] ?>
            </div>

        <?php endif ?>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-11 ml-5 my-5">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="/controllers/books/update.php" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="<?= $book['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">name</label>
                                    <input type="text" value="<?= $book['name'] ?>" class="form-control" name="name" id="name">

                                    <?php if (isset($_SESSION['errors']['name'])) : ?>

                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['errors']['name'] ?>
                                        </div>

                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="receipt	">receipt</label>
                                    <input type="date" value="<?= $book['receipt'] ?>" class="form-control" name="receipt">

                                    <?php if (isset($_SESSION['errors']['name'])) : ?>

                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['errors']['name'] ?>
                                        </div>

                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="back">back</label>
                                    <input type="date" value="<?= $book['back'] ?>" class="form-control" name="back">

                                    <?php if (isset($_SESSION['errors']['name'])) : ?>

                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['errors']['name'] ?>
                                        </div>

                                    <?php endif ?>
                                </div>


                                <div class="form-group">
                                    <label for="phone">phone</label>
                                    <input type="text" value="<?= $book['phone'] ?>" class="form-control" name="phone">

                                    <?php if (isset($_SESSION['errors']['name'])) : ?>

                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['errors']['name'] ?>
                                        </div>

                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <select name="user_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option selected value="0">اختر</option>

                                        <?php foreach ($users as $key => $user) : ?>


                                            <option <?= $user['id'] == $book['user_id'] ? "selected" : "" ?> value="<?= $user['id'] ?>"><?= $user['name'] ?></option>


                                        <?php endforeach  ?>

                                    </select>
                                </div>


                                <div class="form-check">
                                    <input type="checkbox" <?= $book['is_exist'] == 1 ? "checked" : "" ?> value="1" name="is_exist" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">is_exist</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
    </section>

</div>
</div>




<!-- footer -->
<?php include layouts("footer.php") ?>
<!-- footer -->

<?php
unset($_SESSION['errors'], $_SESSION['su']);
?>