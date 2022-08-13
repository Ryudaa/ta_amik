<?php
    session_start();
    if(isset($_SESSION['username'])){    
        $username = $_SESSION['username'];
        $isLoggedIn = $_SESSION['isLoggedIn'];
        $lv = $_SESSION['lv'];

        if($lv == 'Staff' || $lv == 'Admin'){
            header('Location: view_peserta.php');
        }
        if($lv == 'Peserta'){
            header('Location: profil.php');
        }
    }
    include "db.php";

    if(!empty($_POST)){
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $pass = mysqli_real_escape_string($mysqli, md5($_POST['pass']));
        $lv = mysqli_real_escape_string($mysqli, $_POST['lv']);

        if($lv=="Admin"){
            $sql = "SELECT * FROM akun WHERE username = '$username' AND tingkat = 'Admin' AND password = '$pass'";
            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

            if($hasil){
                if(mysqli_num_rows($hasil) > 0)
                {
                    $_SESSION['isLoggedIn'] = "1";
                    $_SESSION['username'] = "$username";
                    $_SESSION['lv'] = "$lv";
                    header('Location: view_peserta.php');
                }
            }
        } elseif($lv=="Staff") {
            $sql = "SELECT * FROM akun WHERE username = '$username' AND tingkat = 'Staff' AND password = '$pass'";
            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

            if($hasil){
                if(mysqli_num_rows($hasil) > 0)
                {
                    $_SESSION['isLoggedIn'] = "1";
                    $_SESSION['username'] = "$username";
                    $_SESSION['lv'] = "$lv";
                    header('Location: view_peserta.php');
                }
            }
        } else {
            $sql = "SELECT * FROM peserta WHERE username = '$username' AND password = '$pass'";
            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

            if($hasil){
                if(mysqli_num_rows($hasil) > 0)
                {
                    $_SESSION['isLoggedIn'] = "1";
                    $_SESSION['username'] = "$username";
                    $_SESSION['lv'] = "$lv";
                    header('Location: form_daftar_kelas.php');
                }
            }
        }
    }

    include "head_login.php";
    include "nav.php";
?>
<div class="container">
    <h2 class="text-center">Login</h2>
    <form class="needs-validation" novalidate method="post">
        <div class="form-group">
            <label for="nama_lengkap">Username</label>
            <input maxlength="10" type="text" class="form-control" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Password</label>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="lv">Login Sebagai</label>
            <select class="custom-select" name="lv" id="lv" required>
                <option value="Peserta" selected>Peserta</option>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
            </select>
        </div>
        <?php
            if(!empty($_POST)){
                $username = mysqli_real_escape_string($mysqli, $_POST['username']);
                $pass = mysqli_real_escape_string($mysqli, md5($_POST['pass']));
        
                $status = $_POST['lv'];

                if($status == 'Staff'){
                    $sql = "SELECT * FROM akun WHERE username = '$username' AND tingkat='Staff' AND password = '$pass'";
                    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                } elseif($status == 'Admin') {
                    $sql = "SELECT * FROM akun WHERE username = '$username' AND tingkat='Admin' AND password = '$pass'";
                    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                } else {
                    $sql = "SELECT * FROM peserta WHERE username = '$username' AND password = '$pass'";
                    $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                }
        
                if($hasil){
                    if(mysqli_num_rows($hasil) == 0)
                    {
                        echo "<p style='color:red;'>Username atau password salah.</p>";
                    }
                }
            }
        ?>
        <button type="submit" class="btn btn-primary">Login</button>
        <a class='btn btn-secondary' role='button' href='form_daftar_peserta.php'>Daftar Peserta</a>
    </form>
</div>
<?php
    include "footer.php";
?>

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
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>