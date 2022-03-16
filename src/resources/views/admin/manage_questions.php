
<?php require_once "../includes/db.php" ?>
<?php require_once "../includes/functions.php" ?>
<?php
//fetch
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
                   <!-- Questions Form  -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Add Question</div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="">

                                        <select name="exam_id" class="form-select mb-3" aria-label="Default select example">
                                            <option selected>Choose exam</option>
                                            <?php foreach ($exams as $exam):?>
                                                <option value="<?php echo $exam["exam_id"]?>">
                                                    <?php echo $exam["exam_name"]?>
                                                </option>
                                            <?php endforeach;?>
                                        </select>


                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-list-alt"></i>
                                            </div>
                                            <input type="text" id="add_question" name="question_name" placeholder="Add Question" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-list-alt"></i>
                                                    </div>
                                                    <input type="text" id="add_answer" name="question_answer_1" placeholder="Add answer" class="form-control">
                                                </div>
                                            </div>
                                        </div>  <div class="col-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-list-alt"></i>
                                                    </div>
                                                    <input type="text" id="add_answer" name="question_answer_2" placeholder="Add answer" class="form-control">
                                                </div>
                                            </div>
                                        </div>  <div class="col-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-list-alt"></i>
                                                    </div>
                                                    <input type="text" id="add_answer" name="question_answer_3" placeholder="Add answer" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-list-alt"></i>
                                                    </div>
                                                    <input type="text" id="add_answer" name="question_answer_4" placeholder="Add answer" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="w-25 m-auto">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-list-alt"></i>
                                                </div>
                                                <input type="text" id="add_answer" name="question_answer_correct" placeholder="correct answer" class="form-control">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-actions form-group w-25 ml-auto">
                                        <button type="submit" class="btn d-block    btn-success btn">Add Question</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--     Questions Table  -->
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>

                                        <th>Question</th>
                                        <th>correct answer</th>
                                        <th>Edit/Delete</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2018-09-29 05:57</td>
                                        <td class="font-weight-bold">Software Engineering</td>
                                        <td >
                                            <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip"
                                                    data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>

                                            </div>
                                        </td>
                                    </tr>
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
