<?php
    include "db.php";
    include "head.php";
    include "nav.php";

    $kd_daftar = mysqli_real_escape_string($mysqli, $_POST['kd_daftar']);
    $username_edit = mysqli_real_escape_string($mysqli, $_POST['username']);
    $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
    $nmkelas = mysqli_real_escape_string($mysqli, $_POST['nmkelas']);
    $tgl_daftar = mysqli_real_escape_string($mysqli, $_POST['tgl_daftar']);
    $tgl_selesai = mysqli_real_escape_string($mysqli, $_POST['tgl_selesai']);
    $ket = mysqli_real_escape_string($mysqli, $_POST['ket']);

    $sql = "UPDATE daftar
            SET username = '$username_edit',
                kdkelas = '$kdkelas',
                nmkelas = '$nmkelas',
                tgl_daftar = '$tgl_daftar',
                tgl_selesai = '$tgl_selesai',
                ket = '$ket'
            WHERE kd_daftar = '$kd_daftar';";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    echo "<center><h3 style='margin-top:100px;'>Proses edit data berhasil.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_daftar.php'>Lihat Daftar</a></center>";
?>