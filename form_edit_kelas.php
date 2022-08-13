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
        <title>Edit Data Kelas</title>
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
            
            $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
            $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
            $biaya = mysqli_real_escape_string($mysqli, $_POST['biaya']);
        ?>

        <div class="container">
            <h2 class="text-center">Edit Data</h2>
            <form class="needs-validation" novalidate action="proses_edit_kelas.php" method="POST">
                <div class="form-group">
                    <label for="kdkelas2">Kode Kelas</label>
                    <input hidden maxlength="20" type="text" class="form-control" name="kdkelas" id="kdkelas"
                        <?php echo "value='$kdkelas'" ?>
                    required>
                    <input maxlength="20" type="text" class="form-control" name="kdkelas2" id="kdkelas2" disabled
                        <?php echo "value='$kdkelas'" ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input maxlength="225" type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap"
                        <?php echo "value='$nama'" ?>
                    required>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="number" class="form-control" name="biaya" id="biaya" placeholder="Biaya"
                        <?php echo "value='$biaya'"; ?>
                    required>
                </div>
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
