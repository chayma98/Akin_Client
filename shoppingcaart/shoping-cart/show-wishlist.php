<?php 
include('config/db.php');
 

include('inc/header.php');  


include('inc/nav.php'); 
if(!isset($_SESSION['customerid'])){
	echo '<script>window.location.href = "login.php";</script>';
}
 

 
 



?>
 
 
 
 
<div class="container text-white">
    <h2 class='text-center text-white'>My Wishlist</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

		 
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
					 
						<th>Date and Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid']; 
  
				$sql = "SELECT * FROM favoris JOIN article on article.id_article=favoris.id_article";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
                        <a href="single.php?id=<?php echo $row["id_article"] ?>">	<?php echo $row["nom_article"] ?></a>
						
						</td>
						<td>
						<?php echo $row["prix"] ?>
						</td>
					 
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["date"]));  ?>		
						</td>
						<td>
							<a href="delete-wishlist.php?pid=<?php echo $row["id_article"] ?>&cid=<?php echo $_SESSION['customerid'] ?>">Delete</a> 
							 
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

		 
 



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>







<?php include('inc/footer.php');  ?>


