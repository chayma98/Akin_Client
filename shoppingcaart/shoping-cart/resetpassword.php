<?php include('inc/header.php');  ?>

<?php include('inc/nav.php');  ?>
 
<div class="container text-white">
    <div class="row">
      <div class="col-md-12 my-5">
        <div class="page_header text-center">
            <h2>Reset Password</h2>
            <p>An e-mail will be sent to you with the instructions  </p>
           
        </div>
            <form class="logregform" action="reset-request.php" method='post'>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>E-mail Address</label>
                            <input type="text" value="" class="form-control" name='email'>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="space20"></div>
                        <button type="submit"  name='reset-request-submit' class="btn button btn-md pull-right">receive new link</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_GET["reset"])){
            if ($_GET["reset"]== "success"){
                echo '<p> check your e-mail! </p>';
            }
            }
            ?>
        </div>
    </div>
</div>


                
        </div>
    </div>

   

   
</div>





<?php include('inc/footer.php');  ?>



