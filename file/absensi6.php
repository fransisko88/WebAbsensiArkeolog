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
$query = mysqli_query($conn, "SELECT * FROM kelas6 order by nama asc");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Absensi</title>
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
            <h1 class="h3 mb-4 text-gray-800 float-left">Absensi Kelas 6</h1>
            <a href="data_kelas6.php" class="btn btn-secondary btn-sm float-right"><i class="fas fa-reply"></i> Kembali</a>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-10 text-center m-auto">
            <div class="card">
              <div class="card-header">Daftar Kelas 6</div>
              <div class="card-body">
                <form action="#" method="POST">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                       
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Sakit</th>
                        <th>Alpa</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($plgn = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                         
                          <td><?php echo $plgn['nama'] ?></td>
                          <td><?php echo $plgn['jenkel'] ?></td>
                    
                          <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="checkbox" name="hadir" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                            </div>
                          </td>
                          <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="checkbox" name="izin" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                            </div>
                          </td>
                          <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="checkbox" name="sakit" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                            </div>
                          </td>
                          <td>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="checkbox" name="alpa" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                            </div>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                 
                </div>
                    
                  <div class="row">
                    <div class="col-md-12 text-center">
                    <input type="submit" name="btn_simpan" class="btn btn-primary w-75" value="SIMPAN">
                    </div>
                  </div>
              </div>
                    <?php
                      if(isset($_POST['btn_simpan'])){
                       //$hadir = $_POST['hadir'];
                       //$sakit = $_POST['sakit'];
                       //$izin = $_POST['izin'];
                       //$alpa = $_POST['alpa'];
                       $tanggal = date("Y-m-d");
                       $querykelas6 = mysqli_query($conn,"SELECT COUNT(id) FROM kelas6");
                       $querynama = mysqli_query($conn,"SELECT * FROM kelas6 order by nama asc");
                       //$querykelas6 = 4;
                       while($data2=mysqli_fetch_array($querykelas6)){
                        $jumlah = $data2['COUNT(id)'];
                        //echo $jumlah;
                       }
                       while($data3=mysqli_fetch_array($querynama)){
                        $nama= $data3['nama'];
                        echo $nama;
                       }
                      
                       for($i=0;$i<1;$i++){
                       $hasil = mysqli_query($conn,"INSERT INTO absensi6 (id,nama,tgl,keterangan) VALUES (NULL, '$nama', '$tanggal', 'hadir');");
                       }
                       
                       
                       
                      }
                    ?>
                </form>
            </div>
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
        <span>Copyright &copy; Kelompok 1 </span>
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