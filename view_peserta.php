<?php
    session_start();
    $username = $_SESSION['username'];
    $isLoggedIn = $_SESSION['isLoggedIn'];
    $lv = $_SESSION['lv'];

    if($isLoggedIn != '1'){
        session_destroy();
        header('Location: index.php');
    }
    
    if($lv != 'Staff' && $lv != 'Admin'){
        session_destroy();
        header('Location: index.php');
    }
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peserta Tekhno</title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            html {
                height: 100%;
            }

            body {
                min-height: 100%;
                display: flex;
                flex-direction: column;
            }

            footer {
                height: 100px;
                margin-top: auto;
                text-align: center;
                padding: 40px 50px;
            }

            .isi {
                margin-top: 30px;
            }

            .table-sm {
                font-size: 10pt;
            }
        </style>
    </head>
    <body>
        <?php include "nav.php"; ?>
        <div class="container isi">
            <h2 class="text-center align-middle">Lihat Peserta</h2>
            <form method="post">
                <table>
                    <tr>
                        <td>Cari berdasarkan nama:</td>
                        <td>
                            <input type="text" maxlength="50" class="form-control form-control-sm" name="txtcari" placeholder=""
                            <?php
                                if(isset($_POST['txtcari']))
                                {
                                    $txtcari = $_POST['txtcari'];
                                    echo "value='$txtcari'";
                                }
                            ?>>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table table-sm table-hover table-bordered"> <!-- table-responsive-->
                <thead>
                    <tr>
                        <th class="text-center align-middle">Username</th>
                        <th class="text-center align-middle" style="min-width: 120px;">Nama Lengkap</th>
                        <th class="text-center align-middle">Jenis Kelamin</th>
                        <!-- tes
                        <th class="text-center align-middle" style="min-width: 120px;">Tempat Lahir</th>
                        <th class="text-center align-middle" style="min-width: 100px;">Tanggal Lahir</th>
                        <th class="text-center align-middle">Agama</th>
                        <th class="text-center align-middle">Kewarganegaraan</th>
                        <th class="text-center align-middle" style="min-width: 250px;">Alamat</th>
                        <th class="text-center align-middle">Kelurahan/Desa</th>
                        <th class="text-center align-middle">Kecamatan</th>
                        <th class="text-center align-middle">Kabupaten/Kota</th>
                            -->
                        <th class="text-center align-middle">No. HP / WhatsApp</th>
                        <!--
                        <th class="text-center align-middle">Alat Transportasi</th>
                        <th class="text-center align-middle">NIK</th>
                        <th class="text-center align-middle">Instagram</th>
                        <th class="text-center align-middle">Facebook</th>
                        <th class="text-center align-middle">Penerima KPS</th>
                        <th class="text-center align-middle">Penerima PIP</th>
                        <th class="text-center align-middle">Penerima KIP</th>
                        <th class="text-center align-middle" style="min-width: 120px;">Nama Ayah</th>
                        <th class="text-center align-middle" style="min-width: 120px;">Nama Ibu</th>
                            -->
                        <th class="text-center align-middle" style="min-width: 150px;">No. HP/ WhatsApp Orang Tua</th>
                        <th class="text-center align-middle">Keterangan</th>
                        <th class="text-center align-middle" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        error_reporting("E_ALL ^ E_NOTICE");

                        include "db.php";
                        if(isset($_POST['txtcari']))
                        {
                            $cari = mysqli_real_escape_string($mysqli, $_POST['txtcari']);
                            $sql = "SELECT * FROM peserta WHERE nama_lengkap LIKE '%$cari%'";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            if(mysqli_num_rows($hasil) > 0)
                            {
                                while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <tr>
                                        <td>$kolom[username]</td>
                                        <td>$kolom[nama_lengkap]</td>
                                        <td>$kolom[jenis_kelamin]</td>
                                        <!--
                                        <td>$kolom[tempat_lahir]</td>
                                        <td>$kolom[tanggal_lahir]</td>
                                        <td>$kolom[agama]</td>
                                        <td>$kolom[kewarganegaraan]</td>
                                        <td>$kolom[alamat]</td>
                                        <td>$kolom[kelurahan_desa]</td>
                                        <td>$kolom[kecamatan]</td>
                                        <td>$kolom[kabupaten_kota]</td>
                                        -->
                                        <td>$kolom[telp]</td>
                                        <!--
                                        <td>$kolom[alat_transportasi]</td>
                                        <td>$kolom[nik]</td>
                                        <td>$kolom[instagram]</td>
                                        <td>$kolom[facebook]</td>
                                        <td>$kolom[kps]</td>
                                        <td>$kolom[pip]</td>
                                        <td>$kolom[kip]</td>
                                        <td>$kolom[ayah]</td>
                                        <td>$kolom[ibu]</td>
                                        -->
                                        <td>$kolom[telp_ortu]</td>
                                        <td>$kolom[ket]</td>
                                        <td>
                                            <form id='$kolom[username]_edit' action='profil_foradmin.php' method='post'>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='nama_lengkap' value='$kolom[nama_lengkap]'/>
                                                <input hidden name='jenis_kelamin' value='$kolom[jenis_kelamin]'/>
                                                <input hidden name='tempat_lahir' value='$kolom[tempat_lahir]'/>
                                                <input hidden name='tanggal_lahir' value='$kolom[tanggal_lahir]'/>
                                                <input hidden name='agama' value='$kolom[agama]'/>
                                                <input hidden name='kewarganegaraan' value='$kolom[kewarganegaraan]'/>
                                                <input hidden name='alamat' value='$kolom[alamat]'/>
                                                <input hidden name='kelurahan_desa' value='$kolom[kelurahan_desa]'/>
                                                <input hidden name='kecamatan' value='$kolom[kecamatan]'/>
                                                <input hidden name='kabupaten_kota' value='$kolom[kabupaten_kota]'/>
                                                <input hidden name='telp' value='$kolom[telp]'/>
                                                <input hidden name='alat_transportasi' value='$kolom[alat_transportasi]'/>
                                                <input hidden name='nik' value='$kolom[nik]'/>
                                                <input hidden name='instagram' value='$kolom[instagram]'/>
                                                <input hidden name='facebook' value='$kolom[facebook]'/>
                                                <input hidden name='kps' value='$kolom[kps]'/>
                                                <input hidden name='pip' value='$kolom[pip]'/>
                                                <input hidden name='kip' value='$kolom[kip]'/>
                                                <input hidden name='ayah' value='$kolom[ayah]'/>
                                                <input hidden name='ibu' value='$kolom[ibu]'/>
                                                <input hidden name='telp_ortu' value='$kolom[telp_ortu]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-secondary btn-sm'>Lihat</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form id='$kolom[username]_hapus' action='form_hapus_peserta.php' method='post'>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='nama_lengkap' value='$kolom[nama_lengkap]'/>
                                                <input hidden name='jenis_kelamin' value='$kolom[jenis_kelamin]'/>
                                                <input hidden name='tempat_lahir' value='$kolom[tempat_lahir]'/>
                                                <input hidden name='tanggal_lahir' value='$kolom[tanggal_lahir]'/>
                                                <input hidden name='agama' value='$kolom[agama]'/>
                                                <input hidden name='kewarganegaraan' value='$kolom[kewarganegaraan]'/>
                                                <input hidden name='alamat' value='$kolom[alamat]'/>
                                                <input hidden name='kelurahan_desa' value='$kolom[kelurahan_desa]'/>
                                                <input hidden name='kecamatan' value='$kolom[kecamatan]'/>
                                                <input hidden name='kabupaten_kota' value='$kolom[kabupaten_kota]'/>
                                                <input hidden name='telp' value='$kolom[telp]'/>
                                                <input hidden name='alat_transportasi' value='$kolom[alat_transportasi]'/>
                                                <input hidden name='nik' value='$kolom[nik]'/>
                                                <input hidden name='instagram' value='$kolom[instagram]'/>
                                                <input hidden name='facebook' value='$kolom[facebook]'/>
                                                <input hidden name='kps' value='$kolom[kps]'/>
                                                <input hidden name='pip' value='$kolom[pip]'/>
                                                <input hidden name='kip' value='$kolom[kip]'/>
                                                <input hidden name='ayah' value='$kolom[ayah]'/>
                                                <input hidden name='ibu' value='$kolom[ibu]'/>
                                                <input hidden name='telp_ortu' value='$kolom[telp_ortu]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-danger btn-sm'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "Nama tidak ditemukan";
                            }
                        } else {
                            $sql = "SELECT * FROM peserta";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            if(mysqli_num_rows($hasil) > 0)
                            {
                                while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <tr>
                                        <td>$kolom[username]</td>
                                        <td>$kolom[nama_lengkap]</td>
                                        <td>$kolom[jenis_kelamin]</td>
                                        <!--
                                        <td>$kolom[tempat_lahir]</td>
                                        <td>$kolom[tanggal_lahir]</td>
                                        <td>$kolom[agama]</td>
                                        <td>$kolom[kewarganegaraan]</td>
                                        <td>$kolom[alamat]</td>
                                        <td>$kolom[kelurahan_desa]</td>
                                        <td>$kolom[kecamatan]</td>
                                        <td>$kolom[kabupaten_kota]</td>
                                        -->
                                        <td>$kolom[telp]</td>
                                        <!--
                                        <td>$kolom[alat_transportasi]</td>
                                        <td>$kolom[nik]</td>
                                        <td>$kolom[instagram]</td>
                                        <td>$kolom[facebook]</td>
                                        <td>$kolom[kps]</td>
                                        <td>$kolom[pip]</td>
                                        <td>$kolom[kip]</td>
                                        <td>$kolom[ayah]</td>
                                        <td>$kolom[ibu]</td>
                                        -->
                                        <td>$kolom[telp_ortu]</td>
                                        <td>$kolom[ket]</td>
                                        <td>
                                            <form id='$kolom[username]_edit' action='profil_foradmin.php' method='post'>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='nama_lengkap' value='$kolom[nama_lengkap]'/>
                                                <input hidden name='jenis_kelamin' value='$kolom[jenis_kelamin]'/>
                                                <input hidden name='tempat_lahir' value='$kolom[tempat_lahir]'/>
                                                <input hidden name='tanggal_lahir' value='$kolom[tanggal_lahir]'/>
                                                <input hidden name='agama' value='$kolom[agama]'/>
                                                <input hidden name='kewarganegaraan' value='$kolom[kewarganegaraan]'/>
                                                <input hidden name='alamat' value='$kolom[alamat]'/>
                                                <input hidden name='kelurahan_desa' value='$kolom[kelurahan_desa]'/>
                                                <input hidden name='kecamatan' value='$kolom[kecamatan]'/>
                                                <input hidden name='kabupaten_kota' value='$kolom[kabupaten_kota]'/>
                                                <input hidden name='telp' value='$kolom[telp]'/>
                                                <input hidden name='alat_transportasi' value='$kolom[alat_transportasi]'/>
                                                <input hidden name='nik' value='$kolom[nik]'/>
                                                <input hidden name='instagram' value='$kolom[instagram]'/>
                                                <input hidden name='facebook' value='$kolom[facebook]'/>
                                                <input hidden name='kps' value='$kolom[kps]'/>
                                                <input hidden name='pip' value='$kolom[pip]'/>
                                                <input hidden name='kip' value='$kolom[kip]'/>
                                                <input hidden name='ayah' value='$kolom[ayah]'/>
                                                <input hidden name='ibu' value='$kolom[ibu]'/>
                                                <input hidden name='telp_ortu' value='$kolom[telp_ortu]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-secondary btn-sm'>Lihat</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form id='$kolom[username]_hapus' action='form_hapus_peserta.php' method='post'>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='nama_lengkap' value='$kolom[nama_lengkap]'/>
                                                <input hidden name='jenis_kelamin' value='$kolom[jenis_kelamin]'/>
                                                <input hidden name='tempat_lahir' value='$kolom[tempat_lahir]'/>
                                                <input hidden name='tanggal_lahir' value='$kolom[tanggal_lahir]'/>
                                                <input hidden name='agama' value='$kolom[agama]'/>
                                                <input hidden name='kewarganegaraan' value='$kolom[kewarganegaraan]'/>
                                                <input hidden name='alamat' value='$kolom[alamat]'/>
                                                <input hidden name='kelurahan_desa' value='$kolom[kelurahan_desa]'/>
                                                <input hidden name='kecamatan' value='$kolom[kecamatan]'/>
                                                <input hidden name='kabupaten_kota' value='$kolom[kabupaten_kota]'/>
                                                <input hidden name='telp' value='$kolom[telp]'/>
                                                <input hidden name='alat_transportasi' value='$kolom[alat_transportasi]'/>
                                                <input hidden name='nik' value='$kolom[nik]'/>
                                                <input hidden name='instagram' value='$kolom[instagram]'/>
                                                <input hidden name='facebook' value='$kolom[facebook]'/>
                                                <input hidden name='kps' value='$kolom[kps]'/>
                                                <input hidden name='pip' value='$kolom[pip]'/>
                                                <input hidden name='kip' value='$kolom[kip]'/>
                                                <input hidden name='ayah' value='$kolom[ayah]'/>
                                                <input hidden name='ibu' value='$kolom[ibu]'/>
                                                <input hidden name='telp_ortu' value='$kolom[telp_ortu]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-danger btn-sm'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include "footer.php"; ?>
    </body>
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</html>