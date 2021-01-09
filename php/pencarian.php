
      <form action="" method="post">
      <input type="text" name="Y" placeholder="pencarian">
      <input type="image" src="../img/search.png" width="20" align="center" name="Cari" value="Cari">
    </form>
    <?php
    if (isset($_POST['Cari'])) {
      $Y= $_POST['Y'];
    }
    ?>