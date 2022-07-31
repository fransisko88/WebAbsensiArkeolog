<?php

// panggil file yang dibutuhkan
// panggil file yang dibutuhkan
require_once '../session.php';
require_once 'koneksi.php';
require_once 'functions.php';

if (isset($_POST['simpan'])) {

        $nama_file =$_FILES['img_upload']['name'];
        $sizeFile = $_FILES['img_upload']['size'];
        $error = $_FILES['img_upload']['error'];
        $tmpName = $_FILES['img_upload']['tmp_name'];
        $ekstentsiFileValid = ['jpg','jpeg','png'];
        $ekstentsiFile = explode('.',$nama_file);
        $ekstentsiFile = strtolower(end($ekstentsiFile));
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstentsiFile;

        if($error === 4){
            echo "
                <script>
                  alert('Pilih file yang ingin di upload');
                  document.location.href = 'index.php';
                  </script>  
            ";
        
        }else if(!in_array($ekstentsiFile,$ekstentsiFileValid)){
            echo "
                <script>
                  alert('Yang Anda Upload tidak sesuai');
                  document.location.href = 'index.php';
                  </script>  
            ";
        }else{

            $id = $_SESSION['auth']['id'];
            $nip = $_POST['nip'];
            $nama = $_POST['nama'];
            $jenkel = $_POST['jenkel'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $no_hp = $_POST['no_hp'];
          
        
             $query = mysqli_query($conn, "UPDATE user SET nip='$nip',nama = '$nama', jenkel = '$jenkel',password ='$password', email = '$email', no_hp = '$no_hp', img='$namaFileBaru' WHERE id = $id");
            echo "
                <script>
                alert('Data Berhasil');
                document.location.href = 'index.php';
                </script>  
            ";
            move_uploaded_file($tmpName,'../image/'.$namaFileBaru);
        }
   
   


   

    // if ($query) {
    //     set_flash_message('sukses', 'Data berhasil diubah!');
    //     header('Location: index.php');
    // } else die('gagal!' . mysqli_error($conn));
} else {
    header('Location: index.php');
}
