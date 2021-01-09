	<?php
	include('../config/koneksi.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM invoice where Inv_No='$id'";
		$query = mysqli_query($conn, $sql);


		if ($query) {
			echo "<script>alert('Data Berhasil Dihapus'); window.location=('invoice.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
?>