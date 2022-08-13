<?php
    session_start();
    $username = $_SESSION['username'];
    $isLoggedIn = $_SESSION['isLoggedIn'];
    $lv = $_SESSION['lv'];

    if($isLoggedIn != '1'){
        session_destroy();
        header('Location: index.php');
    }
    
    #if($lv != 'Staff'&&){
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
        ?>

        <div class="container">
            <h2 class="text-center">Ganti Password</h2>
            <form class="needs-validation" novalidate action="proses_ganti_password_staff.php" method="POST">
                <input hidden name="username" <?php echo "value='$username'"; ?> />
                <div class="form-group">
                    <label for="password_baru">Password Baru</label>
                    <input maxlength="50" type="password" onkeyup="check()" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru"
                    required>
                    <label for="ulangi">Ulangi Password</label>
                    <input maxlength="50" type="password" onkeyup="check()" class="form-control" name="ulangi" id="ulangi" placeholder="Ulangi Password"
                    required>
                    <label id="message"></label>
                </div>
                <button id="button" type="submit" class="btn btn-primary" disabled='true'>Simpan</button>
            </form>
        </div>

        <?php include "footer.php"; ?>
    </body>

    <script>
    function check() {
        if (document.getElementById('password_baru').value ==
            document.getElementById('ulangi').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
            document.getElementById('button').disabled = false;
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
            document.getElementById('button').disabled = true;
        }
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
