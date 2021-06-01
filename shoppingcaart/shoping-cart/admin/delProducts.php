<?php
 session_start();
 include('../config/db.php');
 if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  header('location:login.php');
 }
 

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "DELETE FROM article WHERE id_article='$product_id'";
   $result = mysqli_query($conn, $sql);
   header('location:products.php');


}


?>