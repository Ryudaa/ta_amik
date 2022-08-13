<?php
    include "db.php";
    echo "
    <head>
    <style>
    th {
        max-width: 120px;
    }
    </style>
    </head>
    ";
    include "head.php";
    
    include "nav.php";

    $kd_daftar = mysqli_real_escape_string($mysqli, $_POST['kd_daftar']);
    $username_edit = mysqli_real_escape_string($mysqli, $_POST['username']);
    $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
    $tgl_daftar = mysqli_real_escape_string($mysqli, $_POST['tgl_daftar']);
    $tgl_selesai = mysqli_real_escape_string($mysqli, $_POST['tgl_selesai']);
    $ket = mysqli_real_escape_string($mysqli, $_POST['ket']);

    echo "<div class='container'>
    <center><h3 style='margin-top:10px;'>Data berikut akan dihapus:</h3></center>
    <form action='proses_hapus_daftar.php' method='post'>
        <table class='table table-bordered'>
            <tr>
                <th>Kode Daftar</th>
                <td>$kd_daftar<input type='hidden' name='kd_daftar' value='$kd_daftar'></td>
            </tr>
            <tr>
                <th>Username</th>
                <td>$username_edit</td>
            </tr>
            <tr>
                <th>Kode Kelas</th>
                <td>$kdkelas</td>
            </tr>
            <tr>
                <th>Tanggal Daftar</th>
                <td>$tgl_daftar</td>
            </tr>
            <tr>
                <th>Tanggal Selesai</th>
                <td>$tgl_selesai</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>$ket</td>
            </tr>
        </table>
        <center>
            <button type='submit' class='btn btn-danger'>Hapus</button>
            <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_daftar.php'>Kembali</a>
        </center>
    </form>
    </div>";

    include "footer.php";
?>