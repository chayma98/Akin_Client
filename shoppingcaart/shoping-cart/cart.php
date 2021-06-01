<?php 

include('inc/header.php');
include('config/db.php');
  ?>

<?php include('inc/nav.php'); 


$cart =  $_SESSION['cart'];


//  print_r($cart);

?>
 
 
<div class="container">
    <h2 class='text-center text-white'>Cart</h2>

   <table class="table table-bordered bg-white">
       <tr>
           <th>Image</th>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Total</th>
           <th>Action</th>
       </tr>

       <?php
       $total = 0;
       foreach($cart as $key => $value){
        // echo $key ." : ". $value['quantity'] . "<br>";
        
        $sql = "SELECT * FROM article where id_article = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result)
        ?>


            <tr>
           <td><img src="<?php echo $row["image"]; ?>" alt=""></td>
           <td><a href="single.php?id=<?php echo $row['id_article']?>"><?php echo $row['nom_article']?></a></td>
           <td><?php echo $row['prix']?> </td>
           <td><?php echo $value['quantity']?></td>
           <td><?php echo $row['prix'] * $value['quantity'] ?> </td>
            <td><a href='deleteCart.php?id=<?php echo $key; ?>'>Remove</a></td>
            </tr>

        <?php

$total = $total +  ($row['prix'] * $value['quantity']);
    }
    
    ?>
      
   </table>

   <div class="text-right">
    <!-- <button class="btn mr-3">Update Cart</button> -->

    <a class="btn" href='checkout.php'>Checkout</a>
</div>
<div class="card">
<div class="card-header">Total</div>
<div class="card-body">
Total Amount: $ <?php echo $total; ?>.00/-
</div>
</div>

</div>








<?php include('inc/footer.php');  ?>


