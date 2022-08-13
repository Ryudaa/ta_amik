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
            <h2 class="text-center">Daftar Kelas Tekhno</h2>
            <form class="needs-validation" novalidate action="proses_daftar_kelas.php" method="post">
                <div class="form-group">
                    <label for="training">Daftar Kelas</label>
                    <select class="custom-select" name="kdkelas" id="kdkelas" onchange="ubahBiaya(event)" required>
                        <option id="cb" value="" disabled selected hidden>Training yang ingin diikuti</option>
                        <?php
                            include "db.php";
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

                            while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <option value='$kolom[kdkelas]'>$kolom[nama]</option>
                                    ";
                                }
                        ?>
                    </select>
                    <br><br>
                    <label for="training">Biaya Kelas</label>
                    <select class="custom-select" name="biaya_dis" id="biaya_dis" disabled>
                        <option value="" disabled selected hidden>Biaya training</option>
                        <?php
                            include "db.php";
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

                            while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <option value='$kolom[biaya]'>$kolom[biaya]</option>
                                    ";
                                }
                        ?>
                    </select>
                    <select hidden class="custom-select" name="biaya" id="biaya">
                        <option value="" selected hidden>Biaya training</option>
                        <?php
                            include "db.php";
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

                            while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <option value='$kolom[biaya]'>$kolom[biaya]</option>
                                    ";
                                }
                        ?>
                    </select>
                    <select hidden class="custom-select" name="nama" id="nama">
                        <option value="" disabled selected hidden>nama kelas</option>
                        <?php
                            include "db.php";
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

                            while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <option value='$kolom[nama]'>$kolom[nama]</option>
                                    ";
                                }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Daftar</button>
            </form>
        </div>

        <?php include "footer.php"; ?>
    </body>

    <script>
        function ubahBiaya(e) {
            document.getElementById("biaya_dis").selectedIndex = e.target.selectedIndex;
            document.getElementById("biaya").selectedIndex = e.target.selectedIndex;
            document.getElementById("nama").selectedIndex = e.target.selectedIndex;
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