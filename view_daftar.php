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
        <title>Pendaftar Tekhno</title>
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
            <h2 class="text-center align-middle">Lihat Pendaftar</h2>
            <form method="post">
                <table>
                    <tr>
                        <td>Cari berdasarkan username:</td>
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
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </td>
                    </tr>
                </table>
            </form>
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center align-middle">Kode Daftar</th>
                        <th class="text-center align-middle" style="min-width: 120px;">Username</th>
                        <th class="text-center align-middle">Kode Kelas</th>
                        <th class="text-center align-middle">Nama Kelas</th>
                        <th class="text-center align-middle">Tanggal Daftar</th>
                        <th class="text-center align-middle">Tanggal Selesai</th>
                        <th class="text-center align-middle">Keterangan</th>
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
                            $sql = "SELECT * FROM daftar WHERE username LIKE '%$cari%'";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            if(mysqli_num_rows($hasil) > 0)
                            {
                                while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <tr>
                                        <td>$kolom[kd_daftar]</td>
                                        <td>$kolom[username]</td>
                                        <td>$kolom[kdkelas]</td>
                                        <td>$kolom[nmkelas]</td>
                                        <td>$kolom[tgl_daftar]</td>
                                        <td>$kolom[tgl_selesai]</td>
                                        <td>$kolom[ket]</td>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kd_daftar]_edit' action='form_edit_daftar.php' method='post'>
                                                <input hidden name='kd_daftar' value='$kolom[kd_daftar]'/>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nmkelas' value='$kolom[nmkelas]'/>
                                                <input hidden name='tgl_daftar' value='$kolom[tgl_daftar]'/>
                                                <input hidden name='tgl_selesai' value='$kolom[tgl_selesai]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-secondary btn-sm'>Edit</button>
                                            </form>
                                        </td class='text-center align-middle'>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kd_daftar]_hapus' action='form_hapus_daftar.php' method='post'>
                                                <input hidden name='kd_daftar' value='$kolom[kd_daftar]'/>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nmkelas' value='$kolom[nmkelas]'/>
                                                <input hidden name='tgl_daftar' value='$kolom[tgl_daftar]'/>
                                                <input hidden name='tgl_selesai' value='$kolom[tgl_selesai]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-danger btn-sm'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    ";
                                }
                            } else {
                                echo "Username tidak ditemukan";
                            }
                        } else {
                            $sql = "SELECT * FROM daftar";
                            $hasil = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
                            if(mysqli_num_rows($hasil) > 0)
                            {
                                while($kolom = mysqli_fetch_array($hasil))
                                {
                                    echo "
                                    <tr>
                                        <td>$kolom[kd_daftar]</td>
                                        <td>$kolom[username]</td>
                                        <td>$kolom[kdkelas]</td>
                                        <td>$kolom[nmkelas]</td>
                                        <td>$kolom[tgl_daftar]</td>
                                        <td>$kolom[tgl_selesai]</td>
                                        <td>$kolom[ket]</td>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kd_daftar]_edit' action='form_edit_daftar.php' method='post'>
                                                <input hidden name='kd_daftar' value='$kolom[kd_daftar]'/>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nmkelas' value='$kolom[nmkelas]'/>
                                                <input hidden name='tgl_daftar' value='$kolom[tgl_daftar]'/>
                                                <input hidden name='tgl_selesai' value='$kolom[tgl_selesai]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
                                                <button class='btn btn-secondary btn-sm'>Edit</button>
                                            </form>
                                        </td class='text-center align-middle'>
                                        <td class='text-center align-middle'>
                                            <form id='$kolom[kd_daftar]_hapus' action='form_hapus_daftar.php' method='post'>
                                                <input hidden name='kd_daftar' value='$kolom[kd_daftar]'/>
                                                <input hidden name='username' value='$kolom[username]'/>
                                                <input hidden name='kdkelas' value='$kolom[kdkelas]'/>
                                                <input hidden name='nmkelas' value='$kolom[nmkelas]'/>
                                                <input hidden name='tgl_daftar' value='$kolom[tgl_daftar]'/>
                                                <input hidden name='tgl_selesai' value='$kolom[tgl_selesai]'/>
                                                <input hidden name='ket' value='$kolom[ket]'/>
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