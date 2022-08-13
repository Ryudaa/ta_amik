<?php
    session_start();
    $username = $_SESSION['username'];
    $isLoggedIn = $_SESSION['isLoggedIn'];
    $lv = $_SESSION['lv'];

    if($isLoggedIn != '1'){
        session_destroy();
        header('Location: index.php');
    }
?>
<!doctype html>
<html lang="id">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Penambahan Kelas Tekhno Edu Center</title>
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
            <h2 class="text-center">Tambah Kelas Tekhno</h2>
            <form class="needs-validation" novalidate action="proses_tambah_kelas.php" method="post">
                <div class="form-group">
                    <label for="kdkelas">Kode Kelas</label>
                    <input maxlength="50" type="text" class="form-control" name="kdkelas" id="kdkelas" placeholder="Kode Kelas" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kelas</label>
                    <input maxlength="50" type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kelas" required>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input maxlength="50" type="number" class="form-control" name="biaya" id="biaya" placeholder="Biaya" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
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
