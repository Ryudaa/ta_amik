<!doctype html>
<html lang="id">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Pendaftaran Tekhno Edu Center</title>
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
        <?php include "nav.php"; ?>
        <div class="container">
            <h2 class="text-center">Daftar Peserta Tekhno</h2>
            <form class="needs-validation" novalidate action="proses_daftar_peserta.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input maxlength="50" type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input maxlength="50" type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input maxlength="50" type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="custom-select" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="" disabled selected hidden>Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input maxlength="50" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                </div>
                <div class="form-group">
                    <label for="agama">Agama</label>
                    <select class="custom-select" name="agama" id="agama" required>
                        <option value="" disabled selected hidden>Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Khatolik">Khatolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <select class="custom-select" name="kewarganegaraan" id="kewarganegaraan" required>
                        <option value="" disabled selected hidden>Kewarganegaraan</option>
                        <option value="WNI">WNI</option>
                        <option value="WNA">WNA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input maxlength="50" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                </div>
                <div class="form-group">
                    <label for="kelurahan_desa">Kelurahan/Desa</label>
                    <input maxlength="50" type="text" class="form-control" name="kelurahan_desa" id="kelurahan_desa" placeholder="Kelurahan/Desa" required>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input maxlength="50" type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" required>
                </div>
                <div class="form-group">
                    <label for="kabupaten_kota">Kabupaten/Kota</label>
                    <input maxlength="50" type="text" class="form-control" name="kabupaten_kota" id="kabupaten_kota" placeholder="Kabupaten/Kota" required>
                </div>
                <div class="form-group">
                    <label for="telp">No. HP / WhatsApp</label>
                    <input maxlength="13" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="telp" id="telp" placeholder="No. HP / Whatsapp" required>
                </div>
                <div class="form-group">
                    <label for="alat_transportasi">Alat Transportasi</label>
                    <input maxlength="50" type="text" class="form-control" name="alat_transportasi" id="alat_transportasi" placeholder="Alat Transportasi" required>
                </div>
                <div class="form-group">
                    <label for="nik">Nomer Induk Kependudukan (NIK)</label>
                    <input maxlength="16" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="nik" id="nik" placeholder="NIK" required>
                    <small id="nik_help" class="form-text text-muted">Jika belum memiliki KTP maka diisi angka 0</small>
                </div>
                <div class="form-group">
                    <label for="instagram">Akun Instagram</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input maxlength="20" type="text" class="form-control" name="instagram" id="instagram" placeholder="akun_instagram" required>
                    </div>
                    <small id="ig_help" class="form-text text-muted">Jika tidak memiliki akun Instagram maka diisi angka 0</small>
                </div>
                <div class="form-group">
                    <label for="facebook">Akun Facebook</label>
                    <input maxlength="50" type="text" class="form-control" name="facebook" id="facebook" placeholder="Akun Facebook" required>
                    <small id="fb_help" class="form-text text-muted">Jika tidak memiliki akun Facebook maka diisi angka 0</small>
                </div>
                <div class="form-group">
                    <label for="kps">Penerima KPS</label>
                    <div id="kps">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kps" id="kps1" value="Ya" required>
                            <label class="form-check-label" for="kps1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kps" id="kps2" value="Tidak" required>
                            <label class="form-check-label" for="kps2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pip">Penerima PIP</label>
                    <div id="pip">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pip" id="pip1" value="Ya" required>
                            <label class="form-check-label" for="pip1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pip" id="pip2" value="Tidak" required>
                            <label class="form-check-label" for="pip2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kip">Penerima KIP</label>
                    <div id="kip">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kip" id="kip1" value="Ya" required>
                            <label class="form-check-label" for="kip1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kip" id="kip2" value="Tidak" required>
                            <label class="form-check-label" for="kip2">Tidak</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ayah">Nama Ayah</label>
                    <input maxlength="50" type="text" class="form-control" name="ayah" id="ayah" placeholder="Nama Ayah" required>
                </div>
                <div class="form-group">
                    <label for="ibu">Nama Ibu</label>
                    <input maxlength="50" type="text" class="form-control" name="ibu" id="ibu" placeholder="Nama Ibu" required>
                </div>
                <div class="form-group">
                    <label for="telp_ortu">No. HP / WhatsApp Orang Tua</label>
                    <input maxlength="15" type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" name="telp_ortu" id="telp_ortu" placeholder="No. HP / Whatsapp Orang Tua" required>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
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
