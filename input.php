<?php
include "koneksi.php";
if (isset($_POST['Input'])) {
    $nip = addslashes (strip_tags ($_POST['nip']));
    $nama = addslashes (strip_tags ($_POST['nama']));
	$alamat = addslashes (strip_tags ($_POST['alamat']));
    $notelp = addslashes (strip_tags ($_POST['notelp']));
	$tahun = $_POST['thn'];
    $bulan = $_POST['bln'];
    $tanggal = $_POST['tgl'];
    $tgllahir = $tahun."-".$bulan."-".$tanggal;
    
    
    if (strlen ($nip) != 18) {
        echo"<script>alert('NIP harus 18 digit !',document.location.href='index.php?page=input')</script>";    
    }

    $query = "INSERT INTO pegawai VALUES('$nip','$nama','$tgllahir','$notelp','$alamat')";
    $sql = mysqli_query ($conn, $query) or die (mysqli_error());
    if ($sql) {
            echo"<script>alert('Data Pegawai telah berhasil ditambahkan !',document.location.href='index.php')</script>";
    } else {
            echo"<script>alert('Data Pegawai gagal ditambahkan !',document.location.href='index.php')</script>";
    }
}
?>
<div id="content">
    <h2 align="center">Input Data Pegawai</h2>
    <FORM ACTION="" METHOD="POST" NAME="input" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0" border="0" width="950">
            
            <tr>
                <td width="200">NIP</td>
                <td>: <input type="text" name="nip" size="18" maxlength="18"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" size="30" maxlength="30"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: 
                <select name="tgl">
                <?php
                    for ($i=1; $i<=31; $i++) {
                        $tg = ($i<10) ? "0$i" : $i;
                        echo "<option value='$tg'>$tg</option>";    
                    }
                ?>
                </select> - 
                <select name="bln">
                <?php
                    for ($j=1; $j<=12; $j++) {
                        $bl = ($j<10) ? "0$j" : $j;
                        echo "<option value='$bl'>$bl</option>";    
                    }
                ?>
                </select> - 
                <select name="thn">
                <?php
                    for ($k=1970; $k<=2000; $k++) {
                        echo "<option value='$k'>$k</option>";    
                    }
                ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <textarea name="alamat" cols="40" rows="3"></textarea></td>
            </tr>
			<tr>
                <td>No Telp</td>
                <td>: <textarea name="notelp" cols="40" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;&nbsp;<input type="submit" name="Input" value=" Simpan ">&nbsp;
                <input type="reset" name="reset" value=" Reset ">&nbsp;
                <a href="index.php"><input type="button" name="" value=" Kembali "/></a></td>
            </tr>
        </table>
    </form>
</div>