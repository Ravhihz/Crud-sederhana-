<?php
include "koneksi.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
} else {
    die ("Error. No Nip Selected! ");    
}

$query = "SELECT * FROM pegawai WHERE nip='$nip'";
$sql = mysqli_query ($conn, $query);
$hasil = mysqli_fetch_array ($sql);
$nip = $hasil['nip'];
$nama = stripslashes ($hasil['nama']);
list($thn,$bln,$tgl) = explode ("-",$hasil['tgllahir']);
$alamat = stripslashes ($hasil['alamat']);
$notelp = stripslashes ($hasil['notelp']);


if (isset($_POST['Edit'])) {
    $nip = $_POST['hnip'];
    $nama = addslashes (strip_tags ($_POST['nama']));
    $tgllahir = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
    $alamat = addslashes (strip_tags ($_POST['alamat']));
    $notelp = addslashes (strip_tags ($_POST['notelp']));
    
    $query = "UPDATE pegawai SET nama='$nama',tgllahir='$tgllahir',notelp='$notelp',
              alamat='$alamat' WHERE nip='$nip'";
    $sql = mysqli_query ($conn, $query);
    if ($sql) {
            echo"<script>alert('Data Pegawai telah berhasil diedit !',document.location.href='index.php')</script>";
    } else {
            echo"<script>alert('Data Pegawai gagal diedit !',document.location.href='index.php')</script>";
    }
}
?>
<div id="content">
    <h2 align="center">Edit Data Pegawai</h2>
    <FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" border="0" width="950">
            
            <tr>
                <td width="271">NIP</td>
                <td width="463">: <b><?php echo $nip; ?></b></td>
                </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" size="30" maxlength="30" value="<?php echo $nama; ?>"></td>
                
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: 
                <select name="tgl">
                <?php
                    for ($i=1; $i<=31; $i++) {
                        $tg = ($i<10) ? "0$i" : $i;
                        $sele = ($tg==$tgl)? "selected" : "";
                        echo "<option value='$tg' $sele>$tg</option>";    
                    }
                ?>
                </select> - 
                <select name="bln">
                <?php
                    for ($i=1; $i<=12; $i++) {
                        $bl = ($i<10) ? "0$i" : $i;
                        $sele = ($bl==$bln)?"selected" : "";
                        echo "<option value='$bl' $sele>$bl</option>";    
                    }
                ?>
                </select> - 
                <select name="thn">
                <?php
                    for ($i=1970; $i<=2000; $i++) {
                        $sele = ($i==$thn)?"selected" : "";
                        echo "<option value='$i' $sele>$i</option>";    
                    }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <textarea name="alamat" cols="40" rows="3"><?php echo $alamat; ?></textarea></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>: <input type="text" name="notelp" size="30" maxlength="30" value="<?php echo $notelp; ?>"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;&nbsp;
                <input type="hidden" name="hnip" value="<?php echo $nip; ?>">
                <input type="submit" name="Edit" value=" Simpan ">&nbsp;
                <input type="reset" name="reset" value=" Reset ">&nbsp;
                <a href="index.php"><input type="button" name="" value=" Kembali "/></a></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </FORM>
</div>