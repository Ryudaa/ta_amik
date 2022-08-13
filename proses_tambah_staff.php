<?php
    include "db.php";
    include "head_login.php";
    include "nav.php";

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $password = mysqli_real_escape_string($mysqli, md5($_POST['password']));

    #check username
    $sql = "SELECT * FROM akun WHERE username = '$username'";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    if(mysqli_num_rows($hasil) >= 1)
    {
        echo "<center><h3 style='margin-top:100px;'>Username <b>$username</b> telah digunakan.</h3><br>
        <p>Silahkan mendaftar lagi dengan username yang berbeda.</p><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='form_tambah_staff.php'>Kembali Tambah Staff</a></center>";
    } else {
        $sql = "INSERT INTO akun (username, nama, tingkat, password)
                VALUES ('$username', '$nama', 'Staff', '$password');";
        $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        echo "<center><h3 style='margin-top:100px;'>Proses penambahan staff dengan username <b>$username</b> telah berhasil.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_staff.php'>Kembali</a></center>";
    }
?>