<?php include('inc/header.php');
session_start();
include('config/db.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = $_POST['password'];
    
     $sql = "SELECT * FROM client WHERE email_client='$email' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
 $dbStoredPASSWORD = $row['password_client'];

if (password_verify ($password, $dbStoredPASSWORD)) {
     $_SESSION['customer'] = $email;
     $_SESSION['customerid'] = $row['id_client'];
     header('location:index.php');
  } else {
    header('location:login.php?message=1');
//    $message =  'incorrect Credentials';
  }
  


   
    
}




?>