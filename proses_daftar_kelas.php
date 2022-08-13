<?php
    include "db.php";
    include "head_login.php";
    include "nav.php";

    if($isLoggedIn != '1'){
        session_destroy();
        header('Location: index.php');
    }
    $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
    $nmkelas = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $biaya = mysqli_real_escape_string($mysqli, $_POST['biaya']);

    $tgl = date("Y/m/d");
    $sql = "INSERT INTO daftar (username, kdkelas, nmkelas, tgl_daftar, ket)
            VALUES ('$username', '$kdkelas', '$nmkelas', '$tgl', 'Belum bayar sebesar $biaya Rupiah');";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    echo "<center><h3 style='margin-top:100px;'>Proses pendaftaran atas username <b>$username</b> dengan kelas <b>$nmkelas</b> pada tanggal $tgl telah berhasil.</h3><br>
    <p>Silahkan melakukan pembayaran ke nomor rekening xxxxxx atau secara cash lalu upload bukti bayar pada halaman <a href='profil.php'>Profil</a></p><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='form_daftar_kelas.php'>Kembali Daftar</a></center>";
?>