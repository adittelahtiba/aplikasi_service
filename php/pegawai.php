<?php 
include('../config/koneksi.php');
include('menu.php');
if ($_SESSION['level']==1){
	echo "<h1><center> <font color=black>Data Pegawai</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='pegawai.php'><sup>[X]</sup></a></center></h3>";
    }
	}
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "select * from pegawai where level<>1 and (Nama like'%$Y%' or Id_Peg like'%$Y%')";
		$hasil = mysqli_query($conn, $sql);
		$n=1;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Pegawai
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="pgw_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border="1" align="center"  class="table1">
			<tr>
				<th>NO</th>
				<th>ID PEGAWAI</th>
				<th>PASSWORD</th>
				<th>NAMA</th>
				<th>JENIS KELAMIN</th>
				<th>NO TELP</th>
				<th>JABATAN</th>
				<th>LEVEL</th>
				<th colspan="2">AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Id_Peg,$Password,$Nama,$JK,$No_Telp,$Jabatan,$Level) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $Id_Peg ?></td>
				<td><?= $Password ?></td>				
				<td><?= $Nama ?></td>
				<td><?= $JK ?></td>
				<td><?= $No_Telp ?></td>
				<td><?= $Jabatan ?></td>
				<td><?= $Level ?></td>
				<td><a href="pgw_edit.php?id=<?= $Id_Peg; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="pgw_hapus.php?id=<?=$Id_Peg; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
				</a></td>
			</tr>
			<?php
				$n=$n+1;
				}

				while ($row= mysqli_fetch_row($hasil))
			?>

		</table>
	</body>
</html><?php
}else{	
	echo"<script>
					alert('ANDA TIDAK MEMILIKI HAK AKSES TERHADAP HALAMAN INI');
					window.location=('tampilanawal.php');
	    </script>";	
}
?>
