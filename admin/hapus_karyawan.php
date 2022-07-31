<?php

// panggil file yang dibutuhkan
require_once 'session.php';
require_once '../koneksi.php';
require_once 'functions.php';

$id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM user WHERE id='$id'")  ;


    if ($query) {
        set_flash_message('sukses', 'Data berhasil dihapus!');
        header('Location: data_karyawan.php');
    } else die('gagal!' . mysqli_error($conn));
