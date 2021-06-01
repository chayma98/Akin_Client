<?php include('inc/header.php');
session_start();
include('../config/db.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = $_POST['password'];
    
     $sql = "SELECT * FROM administrateur WHERE email_admin='$email' "; 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
 $dbStoredPASSWORD = $row['password_admin'];

if (password_verify ($password, $dbStoredPASSWORD)) {
     $_SESSION['email'] = $email;
     header('location:index.php');
  } else {
    header('location:login.php?message=1');
//    $message =  'incorrect Credentials';
  }
  


   
    
}




?>