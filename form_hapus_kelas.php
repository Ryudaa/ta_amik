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

    $kdkelas = mysqli_real_escape_string($mysqli, $_POST['kdkelas']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $biaya = mysqli_real_escape_string($mysqli, $_POST['biaya']);

    echo "<div class='container'>
    <center><h3 style='margin-top:10px;'>Data berikut akan dihapus:</h3></center>
    <form action='proses_hapus_kelas.php' method='post'>
        <table class='table table-bordered'>
            <tr>
                <th>Kode Kelas</th>
                <td>$kdkelas<input type='hidden' name='kdkelas' value='$kdkelas'></td>
            </tr>
            <tr>
                <th>Nama Kelas</th>
                <td>$nama</td>
            </tr>
            <tr>
                <th>Biaya</th>
                <td>$biaya</td>
            </tr>
        </table>
        <center>
            <button type='submit' class='btn btn-danger'>Hapus</button>
            <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='view_kelas.php'>Kembali</a>
        </center>
    </form>
    </div>";

    include "footer.php";
?>