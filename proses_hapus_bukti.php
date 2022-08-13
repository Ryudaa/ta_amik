<?php
    include "db.php";
    include "head.php";
    
    include "nav.php";
    $sql = "UPDATE daftar
            SET bukti_bayar = ''
            WHERE kd_daftar = " . $_GET["id"];

    mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    echo "<center><h3 style='margin-top:100px;'>File berhasil dihapus.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='profil_foradmin.php'>Kembali</a></center>";
    include "footer.php";
?>