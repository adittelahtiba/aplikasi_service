	<?php
	include('../config/koneksi.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM detail_skcd where No='$id'";
		$query = mysqli_query($conn, $sql);


		if ($query) {
			echo "<script>alert('Data Berhasil Dihapus'); window.location=('detail_tagihan_skcd.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}
	}
?>