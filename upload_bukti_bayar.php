<?php
    include "db.php";
    include "head_login.php";
    
    include "nav.php";

    $kd_daftar = mysqli_real_escape_string($mysqli, $_POST['kd_daftar']);
    $image = $_FILES["image"];
    $info = getimagesize($image["tmp_name"]);
    if(!$info)
    {
        die("<center><h3 style='margin-top:100px;'>File yang anda masukkan bukan file gambar.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='profil_foradmin.php'>Kembali</a></center>");
        include "footer.php";
    }
    $ukuran	= $_FILES['image']['size'];
    if($ukuran > 1044070){
        die("<center><h3 style='margin-top:100px;'>File yang anda masukkan terlalu besar.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='profil_foradmin.php'>Kembali</a></center>");
        include "footer.php";
    }
    $name = $image["name"];
    #$type = $image["type"]; <- karena syarat filenya image, ini gaperlu ada. Nambah nambahin kolom tabel.
    $type = 'image';
    $blob = addslashes(file_get_contents($image["tmp_name"]));
    $sql = "UPDATE daftar
            SET bukti_bayar = '$blob'
            WHERE kd_daftar = '$kd_daftar'";
    mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    echo "<center><h3 style='margin-top:100px;'>File berhasil diunggah.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='profil_foradmin.php'>Kembali</a></center>";
    include "footer.php";
?>