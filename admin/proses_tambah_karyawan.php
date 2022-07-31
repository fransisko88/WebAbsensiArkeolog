<?php

// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jenkel = $_POST['jenkel'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    $query = mysqli_query($conn, "INSERT INTO user (nip,nama,username,jenkel,password,email,no_hp) VALUES ('$nip','$nama', '$username','$jenkel','$password','$email',$no_hp)");

    if ($query) {
        set_flash_message('sukses', 'Data berhasil ditambahkan!');
        header('Location: data_karyawan.php');
    } else die('gagal!' . mysqli_error($conn));
} else {
    header('Location: proses_tambah_karyawan.php');
}
