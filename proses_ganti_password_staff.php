<?php
    session_start();
    $lv = $_SESSION['lv'];

    include "db.php";
    include "head_login.php";
    include "nav.php";

    if($lv == "Admin"){
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password_baru = mysqli_real_escape_string($mysqli, $_POST['password_baru']);
        $md5pass_baru = md5($password_baru);

        $sql = "UPDATE akun
                SET password = '$md5pass_baru'
                WHERE username='$username';";
        $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        echo "<center><h3 style='margin-top:100px;'>Password berhasil diganti.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_staff.php'>Kembali</a></center>";
    }
?>