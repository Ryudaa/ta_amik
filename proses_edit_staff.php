<?php
    include "db.php";
    include "head.php";
    include "nav.php";

    $username_edit = mysqli_real_escape_string($mysqli, $_POST['username']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);

    if($lv == 'Admin'){
        $sql = "UPDATE akun
            SET nama = '$nama'
            WHERE username = '$username_edit';";
    }
    
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    echo "<center><h3 style='margin-top:100px;'>Proses edit data berhasil.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_staff.php'>Kembali</a></center>";
?>