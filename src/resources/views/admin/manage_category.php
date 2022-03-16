<?php require_once"../includes/functions.php" ?>
<?php require_once"../includes/db.php" ?>
<?php
$categories=show_category($connection);
?>
<?php require_once 'head.blade.php' ?>
<body class="animsition">
    <div class="page-wrapper">
      <?php require_once 'header.blade.php' ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php require_once 'sidebar.blade.php' ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
           <?php require_once 'header_desktop.blade.php' ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Add Category</div>
                                <div class="card-body card-block">
                                    <form action="../includes/manage_category_inc.php" method="post" class="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-list-alt"></i>
                                                </div>
                                                <input type="text" id="add_category" name="category_name" placeholder="Add Category" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-success btn-sm" name="submit">Add Category</button>
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
                                            <th>Category Name</th>
                                            <th>img</th>
                                            <th>category name</th>
                                            <th>edit/delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($categories as $category) :
                                        if(isset($_GET['category_id'])){
                                            if($category['category_id']===$_GET['category_id']){
                                                ?>
                                                <form action="../includes/update_category.php" method="post">
                                                    <input type="hidden" name="category_id" value="<?php echo $category['category_id']?>">
                                                    <tr>
                                                        <td><input class="form-control update_field" name="date_created" type="text" value="<?php echo $category["date_created"]?>"></td>
                                                        <td><i class='fa fa-category-shield update_field'></i></td>
                                                        <td><input class="form-control update_field" name="category_name" type="text" value="<?php echo $category["category_name"]?>"></td>


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
                                        $category_id=$_GET['category_id']??null;
                                        if($category['category_id']!==$category_id){
                                        ?>

                                        <tr>
                                            <td><?php echo $category["date_created"]?></td>
                                            <td><i class='fa fa-category-shield'></i></td>
                                            <td><?php echo $category["category_name"]?></td>

                                            <td >
                                                <div class="table-data-feature">
                                                    <a href="manage_category.php?category_id=<?php echo $category['category_id']?>" class="item" data-toggle="tooltip"
                                                       data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <form action="../includes/category_delete.php" method="post">
                                                        <input type="hidden" name="category_id" value="<?php echo $category['category_id']?>">
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

</body>

</html>
<!-- end document-->
