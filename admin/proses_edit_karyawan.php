<?php

// panggil file yang dibutuhkan
// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';

if (isset($_POST['simpan'])) {
    // print_r($_POST);
    $id = $_POST['id'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];


    $query = mysqli_query($conn, "UPDATE user SET nip ='$nip', nama = '$nama', jenkel = '$jenkel',username ='$username', password = '$password', no_hp = '$no_hp', email = '$email' WHERE id = $id");

    if ($query) {
        set_flash_message('sukses', 'Data berhasil diubah!');
        header('Location: data_karyawan.php');
    } else die('gagal!' . mysqli_error($conn));
} else {
    header('Location: proses_edit_karyawan.php');
}
