<?php
    include "db.php";
    include "head.php";
    include "nav.php";

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);

    $sql = "DELETE FROM akun WHERE username = '$username'";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    
    echo "<div class='container'>
    <center><h3 style='margin-top:100px;'>Data berhasil dihapus.</h3>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_staff.php'>Kembali</a>
    </center>
    </div>";

    include "footer.php";
?>