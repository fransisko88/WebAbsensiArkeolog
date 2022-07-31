<?php

require_once 'functions.php';
require_once 'koneksi.php';
session_start();

// ambil semua data atau value dari form
$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah data sudah diisi atau belum //
if ($username == '' && $password == '') {
    set_flash_message('gagal', 'Semua data wajib diisi!');
    header('Location: index.php');
    die();
} else;
$query = "SELECT * FROM admin where username='$username' AND password = '$password'";
$row = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);

$query1 = "SELECT * FROM user where username='$username' AND password = '$password'";
$row1 = mysqli_query($conn, $query1);
$cek1 = mysqli_num_rows($row1);
$data1 = mysqli_fetch_assoc($row1);
if ($cek > 0) {
    if ($data['role'] == 'Admin') {
        $_SESSION['auth'] = [
            'logged_in' => TRUE,
            'id' => $data['id'],
            'nama' => $data['nama_user'],
            'role_user' => $data['role'],
        ];
        header('location:admin');
    } else {
        //$query1 = "SELECT * FROM user where username='$username' AND password = '$password'";
    //if ($data['role'] == 'Game') {
        //$_SESSION['auth'] = [
         //   'logged_in' => TRUE,
         //   'nama' => $data['nama_user'],
            //'role_user' => $data['role'],
        //];
        //header('location:page');
        set_flash_message('gagal', 'Username tidak tersedia, Silahkan Hubungi Admin!');
        header('Location: index.php');
        die();      
    }
}else if($cek1 > 0){
    //$qry = mysqli_fetch_array($query1);
    $_SESSION['auth'] = [
    'logged_in' => TRUE,
    'id' => $data1['id'],
    'nama' => $data1['nama'],
    ];
    header('location:page');
}else {
    set_flash_message('gagal', 'Username tidak tersedia, Silahkan Hubungi Admin!');
    header('Location: index.php');
    die();
}
