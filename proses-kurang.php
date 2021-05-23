<?php
      include 'transaksi.php';

      $transaksiObj = new Transaksi();
    
      $transaksi = $transaksiObj->updateRecordMin($_POST);
?>
