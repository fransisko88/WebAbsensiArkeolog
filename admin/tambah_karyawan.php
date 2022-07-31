<?php

// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';


if (!isset($_SESSION['auth'])) {
  set_flash_message('gagal', 'Anda harus login dulu!');
  header('Location: ../index.php');
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
  <title><?= $_SESSION['app_name'] ?> - Tambah Data Siswa</title>
  <link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .input-group-text {
      width: 45px;
    }
  </style>
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
          <div class="clearfix">
            <h1 class="h3 mb-4 text-gray-800 float-left">Tambah Data Karyawan</h1>
            <a href="data_karyawan.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <span class="text-primary"><strong>Silahkan isi data di bawah ini!</strong></span>
                </div>
                <div class="card-body">
                  <form action="proses_tambah_karyawan.php" method="POST">
                  <div class="form-group">
                      <label for="nama">NIP</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Masukan NIP" name="nip" autocomplete="off" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Karyawan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" autocomplete="off" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="agama">Jenis Kelamin</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-transgender"></i></div>
                        </div>
                        <select name="jenkel" id="jenkel_pelelanggan" class="form-control">
                          <option value="L">Laki - Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas">@</i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" autocomplete="off" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-key"></i></div>
                        </div>
                        <input type="password" class="form-control" placeholder="Masukan Password" name="password" autocomplete="off" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nomor Telepon</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-phone"></i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Masukan Telepon" name="no_hp" autocomplete="off" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama">Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="text" class="form-control" placeholder="Masukan Email" name="email" autocomplete="off" required="required">
                      </div>
                    </div>
                
                </div>
                <div class="ml-4 form-group">
                  <button type="submit" class="btn btn-primary btn-sm" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                  <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</button>
                </div>
                
                </form>
              </div>
            </div>
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
</body>

</html>