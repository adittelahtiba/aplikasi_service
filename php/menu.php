<?php  

include"sessionCheck.php";
$Y='';

$Id_Peg=$_SESSION['Id_Peg'];
$sql2 = "select Nama,level from pegawai where Id_Peg='$Id_Peg'";
$hasil = mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($hasil);
$_SESSION['Nama']=$row['Nama'];
$_SESSION['level']=$row['level'];
?>
<script type="text/javascript">
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}    
</script>
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<head>
    <title></title>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="../css/tabel.css">
<header>
  <input type="checkbox" id="tag-menu"/>

  <table>
    
    <tr>
    <th width="1%"><label class="fa fa-bars menu-bar" for="tag-menu"><img src="../img/brgr-menu.png" width="30" /></label></th>
    <td width="40%"></td>


    <th width="25%" valign="center"><?php include("pencarian.php") ?>

  <th><div class="dropdown">
    <img src="../img/pp.png" width="30" onclick="myFunction()" class="dropbtn" align="center"><font color="white"><?php   echo $_SESSION['Nama']; ?></font>
  <div id="myDropdown" class="dropdown-content">
    <a href="logout.php">logout</a>
  </div>
</div>
    </td>
    </tr>
</table>
  <div class="jw-drawer">
    <nav>
      <ul>
      <a href="tampilanawal.php" style="text-decoration: none"><img src="../img/home.png" width="30"/>
      <font color="white" size="5"> HOME</font></a>
      <br>
      <font color="white"><br>DATA TABEL
        <li> <a href="pelanggan.php">PELANGGAN</a></li>
        <li> <a href="sukucadang.php">SUKUCADANG</a></li>
        <li> <a href="detail_tagihan_skcd.php">DETAIL TAGIHAN SUKUCADANG</a></li>
        <li> <a href="pekerjaan.php">PEKERJAAN</a></li>
        <li> <a href="detail_tagihan_pkj.php">DETAIL TAGIHAN PEKERJAAN</a></li>
        <li> <a href="referensi.php">REFERENSI</a></li>
        <li> <a href="invoice.php">TAGIHAN</a></li>
        <li> <a href="pegawai.php">PEGAWAI</a></li>
      </ul>
    </nav>
  </div>
</header>
<center>
</body>
</html>