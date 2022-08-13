<?php
    include "db.php";
    include "head.php";
    include "nav.php";

    $username_edit = mysqli_real_escape_string($mysqli, $_POST['username']);
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

    if($lv == 'Staff'){
        $ket = mysqli_real_escape_string($mysqli, $_POST['ket']);
    }

    if($lv == 'Staff'){
        $sql = "UPDATE peserta
            SET nama_lengkap = '$nama_lengkap',
                jenis_kelamin = '$jenis_kelamin',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                agama = '$agama',
                kewarganegaraan = '$kewarganegaraan',
                alamat = '$alamat',
                kelurahan_desa = '$kelurahan_desa',
                kecamatan = '$kecamatan',
                kabupaten_kota = '$kabupaten_kota',
                telp = '$telp',
                alat_transportasi = '$alat_transportasi',
                nik = '$nik',
                instagram = '$instagram',
                facebook = '$facebook',
                kps = '$kps',
                pip = '$pip',
                kip = '$kip',
                ayah = '$ayah',
                ibu = '$ibu',
                telp_ortu = '$telp_ortu',
                ket = '$ket'
            WHERE username = '$username_edit';";
    } else {
        $sql = "UPDATE peserta
            SET nama_lengkap = '$nama_lengkap',
                jenis_kelamin = '$jenis_kelamin',
                tempat_lahir = '$tempat_lahir',
                tanggal_lahir = '$tanggal_lahir',
                agama = '$agama',
                kewarganegaraan = '$kewarganegaraan',
                alamat = '$alamat',
                kelurahan_desa = '$kelurahan_desa',
                kecamatan = '$kecamatan',
                kabupaten_kota = '$kabupaten_kota',
                telp = '$telp',
                alat_transportasi = '$alat_transportasi',
                nik = '$nik',
                instagram = '$instagram',
                facebook = '$facebook',
                kps = '$kps',
                pip = '$pip',
                kip = '$kip',
                ayah = '$ayah',
                ibu = '$ibu',
                telp_ortu = '$telp_ortu'
            WHERE username = '$username_edit';";
    }

    
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    echo "<center><h3 style='margin-top:100px;'>Proses edit data berhasil.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='index.php'>Kembali</a></center>";
?>