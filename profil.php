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

    $username = $_SESSION['username'];

    $sql = "SELECT * FROM peserta WHERE username = '$username'";
    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    if(mysqli_num_rows($hasil) > 0)
    {
        while($kolom = mysqli_fetch_array($hasil))
        {
            $nama_lengkap = $kolom['nama_lengkap'];
            $jenis_kelamin = $kolom['jenis_kelamin'];
            $tempat_lahir = $kolom['tempat_lahir'];
            $tanggal_lahir = $kolom['tanggal_lahir'];
            $agama = $kolom['agama'];
            $kewarganegaraan = $kolom['kewarganegaraan'];
            $alamat = $kolom['alamat'];
            $kelurahan_desa = $kolom['kelurahan_desa'];
            $kecamatan = $kolom['kecamatan'];
            $kabupaten_kota = $kolom['kabupaten_kota'];
            $telp = $kolom['telp'];
            $alat_transportasi = $kolom['alat_transportasi'];
            $nik = $kolom['nik'];
            $instagram = $kolom['instagram'];
            $facebook = $kolom['facebook'];
            $kps = $kolom['kps'];
            $pip = $kolom['pip'];
            $kip = $kolom['kip'];
            $ayah = $kolom['ayah'];
            $ibu = $kolom['ibu'];
            $telp_ortu = $kolom['telp_ortu'];
            $ket = $kolom['ket'];
        }
    }

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
            <button class='btn btn-primary btn-sm'>Edit</button>
        </form>
        </th>
        <th>
        <form id='ganti_password' action='form_ganti_password.php' method='post'>
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
                    <th class='text-center align-middle'>Bukti Bayar</th>
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
                        <td style='text-align:center'>";
                    if($kolom['bukti_bayar'] == ""){
                        echo "
                        <form action='upload_bukti_bayar.php' method='post' enctype='multipart/form-data'>
                            <input hidden name='kd_daftar' value='$kolom[kd_daftar]'/>
                            <input type='file' accept='.jpg,.png' name='image'/><br>
                            <input class='btn btn-primary btn-sm' type='submit' name='upload' value='Upload'/>
                        </form>
                        ";
                    } else {
                        echo "<a class='btn btn-primary btn-sm' href='proses_download_bukti.php?id=$kolom[kd_daftar]' target='_blank'>Bukti bayar $kolom[kd_daftar]</a>";
                        echo " <a class='btn btn-danger btn-sm' href='form_hapus_bukti.php?id=$kolom[kd_daftar]' target='_self'>Hapus</a>";
                    }
                    echo "</td>
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
<script>
    //function jadiRef(x){
    //    var blobURL = URL.createObjectURL(x);
    //    return blobURL;
    //}
    function downloadBlob(blob, filename){
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;

        a.click();

        return a;
    }
</script>