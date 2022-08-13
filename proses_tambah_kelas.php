<?php
    include "db.php";
    include "head_login.php";
    include "nav.php";

    $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $biaya = mysqli_real_escape_string($mysqli, $_POST['biaya']);

    #check username
    $sql = "SELECT * FROM kelas WHERE kdkelas = '$kdkelas'";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    if(mysqli_num_rows($hasil) >= 1)
    {
        echo "<center><h3 style='margin-top:100px;'>Kode kelas <b>$kdkelas</b> telah digunakan.</h3><br>
        <p>Silahkan mendaftar lagi dengan kode kelas yang berbeda.</p><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='form_tambah_kelas.php'>Kembali Tambah Kelas</a></center>";
    } else {
        $sql = "INSERT INTO kelas (kdkelas, nama, biaya)
                VALUES ('$kdkelas', '$nama', '$biaya');";
        $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        echo "<center><h3 style='margin-top:100px;'>Proses penambahan kelas dengan kode kelas <b>$kdkelas</b> telah berhasil.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_kelas.php'>Kembali</a></center>";
    }
?>