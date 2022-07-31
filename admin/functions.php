<?php

function base_url($path = null)
{
    $base_url = "http://localhost/arkeolog/";
    if ($path == null) {
        return $base_url;
    } else {
        $base_url = $base_url . $path;
        return $base_url;
    }
}
function set_flash_message($tipe, $pesan)
{
    $_SESSION['flash_message'] = [
        'tipe' => $tipe,
        'pesan' => $pesan,
    ];
}

function check_flash_message($tipe)
{
    if (isset($_SESSION['flash_message'])) {
        if ($_SESSION['flash_message']['tipe'] == $tipe) return TRUE;
        else return false;
    } else return false;
}

function get_flash_message()
{
    echo $_SESSION['flash_message']['pesan'];
    unset($_SESSION['flash_message']);
}
function ambilsatubaris($conn, $query)
{
    $db = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($db);
}
function ambildata($conn, $query)
{
    $data = mysqli_query($conn, $query);
    if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}

function bisa($conn, $query)
{
    $db = mysqli_query($conn, $query);

    if ($db) {
        return 1;
    } else {
        return 0;
    }
}
