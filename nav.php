<?php
    if (!isset($_SESSION)) {session_start();}

    if(isset($_SESSION['username']) and isset($_SESSION['isLoggedIn']) and isset($_SESSION['lv'])){
        $username = $_SESSION['username'];
        $isLoggedIn = $_SESSION['isLoggedIn'];
        $lv = $_SESSION['lv'];
    } else {
        $username = '';
        $isLoggedIn = '0';
        $lv = '';
    }
?>

<nav class="navbar navbar-expand-lg navbar-light">
    <a href="index.php" class="navbar-brand">
    <img src="assets/img/cropped-tekhnotrainingeducenter-logo-150.png" width="50" height="50" class="d-inline-block align-top" alt="">
    <span style="vertical-align: middle;">Tekhno Training Edu Center</span></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav_menu">
        <span class="navbar-toggler-icon">

        </span>
    </button>
    <div class="collapse navbar-collapse" id="nav_menu">
        <ul class="navbar-nav ml-auto">
            <?php
                if($lv == "Peserta") {
                    echo "<li class='nav-item'><a href='form_daftar_kelas.php' class='nav-link'>Daftar Kelas</a></li>";
                    echo "<li class='nav-item'><a href='profil.php' class='nav-link'>Profil</a></li>";
                } elseif($lv == 'Staff') {
                    echo "<li class='nav-item'><a href='view_kelas.php' class='nav-link'>Lihat Kelas</a></li>";
                    echo "<li class='nav-item'><a href='view_daftar.php' class='nav-link'>Lihat Daftar</a></li>";
                    echo "<li class='nav-item'><a href='view_peserta.php' class='nav-link'>Lihat Peserta</a></li>";
                } elseif($lv == 'Admin'){
                    echo "<li class='nav-item'><a href='view_staff.php' class='nav-link'>Lihat Staff</a></li>";
                    echo "<li class='nav-item'><a href='view_kelas.php' class='nav-link'>Lihat Kelas</a></li>";
                    echo "<li class='nav-item'><a href='view_daftar.php' class='nav-link'>Lihat Daftar</a></li>";
                    echo "<li class='nav-item'><a href='view_peserta.php' class='nav-link'>Lihat Peserta</a></li>";
                }
                if($isLoggedIn == "1") {
                    echo "<li class='nav-item'><a href='logout.php' class='nav-link'>Logout</a></li>";
                } else {
                    echo "<li class='nav-item'><a href='index.php' class='nav-link'>Login</a></li>";
                }
            ?>
        </ul>
    <div>
</nav>