<?php require_once "../includes/db.php" ?>
<?php require_once "../includes/functions.php" ?>
<?php
//fetch
$categories=show_category($connection);
$exams=show_exam($connection);
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
                            <div class="card-header">Add Exam</div>
                            <div class="card-body card-block">
                                <form action="../includes/manage_exams_inc.php" method="post" class="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                            <input type="text" id="add_exam" name="exam_name" placeholder="Add Exam" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                            <input type="number" id="add_exam" name="exam_max_score" placeholder="set the highest score" class="form-control">
                                        </div>
                                    </div>
                                    <select name="exam_duration" id="">
                                        <option selected>Select Exam Duration</option>
                                        <option value="3">3 Hours</option>
                                        <option value="2">2 Hours</option>
                                        <option value="1">1 Hour</option>
                                    </select>



                                    <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <?php foreach ($categories as $category):?>
                                        <option value="<?php echo $category["category_id"]?>">
                                            <?php echo $category["category_name"]?>
                                        </option>
                                      <?php endforeach;?>
                                    </select>



                                    <div class="form-actions form-group">
                                        <button type="submit" name="submit" class="btn    btn-success btn-sm">Add Exam</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>
                                        <th>Date created</th>
                                        <th>exam name</th>
                                        <th>category name</th>
                                        <th>exam duration</th>
                                        <th>exam max_score</th>
                                        <th>edit/delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($exams as $exam) :
                                    if(isset($_GET['exam_id'])){
                                        if($exam['exam_id']===$_GET['exam_id']){
                                            ?>
                                            <form action="../includes/update_exam.php" method="post">
                                                <input type="hidden" name="exam_id" value="<?php echo $exam['exam_id']?>">
                                                <input type="hidden" name="category_id" value="<?php echo $exam['category_id']?>">
                                                <tr>
                                                    <td><input class="form-control update_field" name="date_created" type="text" value="<?php echo $exam["date_created"]?>"></td>
<!--                                                    <td><i class='fa fa-exam-shield update_field'></i></td>-->
                                                    <td><input class="form-control update_field" name="exam_name" type="text" value="<?php echo $exam["exam_name"]?>"></td>
                                                    <td><input class="form-control update_field" name="category_name" type="text" value="<?php echo $exam["category_name"]?>"></td>
                                                    <td><input class="form-control update_field" name="exam_duration" type="text" value="<?php echo $exam["exam_duration"]?>"></td>
                                                    <td><input class="form-control update_field" name="exam_max_score" type="text" value="<?php echo $exam["exam_max_score"]?>"></td>


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
                                    $exam_id=$_GET['exam_id']??null;
                                    if($exam['exam_id']!==$exam_id){
                                    ?>

                                    <tr>
                                        <td><?php echo $exam["date_created"]?></td>

                                        <td><?php echo $exam["exam_name"]?></td>
                                        <td><?php echo $exam["category_name"]?></td>
                                        <td><?php echo $exam["exam_duration"]." hours"?></td>
                                        <td><?php echo $exam["exam_max_score"]?></td>

                                        <td >
                                            <div class="table-data-feature">
                                                <a href="manage_exams.php?exam_id=<?php echo $exam['exam_id']?>" class="item" data-toggle="tooltip"
                                                   data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <form action="../includes/delete_exam.php" method="post">
                                                    <input type="hidden" name="exam_id" value="<?php echo $exam['exam_id']?>">
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
