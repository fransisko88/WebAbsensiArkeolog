<?php

// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';


if (!isset($_SESSION['auth'])) {
  set_flash_message('gagal', 'Anda harus login dulu!');
  header('Location: ../index.php');
}


$no = 1;
$tanggal = date("Y-m-d");
$nama_usaha = 'Balai Arkeolog';
$user = ambilsatubaris($conn, 'SELECT COUNT(id) as juser FROM user');
$laporan = ambilsatubaris($conn, "SELECT COUNT(id) as jlaporan FROM laporan WHERE tgl='$tanggal' ");
$tlaporan = ambilsatubaris($conn, 'SELECT COUNT(id) as jtlaporan FROM laporan');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $_SESSION['app_name'] ?> - Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <link href="../file/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../file/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <?php require_once 'sidebar.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <?php require_once 'topnav.php'; ?>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
          <hr>
          <?php if (check_flash_message('sukses')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?php get_flash_message() ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php elseif (check_flash_message('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php get_flash_message() ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif ?>
          <div class="row">
            <div class="col-md-12">
            <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ubah Password
              </button>
            </div><br><br>

            <!-- Modal -->
            <form action="#" method="POST">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <div class="input-group mb-3">
                    <input type="text" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Ubah" class="btn btn-primary" name="btn_pass">
                  </div>
                </div>
              </div>
            </div>
              <?php
                if(isset($_POST['btn_pass'])){
                  
                  $password = $_POST['password'];
                  $query_ubah = mysqli_query($conn, "UPDATE admin SET password ='$password'WHERE username = 'admin' ");

                  echo "
                  <script>
                  alert('Pasword Berhasil Diubah!');
                  document.location.href = 'index.php';
                  </script>  
              ";
                }

              ?>
            </form>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-3 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Instansi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nama_usaha; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-smile-wink fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Karyawan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user['juser']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Laporan Hari Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $laporan['jlaporan']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Laporan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tlaporan['jtlaporan']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book-open fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo $_SESSION['app_name'] ?> </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>

  <!-- End of Page Wrapper -->
  <script src="../file/vendor/jquery/jquery.min.js"></script>
  <script src="../file/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../file/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../file/js/sb-admin-2.min.js"></script>
  <script src="../file/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../file/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../file/js/demo/datatables-demo.js"></script>
</body>

</html>