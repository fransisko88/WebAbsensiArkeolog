<?php
require_once '../session.php';
require_once 'koneksi.php';
require_once 'functions.php';

    if(isset($_POST)){
        //var_dump($_POST);
        //var_dump($_FILES);
        //upload file
        $nama_file =$_FILES['upfile']['name'];
        $sizeFile = $_FILES['upfile']['size'];
        $error = $_FILES['upfile']['error'];
        $tmpName = $_FILES['upfile']['tmp_name'];
        $ekstentsiFileValid = ['pdf','docx','pdf','jpg','jpeg','png','xls'];
        $ekstentsiFile = explode('.',$nama_file);
        $ekstentsiFile = strtolower(end($ekstentsiFile));
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstentsiFile;

        //cek ada isi file
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
            //laporan
            
            //absensi
            $ambilbaris = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
            $tampil=mysqli_fetch_array($ambilbaris);
            $nama=$tampil['nama'];
            $nip=$tampil['nip'];


            $tanggal = date("Y-m-d");
            $tambahFile = mysqli_query($conn,"INSERT INTO laporan (nip,nama,tgl,file) VALUES ('$nip','$nama', '$tanggal','$namaFileBaru')");
            $absensi = mysqli_query($conn,"INSERT INTO absensi (id,nip,nama,tgl,keterangan) VALUES (NULL,'$nip','$nama','$tanggal','hadir')");
            echo "
                <script>
                alert('Data Berhasil');
                document.location.href = 'index.php';
                </script>  
            ";
            move_uploaded_file($tmpName,'../image/'.$namaFileBaru);
        }
    }