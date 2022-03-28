<?php
include "koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
} else {
    die ("Error. No nip Selected! ");    
}
?>
<div id="content">
    <?php
    if (!empty($nip) && $nip != "") {
        $query = "DELETE FROM pegawai WHERE nip='$nip'";
        $sql = mysqli_query ($conn, $query);
        if ($sql) {
            echo"<script>alert('Data Pegawai telah berhasil dihapus !',document.location.href='index.php')</script>";    
        } else {
            echo"<script>alert('Data pegawai gagal dihapus !',document.location.href='index.php')</script>";    
        }
        echo "Klik <a href='index.php'>di sini</a> untuk kembali ke halaman data pegawai";
    } else {
        die ("Access Denied");    
    }
    ?>
</div>