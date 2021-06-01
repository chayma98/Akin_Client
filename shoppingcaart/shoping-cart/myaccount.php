<?php 
include('config/db.php');
 

include('inc/header.php');  


include('inc/nav.php'); 

if(!isset($_SESSION['customerid'])){
	echo '<script>window.location.href = "login.php";</script>';

}
else {
$id = $_SESSION['customerid'];
$sql_id = "SELECT nom_client ,prenom_client FROM client where id_client = $id";
$result_id = mysqli_query($conn, $sql_id); 
$row_id = mysqli_fetch_assoc($result_id);
 


}
?>
 
 
 
 
<div class="container text-white">
    <h2 class='text-center text-white'>Welcome <?php if(isset($row_id['prenom_client'])) {echo $row_id['prenom_client']; } ?></h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

			<h3>Recent Orders</h3>
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Total Price</th>
						<th>Order Status</th>
						<th>Paymentmode</th>
						<th>Date and Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid'];

 
  
				$sql = "SELECT * FROM commande WHERE id_client='$c_id'";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
							<?php echo $row["total_commande"] ?>
						</td>
						<td>
						<?php echo $row["etat"] ?>
						</td>
						<td>
						<?php echo $row["paymentmode"] ?>		
						</td>
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["date_commande"]));  ?>		
						</td>
						<td>
							<a href="view-order.php?id=<?php echo $row["id_commande"] ?>">View</a> 
							<?php if($row["etat"] != 'Cancelled'){ ?>
								|  <a href="cancel-order.php?id=<?php echo $row["id_commande"] ?>">cancel</a> 
							<?php }?>
						</td>
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>




				
				</tbody>
			</table>		

		 

			<div class="ma-address">
						<h3>My Addresses</h3>
						<p>The following addresses will be used on the checkout page by default.</p>

						<div class="row  bg-white text-dark px-5 py-3">
				<div class="col-md-6">
								<h4>Billing Address <a href="update_address.php?id=<?php echo $c_id ?>">Edit</a></h4>
                                <?php  
                        $sql_add = "SELECT * FROM client  WHERE id_client='$c_id'";
                        $result_add = mysqli_query($conn, $sql_add);
                      
                     $row_add = mysqli_fetch_assoc($result_add); 
                        echo $row_add['prenom_client'] ." ". $row_add['nom_client'] . "<br>";
                        echo $row_add['company'] . "<br>";
                        echo $row_add['address1'] . "<br>";
                        echo $row_add['address2'] . "<br>";
                        echo $row_add['city'] . "<br>";
                        echo $row_add['zip'] . "<br>";
                        echo $row_add['country'] . "<br>";
                        echo $row_add['mobile'] . "<br>";

                        ?>

 
				</div>

			 
			</div>



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>







<?php include('inc/footer.php');  ?>


