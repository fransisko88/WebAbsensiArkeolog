<?php 
// panggil file yang dibutuhkan

require_once '../session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (!isset($_SESSION['auth'])){
  set_flash_message('gagal', 'Anda harus login dulu!');
  header('Location: ../index.php');
}
$id = $_SESSION['auth']['id'];
$query = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
$tampil=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<title>Profil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-third">
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="../image/<?php echo $tampil['img']; ?>" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          
          </div>
        </div>
        <div class="w3-container">
          <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal mt-2 fw-bolder"></i><?php echo $tampil['nama']; ?></p>
          <p><i class="fa fa-star fa-fw w3-margin-right w3-large w3-text-teal mt-2 fw-bolder"></i><?php echo $tampil['nip']; ?></p>
          <p><i class="fa fa-transgender fa-fw w3-margin-right w3-large w3-text-teal mt-2 fw-bolder"></i><?php
            if($tampil['jenkel'] == 'L'){
                echo "Laki Laki";
            }else{
                echo "Perempuan";
            }
          ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $tampil['email']; ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php echo $tampil['no_hp']; ?></p>
          
          <hr>

          <p class="w3-large"><b><i class="fa fa-edit fa-fw w3-margin-right w3-text-teal"></i>Edit Profil</b></p>
          
          <div class="w3-round-xlarge w3-medium ">
                
                <button type="button" name="btn_tampil_biodata" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                 Edit Profil
                </button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Biodata Diri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="ubahdata.php" method="POST" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $tampil['username']; ?>" readonly>
                        </div>

                        <label for="basic-url" class="form-label">NIP</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control"  name="nip" placeholder="Masukkan Nama Anda" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $tampil['nip']; ?>">
                        </div>

                        <label for="basic-url" class="form-label">Nama Lengkap</label>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control"  name="nama" placeholder="Masukkan Nama Anda" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $tampil['nama']; ?>">
                        </div>

                        <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-filter"></i></div>
                            </div>
                            <select name="jenkel" class="form-control">
                                <option value="L" <?php if ($tampil['jenkel']  == 'L') {
                                                    echo "selected";
                                                    } ?>>Laki-laki</option>
                                <option value="P" <?php if ($tampil['jenkel']  == 'P') {
                                                    echo "selected";
                                                    } ?>>Perempuan</option>
                            </select>
                            
                        </div>
                        </div>
                       
                        <label for="basic-url" class="form-label">Password</label>
                        <div class="form-group">
                        <input type="password"  name="password" class="form-control form-control-user" value="<?php echo $tampil['password']; ?>" name="password" placeholder="Password" autocomplete="off">
                        </div>

                        <label for="basic-url" class="form-label">Email</label>
                        <div class="input-group mb-3">
                        <input type="text"  name="email" class="form-control" placeholder="Masukkan Email Anda" value="<?php echo $tampil['email']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>

                        <label for="basic-url" class="form-label">No Handphone</label>
                        <div class="input-group mb-3">
                        <input type="text"  name="no_hp" class="form-control" placeholder="Masukkan Nomor Handphone Anda" value="<?php echo $tampil['no_hp']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>

                        <div class="mb-3">
                        <label for="formFile" class="form-label">Ganti Foto Profil</label>
                        <input class="form-control" name="img_upload" type="file" id="formFile">
                        <label for="formFile" class="form-label">Foto Profil Sekarang</label>
                        <img src="../image/<?php echo $tampil['img']; ?>" class="img-thumbnail" style=" width: 200px;">
                       
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                        <input type="submit" value="Ubah" name="simpan" class="btn btn-primary">
                    </div>
                    </div>
                    
                </div>
                </form>
                </div>
                <!-- Akhir modal -->
          </div>
        
          <br>

          <p class="w3-large w3-text-theme"><b><i class="fa fa-sign-out fa-fw w3-margin-right w3-text-teal"></i>Keluar</b></p>
          <div class="w3-round-xlarge w3-medium ">
            <div class="mb-3">
                <Button class="btn btn-primary w-100"><a class="dropdown-item text-center text-light" href="<?php echo base_url('logout.php') ?>" onclick="return confirm('apakah anda yakin?')">
                    <i class="fa fa-sign-out-alt  mr-2"></i>Keluar
                </a>
                </div>
                </Button>
          </div>

          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-plus fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Tambah Laporan</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>Silahkan Masukkan Laporan Anda</b></h5>
          <div class="w3-round-xlarge w3-medium ">
            <div class="mb-3 p-2 text-center">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                <input class="form-control" name="upfile" type="file" id="formFileMultiple">
                <input type="submit" class="btn btn-primary w-75 mt-2" value="Upload">
                </form>
            </div>
          </div>
      </div>

     

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
  
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top p-2">
  <p>&copy; Arkeolog Sumut</p>
</footer>

</body>
</html>
