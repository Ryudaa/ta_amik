<?php
    include "db.php";
    echo "
    <head>
    <style>
    th {
        max-width: 120px;
    }
    </style>
    </head>
    ";
    include "head.php";
    
    include "nav.php";

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
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
    $ket = mysqli_real_escape_string($mysqli, $_POST['ket']);

    echo "<div class='container'>
    <center><h3 style='margin-top:10px;'>Data berikut akan dihapus:</h3></center>
    <form action='proses_hapus_peserta.php' method='post'>
        <table class='table table-bordered'>
            <tr>
                <th>Username</th>
                <td>$username<input type='hidden' name='username' value='$username'></td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>$nama_lengkap</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>$jenis_kelamin</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>$tempat_lahir</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>$tanggal_lahir</td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>$agama</td>
            </tr>
            <tr>
                <th>Kewarganegaraan</th>
                <td>$kewarganegaraan</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>$alamat</td>
            </tr>
            <tr>
                <th>Kelurahan/Desa</th>
                <td>$kelurahan_desa</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>$kecamatan</td>
            </tr>
            <tr>
                <th>Kabupaten/Kota</th>
                <td>$kabupaten_kota</td>
            </tr>
            <tr>
                <th>No. HP/WhatsApp</th>
                <td>$telp_ortu</td>
            </tr>
            <tr>
                <th>Alat Transportasi</th>
                <td>$alat_transportasi</td>
            </tr>
            <tr>
                <th>NIK</th>
                <td>$nik</td>
            </tr>
            <tr>
                <th>Instagram</th>
                <td>$instagram</td>
            </tr>
            <tr>
                <th>Facebook</th>
                <td>$facebook</td>
            </tr>
            <tr>
                <th>Penerima KPS</th>
                <td>$kps</td>
            </tr>
            <tr>
                <th>Penerima PIP</th>
                <td>$pip</td>
            </tr>
            <tr>
                <th>Penerima KIP</th>
                <td>$kip</td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td>$ayah</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>$ibu</td>
            </tr>
            <tr>
                <th>No. HP/WhatsApp Orang Tua</th>
                <td>$telp_ortu</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>$ket</td>
            </tr>
        </table>
        <center>
            <button type='submit' class='btn btn-danger'>Hapus</button>
            <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_peserta.php'>Kembali</a>
        </center>
    </form>
    </div>";

    include "footer.php";
?>