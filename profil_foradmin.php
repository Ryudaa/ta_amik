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
    include "head_login.php";
    
    include "nav.php";

    if($lv != 'Staff' || $lv != 'Admin'){
        header('Location: profil.php');
    }
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
    <center><h3 style='margin-top:10px;'>Data diri:</h3></center>
        <table class='table table-bordered'>
            <tr>
                <th>Username</th>
                <td>$username</td>
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
                <td>$telp</td>
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
        <table>
        <th width='50'>
        <form id='edit_profil' action='form_edit_peserta.php' method='post'>
            <input hidden name='username' value='$username'/>
            <input hidden name='nama_lengkap' value='$nama_lengkap'/>
            <input hidden name='jenis_kelamin' value='$jenis_kelamin'/>
            <input hidden name='tempat_lahir' value='$tempat_lahir'/>
            <input hidden name='tanggal_lahir' value='$tanggal_lahir'/>
            <input hidden name='agama' value='$agama'/>
            <input hidden name='kewarganegaraan' value='$kewarganegaraan'/>
            <input hidden name='alamat' value='$alamat'/>
            <input hidden name='kelurahan_desa' value='$kelurahan_desa'/>
            <input hidden name='kecamatan' value='$kecamatan'/>
            <input hidden name='kabupaten_kota' value='$kabupaten_kota'/>
            <input hidden name='telp' value='$telp'/>
            <input hidden name='alat_transportasi' value='$alat_transportasi'/>
            <input hidden name='nik' value='$nik'/>
            <input hidden name='instagram' value='$instagram'/>
            <input hidden name='facebook' value='$facebook'/>
            <input hidden name='kps' value='$kps'/>
            <input hidden name='pip' value='$pip'/>
            <input hidden name='kip' value='$kip'/>
            <input hidden name='ayah' value='$ayah'/>
            <input hidden name='ibu' value='$ibu'/>
            <input hidden name='telp_ortu' value='$telp_ortu'/>
            <input hidden name='ket' value='$ket'/>
            <button class='btn btn-primary btn-sm'>Edit</button>
        </form>
        </th>
        <th>
        <form id='ganti_password' action='form_buat_password.php' method='post'>
            <input hidden name='username' value='$username'/>
            <button class='btn btn-primary btn-sm'>Ganti Password</button>
        </form>
        </th>
        <table class='table table-sm table-hover table-bordered'>
            <thead>
                <tr>
                    <th class='text-center align-middle'>Kode Daftar</th>
                    <th class='text-center align-middle'>Kode Kelas</th>
                    <th class='text-center align-middle'>Tanggal Daftar</th>
                    <th class='text-center align-middle'>Tanggal Selesai</th>
                    <th class='text-center align-middle'>Keterangan</th>
                </tr>
            </thead>
        <tbody>";
            
            $sql = "SELECT * FROM daftar WHERE username = '$username'";
            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
            if(mysqli_num_rows($hasil) > 0)
            {
                while($kolom = mysqli_fetch_array($hasil))
                {
                    echo "
                    <tr>
                        <td>$kolom[kd_daftar]</td>
                        <td>$kolom[kdkelas]</td>
                        <td>$kolom[tgl_daftar]</td>
                        <td>$kolom[tgl_selesai]</td>
                        <td>$kolom[ket]</td>
                    </tr>
                    ";
                }
            }
                ?>
            </tbody>
        </table>
    </div>
<?php
    include "footer.php";
?>