<?php
    include "db.php";
    include "head_login.php";
    include "nav.php";

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $nama_lengkap = mysqli_real_escape_string($mysqli, $_POST['nama_lengkap']);
    $jenis_kelamin = mysqli_real_escape_string($mysqli, $_POST['jenis_kelamin']);
    $tempat_lahir = mysqli_real_escape_string($mysqli, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($mysqli, $_POST['tanggal_lahir']);
    $agama = mysqli_real_escape_string($mysqli, $_POST['agama']);
    $kewarganegaraan = mysqli_real_escape_string($mysqli, $_POST['kewarganegaraan']);
    $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
    $kelurahan_desa = mysqli_real_escape_string($mysqli, $_POST['kelurahan_desa']);
    $kecamatan = mysqli_real_escape_string($mysqli, $_POST['kecamatan']);
    $kabupaten_kota = mysqli_real_escape_string($mysqli, $_POST['kabupaten_kota']);
    $telp = mysqli_real_escape_string($mysqli, $_POST['telp']);
    $alat_transportasi = mysqli_real_escape_string($mysqli, $_POST['alat_transportasi']);
    $nik = mysqli_real_escape_string($mysqli, $_POST['nik']);
    $instagram = mysqli_real_escape_string($mysqli, $_POST['instagram']);
    $facebook = mysqli_real_escape_string($mysqli, $_POST['facebook']);
    $kps = mysqli_real_escape_string($mysqli, $_POST['kps']);
    $pip = mysqli_real_escape_string($mysqli, $_POST['pip']);
    $kip = mysqli_real_escape_string($mysqli, $_POST['kip']);
    $ayah = mysqli_real_escape_string($mysqli, $_POST['ayah']);
    $ibu = mysqli_real_escape_string($mysqli, $_POST['ibu']);
    $telp_ortu = mysqli_real_escape_string($mysqli, $_POST['telp_ortu']);

    $md5pass = md5($password);

    #check username
    $sql = "SELECT * FROM peserta WHERE username = '$username'";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    if(mysqli_num_rows($hasil) >= 1)
    {
        echo "<center><h3 style='margin-top:100px;'>Username telah digunakan.</h3><br>
        <p>Silahkan mendaftar lagi dengan username yang berbeda.</p><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='form_daftar_peserta.php'>Kembali Daftar</a></center>";
    } else {
        $sql = "INSERT INTO peserta (username, password, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, kewarganegaraan, alamat, kelurahan_desa, kecamatan, kabupaten_kota,
                telp, alat_transportasi, nik, instagram, facebook, kps, pip, kip, ayah, ibu, telp_ortu, ket)
                VALUES ('$username', '$md5pass', '$nama_lengkap', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$agama', '$kewarganegaraan', '$alamat', '$kelurahan_desa', '$kecamatan', '$kabupaten_kota',
                '$telp', '$alat_transportasi', '$nik', '$instagram', '$facebook', '$kps', '$pip', '$kip', '$ayah', '$ibu', '$telp_ortu', '');";
        $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

        echo "<center><h3 style='margin-top:100px;'>Proses pendaftaran atas nama <b>$nama_lengkap</b> telah berhasil.</h3><br>
        <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='index.php'>Kembali</a>;
    }
?>