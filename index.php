<?php
   include 'transaksi.php';

   $transaksiObj = new Transaksi();
   $transaksi = $transaksiObj -> displyaRecordById(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uts SO</title>
</head>
<body>
    <form action="proses-transaksi.php" method="POST">
        <input type="hidden" name="id"  value="<?php echo $transaksi['id']; ?>">
        <input type="hidden" name="tipe"  value="tambah">
        <input type="hidden" name="saldo_awal"  value="<?php echo $transaksi['saldo']; ?>">
        <input type="number" name="saldo" placeholder="Tambah"> <br>

        <input type="submit" value="Tambah">
    </form>
    <br>
    <br>
    <form action="proses-kurang.php" method="POST">
    <input type="hidden" name="id"  value="<?php echo $transaksi['id']; ?>">
        <input type="hidden" name="tipe"  value="kurang">
        <input type="hidden" name="saldo_awal"  value="<?php echo $transaksi['saldo']; ?>">
        <input type="number" name="saldo" placeholder="Kurang"> <br>
        <input type="submit" value="Kurang">
    </form>
    <h1>Saldo</h1>
    <h2>
        <?= $transaksi['saldo'];?>
    </h2>
</body>
</html>