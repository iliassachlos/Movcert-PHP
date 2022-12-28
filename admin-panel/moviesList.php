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
                            <h6 class="m-0 font-weight-bold text-primary">Available Movies</h6>
                            <h6 style="text-align: right;" class="m-0 font-weight-bold text-primary">
                                <a data-toggle="modal" data-target="#addingModal" > Add Movie </a>
                            </h6>
                            <br>
                            <h6 style="text-align: right;" class="m-0 font-weight-bold text-primary">
                                <a data-toggle="modal" data-target="#deleteModal" > Delete Movie </a>
                            </h6>
                            <br>
                            <h6 style="text-align: right;" class="m-0 font-weight-bold text-primary">
                                <a data-toggle="modal" data-target="#updateModal" > Update Movie Information </a>
                            </h6>
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
                                            <th>Poster</th>
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
                                            <th>Poster</th>
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
                                                    echo "<td><img src='$movieImage[$i]' width='200px' height='300px'></td>";
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
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

    <!-- This is the Adding modal -->
<div class="modal fade" id="addingModal" tabindex="-1" role="dialog" aria-labelledby="addingModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addingModalLabel">New Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../admin-panel/include/addMovie.php" method="post">
          <div class="form-group">
            <label for="title" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="form-group">
            <label for="genre" class="col-form-label">Genre:</label>
            <input type="text" class="form-control" id="genre" name="genre"></input>
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description"></input>
          </div>
          <div class="form-group">
            <label for="image" class="col-form-label">Image Source:</label>
            <input type="text" class="form-control" id="image" name="image"></input>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">Price:</label>
            <input type="text" class="form-control" id="price" name="price"></input>
          </div>
          <div class="form-group">
            <label for="start_date" class="col-form-label">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date"></input>
          </div>
          <div class="form-group">
            <label for="end_date" class="col-form-label">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date"></input>
          </div>
          <div class="form-group">
            <label for="start_time" class="col-form-label">Start Time:</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time"></input>
          </div>
          <div class="form-group">
            <label for="frequency" class="col-form-label">Frequency:</label>
            <input type="text" class="form-control" id="frequency" name="frequency"></input>
          </div>
          <div class="form-group">
            <label for="seats" class="col-form-label">Seats:</label>
            <input type="text" class="form-control" id="seats" name="seats"></input>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Movie</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <script>$('#addingModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
})</script>

    <!-- This is the Deleting Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../admin-panel/include/deleteMovie.php" method="post">
          <div class="form-group">
            <label for="title" class="col-form-label">Enter the Title for the Movie you want to Delete:</label>
            <input type="text" class="form-control" id="title" name="title">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete This Movie</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
})
</script>

    <!-- This is the Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Movie Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../admin-panel/include/updateMovie.php" method="post">
          <div class="form-group">
            <label for="title" class="col-form-label">Enter the Name of the Movie you want to Update:</label>
            <input type="text" class="form-control" id="title" name="title" >
          </div>
          <div class="form-group">
            <label for="optionsList" class="col-form-label">Choose the field you want to change:</label>
            <select name="optionsList" id="optionsList" class="form-control">
              <option value="id">ID</option>
              <option value="title">Title</option>
            </select>
          </div>
          <div class="form-group">
            <label for="newInfo" class="col-form-label">Enter the New Information:</label>
            <input type="text" class="form-control" id="newInfo" name="newInfo">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Information</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $('#updateModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
})
</script>
</body>

</html>