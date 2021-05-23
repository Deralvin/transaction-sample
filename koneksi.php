<?php
    $conn = mysqli_connect("localhost","root","","uts_so");
    if(mysqli_connect_errno()){
        echo 'Koneksi Database gagal : '. mysqli_connect_errno();
    }


?>