<?php
    include "db.php";
    $sql = "SELECT * FROM daftar WHERE kd_daftar = " . $_GET["id"];
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) == 0)
    {
        die("File does not exists.");
    }
    $row = mysqli_fetch_object($result);
    header("Content-type: image");
    echo $row->bukti_bayar;
?>