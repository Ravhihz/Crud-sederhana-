<?php
include "koneksi.php";
?>
<div id="content">
    <h2 align="center">Data Pegawai</h2>
    <a href="index.php?page=input"><input type="button" name="" value=" Input Data "/></a> 
    <table width="100%"  id="tabel">
    <tr>
        <th width="3%">No</td>
        <th width="18%">NIP</td>
        <th width="18%">Nama</td>
        <th width="10%">Alamat</td>
        <th width="13%">No Telp</td>
        <th width="22%">Tanggal Lahir</td>
        
        <th width="6%">Action</td>
    </tr>
    <?php
    $no = 1;
    $query = "SELECT * FROM pegawai ORDER BY nip";
    $sql = mysqli_query ($conn, $query);
    while ($hasil = mysqli_fetch_array ($sql)) {
        $nip = $hasil['nip'];
        $nama = stripslashes ($hasil['nama']);
        $alamat = ($hasil['alamat']);
        $notelp = stripslashes ($hasil['notelp']);
		$tgllahir = stripslashes ($hasil['tgllahir']);
        $warna = ($no%2==1)?"#ffffff":"#efefef";
    ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td><?php echo $no; ?></td>
            <td><?php echo $nip; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $alamat; ?></td>
            <td><?php echo $notelp; ?></td>
            <td><?php echo $tgllahir; ?></td>
            
            <td> 
            <a href="index.php?page=edit&nip=<?php echo $nip; ?>"><input type="button" name="" value=" Edit "/></a><br/>
            <a href="index.php?page=delete&nip=<?php echo $nip; ?>" onclick="return confirm('Anda yakin akan menghapus pegawai <?php echo $nama; ?> ?')"><input type="button" name="" value=" Delete "/></a></td>
        </tr>    
    <?php $no++; }?>
    </table>
</div>