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
        session_destroy();
        header('Location: index.php');
    }
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kelas Tekhno</title>
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

            .isi {
                margin-top: 30px;
            }

            .table-sm {
                font-size: 10pt;
            }
        </style>
    </head>
    <body>
        <?php include "nav.php"; ?>
        <div class="container isi">
            <h2 class="text-center align-middle">Lihat Kelas</h2>
            <form method="post">
                <table>
                    <tr>
                        <td><a style='margin-bttom:100px;' class='btn btn-success' role='button' href='form_tambah_kelas.php'>Tambah Kelas</a></td>
                    </tr>
                    <tr>
                        <td>Cari berdasarkan nama kelas:</td>
                        <td>
                            <input type="text" maxlength="50" class="form-control form-control-sm" name="txtcari" placeholder=""
                            <?php
                                if(isset($_POST['txtcari']))
                                {
                                    $txtcari = $_POST['txtcari'];
                                    echo "value='$txtcari'";
                                }
                            ?>>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-secondary">Cari</button>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Kode Kelas</th>
                        <th class="text-center align-middle" style="min-width: 120px;">Nama Kelas</th>
                        <th class="text-center align-middle">Biaya</th>
                        <th class="text-center align-middle" style="min-width: 120px;" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        error_reporting("E_ALL ^ E_NOTICE");

                        include "db.php";
                        if(isset($_POST['txtcari']))
                        {
                            $cari = mysqli_real_escape_string($mysqli, $_POST['txtcari']);
                            $sql = "SELECT * FROM kelas WHERE nama LIKE '%$cari%'";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            if(mysqli_num_rows($hasil) > 0)
                            {
                                while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <tr>
                                        <td>$kolom[kdkelas]</td>
                                        <td>$kolom[nama]</td>
                                        <td>$kolom[biaya]</td>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kdkelas]_edit' action='form_edit_kelas.php' method='post'>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nama' value='$kolom[nama]'/>
                                                <input hidden name='biaya' value='$kolom[biaya]'/>
                                                <button class='btn btn-secondary btn-sm'>Edit</button>
                                            </form>
                                        </td class='text-center align-middle'>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kdkelas]_hapus' action='form_hapus_kelas.php' method='post'>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nama' value='$kolom[nama]'/>
                                                <input hidden name='biaya' value='$kolom[biaya]'/>
                                                <button class='btn btn-danger btn-sm'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "Kelas tidak ditemukan";
                            }
                        } else {
                            $sql = "SELECT * FROM kelas";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            if(mysqli_num_rows($hasil) > 0)
                            {
                                while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <tr>
                                        <td>$kolom[kdkelas]</td>
                                        <td>$kolom[nama]</td>
                                        <td>$kolom[biaya]</td>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kdkelas]_edit' action='form_edit_kelas.php' method='post'>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nama' value='$kolom[nama]'/>
                                                <input hidden name='biaya' value='$kolom[biaya]'/>
                                                <button class='btn btn-secondary btn-sm'>Edit</button>
                                            </form>
                                        </td>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kdkelas]_hapus' action='form_hapus_kelas.php' method='post'>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nama' value='$kolom[nama]'/>
                                                <input hidden name='biaya' value='$kolom[biaya]'/>
                                                <button class='btn btn-danger btn-sm'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php include "footer.php"; ?>
    </body>
    <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</html>