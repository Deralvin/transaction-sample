<?php

class Transaksi
{
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "uts_so";
    public  $con;


    // Database Connection 
    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
        if(mysqli_connect_error()) {
         trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        }else{
        return $this->con;
        }
    }

    // Insert customer data into customer table
    public function insertData($post)
    {
        $name = $this->con->real_escape_string($_POST['name']);
        $email = $this->con->real_escape_string($_POST['email']);
        $username = $this->con->real_escape_string($_POST['username']);
        $password = $this->con->real_escape_string(md5($_POST['password']));
        $query="INSERT INTO transaksi(name,email,username,password) VALUES('$name','$email','$username','$password')";
        $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        }
    }

    // Fetch customer records for show listing
    public function displayData()
    {
        $query = "SELECT * FROM transaksi";
        $result = $this->con->query($query);
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
               $data[] = $row;
        }
         return $data;
        }else{
         echo "No found records";
        }
    }

    // Fetch single data for edit from customer table
    public function displyaRecordById($id)
    {
        $query = "SELECT * FROM transaksi WHERE id = '$id'";
        
        $result = $this->con->query($query);
        
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
        }else{
        echo "Record not found";
        }
    }
    public function updateRecordMin($postData){
        $jml = $this->con->real_escape_string($_POST['saldo']);
        $id = $this->con->real_escape_string($_POST['id']);
        $qry = "SELECT * FROM transaksi WHERE id = '$id'";
        
        $rlt = $this->con->query($qry);
        
        if ($rlt->num_rows > 0) {
            $rw = $rlt->fetch_assoc();
        }
        $saldo =  $rw['saldo'] - $jml;

        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE transaksi SET saldo = '$saldo' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                echo 'Tunggu beberapa saat';
                header( "refresh:3;url=index.php" );
                // header("Location:index.php?msg2=update");
            }else{
                echo "Registration updated failed try again!";
            }
        }
        
    }
    // Update customer data into customer table
    public function updateRecord($postData)
    {
        $jml = $this->con->real_escape_string($_POST['saldo']);
        $id = $this->con->real_escape_string($_POST['id']);
        $saldo_awal = $this->con->real_escape_string($_POST['saldo_awal']);

        $qry = "SELECT * FROM transaksi WHERE id = '$id'";
        
        $rlt = $this->con->query($qry);
        
        if ($rlt->num_rows > 0) {
            $rw = $rlt->fetch_assoc();
        }
        $saldo =  $rw['saldo'] + $jml;

        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE transaksi SET saldo = '$saldo' WHERE id = '$id'";
            $sql = $this->con->query($query);
            if ($sql==true) {
                echo 'Tunggu beberapa saat';
                header( "refresh:3;url=index.php" );
            }else{
                echo "Registration updated failed try again!";
            }
        }
        
   
        
    }


    // Delete customer data from customer table
    public function deleteRecord($id)
    {
        $query = "DELETE FROM transaksi WHERE id = '$id'";
        $sql = $this->con->query($query);
    if ($sql==true) {
        header("Location:index.php?msg3=delete");
    }else{
        echo "Record does not delete try again";
        }
    }

}
?>