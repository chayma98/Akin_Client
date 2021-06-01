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
                    <a class="popup-btn">Quick View</a>
                    <div class="d-flex overflow-hidden">
                    <a href='addToCart.php?id=<?php echo  $row["id_article"] ?>'  class="btn btn-default btn-xs pull-right"  >
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </a>
                    <a   href='single.php?id=<?php echo  $row["id_article"] ?>' class="btn btn-default btn-xs pull-left ml-5">
                        <i class="fa fa-eye"></i> Details
                    </a> 
                    </div>
                    <div class="popup-view">
                    <div class="popup-card">
                       <a><i class="fas fa-times close-btn"></i></a>
                       <div class="product-img">
                        <img src="<?php echo  $row["image"] ?>" alt="">
                         </div>
                         </div> 
                </li>

                <?php
                  }  
                  ?>
             
            </ul>  
        </div>



        <?php include('inc/footer.php');  ?>
<script>
    var popupViews = document.querySelectorAll('.popup-view');
    var popupBtns = document.querySelectorAll('.popup-btn');
    var closeBtns = document.querySelectorAll('.close-btn');

    //javascript for quick view button
    var popup = function(popupClick){
      popupViews[popupClick].classList.add('active');
    }

    popupBtns.forEach((popupBtn, i) => {
    popupBtn.addEventListener("click", () => {
    popup(i);
      });
    });

    //javascript for close button
      closeBtns.forEach((closeBtn) => {
      closeBtn.addEventListener("click", () => {
      popupViews.forEach((popupView) => {
      popupView.classList.remove('active');
        });
      });
    });
</script>
