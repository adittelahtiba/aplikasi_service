<?php 
include('../config/koneksi.php');
include('menu.php');
	echo "<h1><center> <font color=black>Data Detail Tagihan Pekerjaan</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='detail_tagihan_pkj.php'><sup>[X]</sup></a></center></h3>";
    }}
		$sql = "select * from detail_pkj where Inv_No like'%$Y%' or Kode_Pkj like'%$Y%'";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Detail Tagihan pekerjaan
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="dtpkj_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border=1 align="center"  class="table1">
			<tr>
				<th><font size=2>NO</th>
				<th><font size=2>NO DETAIL</th>
				<th><font size=2>INV NO</th>
				<th><font size=2>KODE PEKERJAAN</th>
				<th><font size=2>JUMLAH PEKERJAAN</th>
				<th><font size=2>DISKON PEKERJAAN</th>
				<th><font size=2>SUB TOTAL PEKERJAAN</th>
				
				<th colspan="2"><font size=2>AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($No,$Inv_No, $Kode_Pkj,  $Jumlah_Pkj, $Diskon_Pkj, $Sub_Total_Pkj) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $No ?></td>
				<td><?= $Inv_No ?></td>
				<TD><?= $Kode_Pkj ?></TD>
				<TD><?= $Jumlah_Pkj ?></TD>
				<TD><?= $Diskon_Pkj ?></TD>
				<TD><?= $Sub_Total_Pkj ?></TD>
				<td><a href="dtpkj_edit.php?id=<?=$No; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="dtpkj_hapus.php?id=<?=$No; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
				</a></td>
			</tr>
			<?php
			$n=$n+1;
				}

				while ($row= mysqli_fetch_row($hasil))
			?>
		</font>
		</table>
	</body>
</html>
