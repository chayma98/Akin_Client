<?php

include('inc/header.php');  
include('config/db.php'); 

 

?>

<?php include('inc/nav.php'); 



?>

 
 


<div class="content mt-5">
            <ul class="rig columns-4">

<?php 


$sql = "SELECT * FROM article";
if(isset($_GET['id'])){
    $catID = $_GET['id'];
    $sql .= " WHERE id_categorie = '$catID'";
}


$result = mysqli_query($conn, $sql);
 
  while($row = mysqli_fetch_assoc($result)) {
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

    ?> 

                <li> 
                    <a href="#"><img class="product-image" src="<?php echo  $row["image"] ?>"></a>
                    <h4 class="card-title"><?php echo  $row["nom_article"] ?></h4>
                    <!--  <p class ="card-subtitle"><?php //echo  $row["description"] ?></p> -->
                    <div class="price"> <b>$ <?php echo  $row["prix"] ?>.00 </b></div>
                    <div class="d-flex overflow-hidden">
                    <a href='addToCart.php?id=<?php echo  $row["id_article"] ?>'  class="btn btn-default btn-xs pull-right"  >
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </a>
                    <a   href='single.php?id=<?php echo  $row["id_article"] ?>' class="btn btn-default btn-xs pull-left ml-5">
                        <i class="fa fa-eye"></i> Details
                    </a> 
                    </div>
                   
                </li>

                <?php
                  }  
                  ?>
          <?php
                    $c_id = $_SESSION['customerid'];
                    $sql_ac=" SELECT * FROM acces WHERE id_client= $c_id " ;
                    $result_ac = mysqli_query($conn, $sql_ac);
                    if  (mysqli_num_rows($result_ac) > 0){
                        $rowe = mysqli_fetch_assoc($result_ac);
                        $art_id = $rowe["id_article"]; }
                        $sql_premium= "SELECT * FROM premium where id_article= $art_id";
                        $result_pre = mysqli_query($conn,$sql_premium);
                        while ($roww = mysqli_fetch_assoc($result_pre)){
                            ?>
                    <li>
                    <a href="#"><img class="product-image" src="<?php echo  $roww["image"] ?>"></a>
                    <h4 class="card-title"><?php echo  $roww["nom_article"] ?></h4>
                    <!--  <p class ="card-subtitle"><?php //echo  $row["description"] ?></p> -->
                    <div class="price"> <b>$ <?php echo  $roww["prix"] ?>.00 </b></div>
                   
                    <div class="d-flex overflow-hidden">
                    <a href='addToCart.php?id=<?php echo  $roww["id_article"] ?>'  class="btn btn-default btn-xs pull-right"  >
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </a>
                    <a   href='single.php?id=<?php echo  $roww["id_article"] ?>' class="btn btn-default btn-xs pull-left ml-5">
                        <i class="fa fa-eye"></i> Details
                    </a> 
                    </div>
                    <?php
                        }
                    
                    
                    ?>
                    </li>
            </ul>
        </div>










        <?php include('inc/footer.php');  ?>
