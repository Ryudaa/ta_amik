<?php
    session_start();
    $lv = $_SESSION['lv'];

    include "db.php";
    include "head_login.php";
    include "nav.php";

    if($lv == "Peserta"){
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password_lama = mysqli_real_escape_string($mysqli, $_POST['password_lama']);
        $password_baru = mysqli_real_escape_string($mysqli, $_POST['password_baru']);

        $md5pass_lama = md5($password_lama);

        #check kesamaan username dan password
        #echo $username;
        $sql = "SELECT * FROM peserta WHERE username = '$username' AND password ='$md5pass_lama'";
        $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        if(mysqli_num_rows($hasil) >= 1)
        {
            $md5pass_baru = md5($password_baru);
            $sql = "UPDATE peserta
                    SET password = '$md5pass_baru'
                    WHERE username='$username';";
            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

            echo "<center><h3 style='margin-top:100px;'>Password berhasil diganti.</h3><br>
            <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='index.php'>Kembali</a></center>";
        } else {
            echo "<center><h3 style='margin-top:100px;'>Password lama yang anda masukkan salah.</h3><br>
            <form action='form_ganti_password.php' method='POST'>
            <input hidden name='username' value='$username'/>
            <button id='button' type='submit' class='btn btn-primary'>Kembali</button>
            </form>";
        }
    } elseif($lv == "Staff" || $lv == "Admin"){
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password_baru = mysqli_real_escape_string($mysqli, $_POST['password_baru']);
        $md5pass_baru = md5($password_baru);

        $sql = "UPDATE peserta
                SET password = '$md5pass_baru'
                WHERE username='$username';";
        $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        echo "<center><h3 style='margin-top:100px;'>Password berhasil diganti.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='index.php'>Kembali</a></center>";
    }
?>