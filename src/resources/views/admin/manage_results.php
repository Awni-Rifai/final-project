
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

                    <!--     Questions Table  -->
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <div class="dropdown my-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Exam Name
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                    <tr>

                                        <th>Date</th>
                                        <th>username</th>
                                        <th>result</th>
                                        <th>correct answers</th>
                                        <th>wrong answers</th>



                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2018-09-29 05:57</td>
                                        <td class="font-weight-bold">Awni</td>
                                        <td class="font-weight-bold">15/25</td>
                                        <td class="font-weight-bold">15</td>
                                        <td class="font-weight-bold">10</td>

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
