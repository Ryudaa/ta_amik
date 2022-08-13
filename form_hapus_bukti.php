<?php
    include "db.php";
    include "head.php";
    
    include "nav.php";

    echo "<center><h3 style='margin-top:100px;'>Yakin ingin menghapus bukti?.</h3><br>
    <a style='margin-bttom:100px;' class='btn btn-danger' role='button' href='proses_hapus_bukti.php?id=" . $_GET["id"] ."'>Hapus</a>
    <a style='margin-bttom:100px;' class='btn btn-primary' role='button' href='profil_foradmin.php'>Kembali</a></center>";
    include "footer.php";
?>