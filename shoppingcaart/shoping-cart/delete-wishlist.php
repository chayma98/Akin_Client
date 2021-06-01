<?php
session_start();
include('config/db.php');
if(!isset($_SESSION['customerid'])){
    
header('location:index.php');
}else{
 $pid = $_GET['pid']; 
 $cid = $_GET['cid'];
 

    $delWishlist = "DELETE FROM favoris WHERE id_article='$pid' AND id_client='$cid'";   
	if(mysqli_query($conn, $delWishlist)){
        header('location:show-wishlist.php');

    }
 









}

?>