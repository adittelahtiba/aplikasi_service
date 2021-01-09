<?php
	include('../config/koneksi.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM pelanggan where Cust_ID='$id'";
		$query = mysqli_query($conn, $sql);


		if ($query) {
			echo "<script>alert('Data Berhasil Dihapus'); window.location=('pelanggan.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
?>	