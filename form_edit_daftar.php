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
        header('Location: form_daftar_kelas.php');
    }
?>
<!doctype html>
<html lang="id">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Data Daftar</title>
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
            
            $kd_daftar = mysqli_real_escape_string($mysqli, $_POST['kd_daftar']);
            $username_edit = mysqli_real_escape_string($mysqli, $_POST['username']);
            $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
            $nmkelas = mysqli_real_escape_string($mysqli, $_POST['nmkelas']);
            $tgl_daftar = mysqli_real_escape_string($mysqli, $_POST['tgl_daftar']);
            $tgl_selesai = mysqli_real_escape_string($mysqli, $_POST['tgl_selesai']);
            $ket = mysqli_real_escape_string($mysqli, $_POST['ket']);
        ?>

        <div class="container">
            <h2 class="text-center">Edit Data</h2>
            <form class="needs-validation" novalidate action="proses_edit_daftar.php" method="POST">
                <div class="form-group">
                    <label for="kd_daftar2">Kode Daftar</label>
                    <input hidden maxlength="20" type="text" class="form-control" name="kd_daftar" id="kd_daftar"
                        <?php echo "value='$kd_daftar'" ?>
                    required>
                    <input maxlength="20" type="text" class="form-control" name="kd_daftar2" id="kd_daftar2" disabled
                        <?php echo "value='$kd_daftar'" ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input maxlength="50" type="text" class="form-control" name="username" id="username" placeholder="Username"
                        <?php echo "value='$username_edit'" ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="kdkelas">Kode Kelas / Nama Kelas</label>
                    <select class="custom-select" name="kdkelas" id="kdkelas" onchange="ubahKelas(event);" required>
                        <?php
                            include "db.php";
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

                            while($kolom = mysqli_fetch_array($hasil))
                                {
                                    if($kolom[kdkelas] != $kdkelas){
                                        echo "
                                        <option value='$kolom[kdkelas]'>$kolom[kdkelas] / $kolom[nama]</option>
                                        ";
                                    } else {
                                        echo "
                                        <option selected value='$kolom[kdkelas]'>$kolom[kdkelas] / $kolom[nama]</option>
                                        ";
                                    }
                                }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nmkelas">Kode Kelas / Nama Kelas</label>
                    <select class="custom-select" name="nmkelas" id="nmkelas" required>
                        <?php
                            include "db.php";
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

                            while($kolom = mysqli_fetch_array($hasil))
                                {
                                    if($kolom[kdkelas] != $kdkelas){
                                        echo "
                                        <option value='$kolom[nama]'>$kolom[nama]</option>
                                        ";
                                    } else {
                                        echo "
                                        <option selected value='$kolom[nama]'>$kolom[nama]</option>
                                        ";
                                    }
                                }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_daftar">Tanggal Daftar</label>
                    <input type="date" class="form-control" name="tgl_daftar" id="tgl_daftar"
                    <?php echo "value = $tgl_daftar" ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai"
                    <?php echo "value = $tgl_selesai" ?>
                    >
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input maxlength="225" type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan"
                        <?php echo "value='$ket'" ?>
                    >
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>

        <?php include "footer.php"; ?>
    </body>

    <script>
        function ubahKelas(e) {
            document.getElementById("nmkelas").selectedIndex = e.target.selectedIndex;
        }
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
