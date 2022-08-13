<?php
    include "db.php";
    include "head.php";
    include "nav.php";

    $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $biaya = mysqli_real_escape_string($mysqli, $_POST['biaya']);

    $sql = "UPDATE kelas
            SET nama = '$nama',
                biaya = '$biaya'
            WHERE kdkelas = '$kdkelas';";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    echo "<center><h3 style='margin-top:100px;'>Proses edit data berhasil.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_daftar.php'>Lihat Pendaftar</a></center>";
?>