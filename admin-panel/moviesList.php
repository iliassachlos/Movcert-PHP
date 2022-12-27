<?php
    session_start();
    require('../main-website/include/config.php');
    if (!isset($_SESSION['id'])) {
        header("Location: ../index.php");
    }

    $query = mysqli_query($sql, 'SELECT * FROM movies');
    $row = mysqli_fetch_all($query);
    $movieID = array();
    $movieTitle = array();
    $movieGenre = array();
    $movieDescription = array();
    $movieImage = array();
    $moviePrice = array();
    $movieStartDate = array();
    $movieEndDate = array();
    $movieFrequency = array();
    $movieStartTime = array();
    $movieSeats = array();
    for ($i = 0; $i < sizeof($row); $i++){
        $movieID[$i] = $row[$i][0];
        $movieTitle[$i] = $row[$i][1];
        $movieGenre[$i] = $row[$i][2];
        $movieDescription[$i] = $row[$i][3];
        $movieImage[$i] = $row[$i][4];
        $moviePrice[$i] = $row[$i][5];
        $movieStartDate[$i] = $row[$i][6];
        $movieEndDate[$i] = $row[$i][7];
        $movieFrequency[$i] = $row[$i][8];
        $movieStartTime[$i] = $row[$i][9];
        $movieSeats[$i] = $row[$i][10];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Movcert - Admin Panel</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-toolbox"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Movcert Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="moviesList.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Movies</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="concertsList.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Concerts</span></a>
            </li>

            <li>
                <hr style="border-top: 0.5px solid #4e73df">
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>To Main Website</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="../admin-panel/include/logoutLogic.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Log out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Movies</h1>
                    <p class="mb-4">Below you can see and edit all the information about the movies.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Genre</th>
                                            <th>Description</th>
                                            <th>Image Source</th>
                                            <th>Price</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time</th>
                                            <th>Frequency</th>
                                            <th>Seats</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Genre</th>
                                            <th>Description</th>
                                            <th>Image Source</th>
                                            <th>Price</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Start Time</th>
                                            <th>Frequency</th>
                                            <th>Seats</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            for ($i = 0; $i < sizeof($row); $i++){
                                                echo "<tr>";
                                                    echo "<td>$movieID[$i]</td>";
                                                    echo "<td>$movieTitle[$i]</td>";
                                                    echo "<td>$movieGenre[$i]</td>";
                                                    echo "<td>$movieDescription[$i]</td>";
                                                    echo "<td>$movieImage[$i]</td>";
                                                    echo "<td>$moviePrice[$i]</td>";
                                                    echo "<td>$movieStartDate[$i]</td>";
                                                    echo "<td>$movieEndDate[$i]</td>";
                                                    echo "<td>$movieStartTime[$i]</td>";
                                                    echo "<td>$movieFrequency[$i]</td>";
                                                    echo "<td>$movieSeats[$i]</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        Made With &nbsp; <i class="fa fa-heart"></i> &nbsp; By Alexandros and Elias
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>