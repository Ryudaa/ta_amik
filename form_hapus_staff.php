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

    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $tingkat = mysqli_real_escape_string($mysqli, $_POST['tingkat']);

    echo "<div class='container'>
    <center><h3 style='margin-top:10px;'>Data berikut akan dihapus:</h3></center>
    <form action='proses_hapus_staff.php' method='post'>
        <table class='table table-bordered'>
            <tr>
                <th>Username</th>
                <td>$username<input type='hidden' name='username' value='$username'></td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>$nama</td>
            </tr>
            <tr>
                <th>Tingkat</th>
                <td>$tingkat</td>
            </tr>
        </table>
        <center>
            <button type='submit' class='btn btn-danger'>Hapus</button>
            <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_staff.php'>Kembali</a>
        </center>
    </form>
    </div>";

    include "footer.php";
?>