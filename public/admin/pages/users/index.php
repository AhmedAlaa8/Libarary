<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/frontFunc.php";
include $_SERVER['DOCUMENT_ROOT'] . "/functions/DBFunc.php";


$users =  select($conn, "users");




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
                                            <th>email(s)</th>
                                            <th>password</th>
                                            <th>image</th>
                                            <th>is_admin</th>
                                            <th>D&E</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($users as $key => $user) : ?>



                                            <tr>
                                                <td><?= $user['id'] ?></td>
                                                <td><?= $user['name'] ?> </td>
                                                <td><?= $user['email'] ?></td>
                                                <td> <?= $user['password'] ?></td>

                                                <td><img style="width: 100px ; height:100px" src="/public/admin/pages/image/<?= $user['image'] ?>" alt=""></td>

                                                <?php
                                                if ($user['is_admin'] == 1) {
                                                    echo "<td class='text-primary' > Admin </td>";
                                                } else {
                                                    echo "<td class='text-warning'> User </td>";
                                                }
                                                ?>





                                                <td>

                                                    <a class="btn btn-danger " href="/controllers/users/delete.php?id=<?= $user['id'] ?>"> Delete</a>

                                                    <form action="user_edit" method="post">

                                                        <input type="hidden" value="<?= $user['id'] ?>" name="id">

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
                                            <th>email(s)</th>
                                            <th>password</th>
                                            <th>image</th>
                                            <th>is_admin</th>
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