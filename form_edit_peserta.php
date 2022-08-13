<?php
    session_start();
    $username = $_SESSION['username'];
    $isLoggedIn = $_SESSION['isLoggedIn'];
    $lv = $_SESSION['lv'];

    if($isLoggedIn != '1'){
        session_destroy();
        header('Location: index.php');
    }
    
    #if($lv != 'Staff'){
    #    header('Location: form_daftar_kelas.php');
    #}
?>
<!doctype html>
<html lang="id">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Data Peserta</title>
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
            .container {
                max-width: 960px;
            }
        </style>
    </head>

    <body>

        <?php
            include "nav.php";
            include "db.php";
            
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
            if($lv == 'Staff'){
                $ket = mysqli_real_escape_string($mysqli, $_POST['ket']);
            }
        ?>

        <div class="container">
            <h2 class="text-center">Edit Data</h2>
            <form class="needs-validation" novalidate action="proses_edit_peserta.php" method="POST">
                <input hidden name="username" <?php echo "value='$username'"; ?> />
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input maxlength="50" type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"
                        <?php echo "value='$nama_lengkap'" ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="L"
                        <?php
                            if($jenis_kelamin == "L"){ echo "selected"; }
                        ?>
                        >Laki-laki</option>
                        <option
                        <?php
                            if($jenis_kelamin == "P"){ echo "selected"; }
                        ?>
                        value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                        <?php echo "value='$tempat_lahir'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input maxlength="50" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                        <?php echo "value='$tanggal_lahir'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="custom-select" name="agama" id="agama" required>
                        <option value="Islam"
                        <?php
                            if($agama == "Islam"){ echo "selected"; }
                        ?>
                        >Islam</option>
                        <option value="Kristen"
                        <?php
                            if($agama == "Kristen"){ echo "selected"; }
                        ?>
                        >Kristen</option>
                        <option value="Khatolik"
                        <?php
                            if($agama == "Khatolik"){ echo "selected"; }
                        ?>
                        >Khatolik</option>
                        <option value="Hindu"
                        <?php
                            if($agama == "Hindu"){ echo "selected"; }
                        ?>
                        >Hindu</option>
                        <option value="Budha"
                        <?php
                            if($agama == "Budha"){ echo "selected"; }
                        ?>
                        >Budha</option>
                        <option value="Khonghucu"
                        <?php
                            if($agama == "Khonghucu"){ echo "selected"; }
                        ?>
                        >Khonghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <select class="custom-select" name="kewarganegaraan" id="kewarganegaraan" required>
                        <option value="WNI"
                        <?php
                            if($kewarganegaraan == "WNI"){ echo "selected"; }
                        ?>
                        >WNI</option>
                        <option value="WNA"
                        <?php
                            if($kewarganegaraan == "WNA"){ echo "selected"; }
                        ?>
                        >WNA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input maxlength="50" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                    <?php echo "value='$alamat'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="kelurahan_desa">Kelurahan/Desa</label>
                    <input maxlength="50" type="text" class="form-control" name="kelurahan_desa" id="kelurahan_desa" placeholder="Kelurahan/Desa"
                    <?php echo "value='$kelurahan_desa'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input maxlength="50" type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan"
                    <?php echo "value='$kecamatan'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="kabupaten_kota">Kabupaten/Kota</label>
                    <input maxlength="50" type="text" class="form-control" name="kabupaten_kota" id="kabupaten_kota" placeholder="Kabupaten/Kota"
                    <?php echo "value='$kabupaten_kota'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="telp">No. HP / WhatsApp</label>
                    <input
                    <?php echo "value='$telp'"; ?>
                    maxlength="15" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="telp" id="telp" placeholder="No. HP / Whatsapp" required>
                </div>
                <div class="form-group">
                    <label for="alat_transportasi">Alat Transportasi</label>
                    <input maxlength="50" type="text" class="form-control" name="alat_transportasi" id="alat_transportasi" placeholder="Alat Transportasi"
                    <?php echo "value='$alat_transportasi'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="nik">Nomer Induk Kependudukan (NIK)</label>
                    <input
                    <?php echo "value='$nik'"; ?>
                    maxlength="16" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="nik" id="nik" placeholder="NIK" required>
                    <small id="nik_help" class="form-text text-muted">Jika belum memiliki KTP maka diisi angka 0</small>
                </div>
                <div class="form-group">
                    <label for="instagram">Akun Instagram</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input maxlength="20" type="text" class="form-control" name="instagram" id="instagram" placeholder="akun_instagram"
                        <?php echo "value='$instagram'"; ?>
                        required>
                    </div>
                    <small id="ig_help" class="form-text text-muted">Jika tidak memiliki akun Instagram maka diisi angka 0</small>
                </div>
                <div class="form-group">
                    <label for="facebook">Akun Facebook</label>
                    <input maxlength="50" type="text" class="form-control" name="facebook" id="facebook" placeholder="Akun Facebook"
                    <?php echo "value='$facebook'"; ?>
                    required>
                    <small id="fb_help" class="form-text text-muted">Jika tidak memiliki akun Facebook maka diisi angka 0</small>
                </div>
                <div class="form-group">
                    <label for="kps">Penerima KPS</label>
                    <div id="kps">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kps" id="kps1" value="Ya"
                            <?php 
                                if($kps=="Ya"){echo "checked";}
                            ?>
                            required>
                            <label class="form-check-label" for="kps1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kps" id="kps2" value="Tidak"
                            <?php 
                                if($kps=="Tidak"){echo "checked";}
                            ?>
                            required>
                            <label class="form-check-label" for="kps2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pip">Penerima PIP</label>
                    <div id="pip">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pip" id="pip1" value="Ya"
                            <?php 
                                if($pip=="Ya"){echo "checked";}
                            ?>
                            required>
                            <label class="form-check-label" for="pip1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pip" id="pip2" value="Tidak"
                            <?php 
                                if($pip=="Tidak"){echo "checked";}
                            ?>
                            required>
                            <label class="form-check-label" for="pip2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kip">Penerima KIP</label>
                    <div id="kip">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kip" id="kip1" value="Ya"
                            <?php 
                                if($kip=="Ya"){echo "checked";}
                            ?>
                            required>
                            <label class="form-check-label" for="kip1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kip" id="kip2" value="Tidak"
                            <?php 
                                if($kip=="Tidak"){echo "checked";}
                            ?>
                            required>
                            <label class="form-check-label" for="kip2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ayah">Nama Ayah</label>
                    <input maxlength="50" type="text" class="form-control" name="ayah" id="ayah" placeholder="Nama Ayah"
                    <?php echo "value='$ayah'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="ibu">Nama Ibu</label>
                    <input maxlength="50" type="text" class="form-control" name="ibu" id="ibu" placeholder="Nama Ibu"
                    <?php echo "value='$ibu'"; ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="telp_ortu">No. HP / WhatsApp Orang Tua</label>
                    <input
                    <?php echo "value='$telp_ortu'"; ?>
                    maxlength="15" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="telp_ortu" id="telp_ortu" placeholder="No. HP / Whatsapp Orang Tua" required>
                </div>
                <?php if($lv == 'Staff'){
                    echo '<div class="form-group">';
                    echo '<label for="ket">Keterangan</label>';
                    echo '<input maxlength="50" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan"';
                    echo "value='$ket'></div>";
                }
                ?>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <?php include "footer.php"; ?>
    </body>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            alert("Semua kolom harus diisi");
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>
</html>
