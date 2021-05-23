<?php
      include 'transaksi.php';

      $transaksiObj = new Transaksi();
    
      $transaksi = $transaksiObj->updateRecord($_POST);
?>
