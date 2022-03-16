<?php require_once "../includes/db.php"?>
<?php require_once "../includes/functions.php"?>
<?php
$users=show_user($connection);

?>
<?php require_once 'head.blade.php' ?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php require_once 'header.blade.php' ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
       <?php require_once "sidebar.blade.php" ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           <?php require_once "header_desktop.blade.php" ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <section class="p-2">

                            <?php if (!empty($errors)) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach ($errors as $error) : ?>
                                        <div><?php echo $error ?></div>

                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Example Form</div>
                                <div class="card-body card-block">
                                    <form action="../includes/manage_users.php" method="post" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Username</div>
                                                <input type="text" id="username3" name="username" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Email</div>
                                                <input type="email" id="email3" name="email" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">Password</div>
                                                <input type="password" id="password3" name="password" class="form-control">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-asterisk"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>date of creation</th>
                                                <th>img</th>
                                                <th>user name</th>
                                                <th>user email</th>
                                                <th>user password</th>
                                                <th>edit/delete</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach ($users as $user) :
                                            if(isset($_GET['user_id'])){
                                                if($user['user_id']===$_GET['user_id']){
                                                    ?>
                                                    <form action="../includes/update_user.php" method="post">
                                                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']?>">
                                                        <tr>
                                                            <td><input class="form-control update_field" name="date_created" type="text" value="<?php echo $user["date_created"]?>"></td>
                                                            <td><i class='fa fa-user-shield update_field'></i></td>
                                                            <td><input class="form-control update_field" name="user_name" type="text" value="<?php echo $user["user_name"]?>"></td>
                                                            <td><input class="form-control update_field" name="user_email" type="text" value="<?php echo $user["user_email"]?>"></td>
                                                            <td><input class="form-control update_field" name="user_password" type="text" value="<?php echo "******"?>"></td>

                                                            <td >
                                                                <div class="table-data-feature">

                                                                    <button class="item" data-toggle="tooltip"
                                                                            type="submit" name="submit_update" data-placement="top" title="Edit">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>




                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </form>

                                                    <?php
                                                }
                                            }
                                            $user_id=$_GET['user_id']??null;
                                            if($user['user_id']!==$user_id){
                                            ?>

                                            <tr>
                                                <td><?php echo $user["date_created"]?></td>
                                                <td><i class='fa fa-user-shield'></i></td>
                                                <td><?php echo $user["user_name"]?></td>
                                                <td><?php echo$user["user_email"]?></td>
                                                <td><?php echo "*****"?></td>
                                                <td >
                                                    <div class="table-data-feature">
                                                        <a href="manage_users.php?user_id=<?php echo $user['user_id']?>" class="item" data-toggle="tooltip"
                                                           data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <form action="../includes/user_delete.php" method="post">
                                                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']?>">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>


                                                <?php    echo"</tr>";
                                                }
                                                endforeach;
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php require_once 'footer.blade.php' ?>
                            <script src="js/script.js"></script>
</body>

</html>
<!-- end document-->
