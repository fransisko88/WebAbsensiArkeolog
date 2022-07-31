<?php

// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])) {
  set_flash_message('gagal', 'Anda harus login dulu!');
  header('Location:../index.php');
}

$no = 1;
$query = mysqli_query($conn, "SELECT * FROM user order by nama asc");
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
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="clearfix">
              <h1 class="h3 mb-4 text-gray-800 float-left">Data Karyawan</h1>
            </div>
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
            <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                    <a href="tambah_karyawan.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i>Tambah Data Karyawan</a>
                    </div>
                <div class="table-responsive mt-2">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Proses</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($plgn = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $plgn['nip'] ?></td>
                          <td><?php echo $plgn['nama'] ?></td>
                          <td><?php echo $plgn['jenkel'] ?></td>
                          <td><?php echo $plgn['username'] ?></td>
                          <td><?php echo $plgn['password'] ?></td>
                          <td><?php echo $plgn['email'] ?></td>
                          <td><?php echo $plgn['no_hp'] ?></td>
                          <td>
                            <a href="edit_karyawan.php?id=<?php echo $plgn['id'] ?>" class="btn btn-sm btn-success m-2"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Ubah</a>
                            <a href="hapus_karyawan.php?id=<?php echo $plgn['id'] ?>" class="btn btn-sm btn-danger m-2" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</a>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /.container-fluid -->
      </>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo $_SESSION['app_name'] ?></span>
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