
<?php
$con = mysqli_connect("localhost", "root", "", "ecommerce")or die($mysqli_error($con));

//session_start();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Redirects the user to products page if he/she is logged in.
if (isset($_SESSION['email_id'])) {
  header('location: products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Life Style Store</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>

  <body style="padding-top: 50px;">
        <!-- Header -->
        
       <?php
        include 'includes/header.php';
        ?>

        

        <div id="content">
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container">	
                    <center>
                        <div id="banner_content">
                            <h1>We sell yourstyle.</h1>
                            <p>Flat 40% OFF on premium brands </p>
                            <br/>
                            <a  href="products.php" class="btn btn-danger btn-lg active">Shop Now</a>
                        </div>
                    </center>
                </div>
            </div>
            <!--Main banner image end-->
   
     
      <br><br><div class="container">
          <div class="row">
              <div class="col-sm-4">
                  <div class="thumbnail">
                      <a href="products.php#cam"><img src="img/camera.jpg"class="img-responsive" alt="camera"></a>
                      <div class="caption">
                          <h3>Cameras</h3>
                          <p>Choose among the best available in the world</p>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="thumbnail">
                      <a href="products.php#watch"><img src="img/watch.jpg"class="img-responsive" alt="watch"></a>
                      <div class="caption">
                          <h3>Watches</h3>
                          <p>Original watches from the best brands</p>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="thumbnail">
                      <a href="products.php#shirt"><img src="img/shirt.jpg" class="img-responsive" alt="shirt"></a>
                      <div class="caption">
                          <h3>Shirts</h3>
                          <p>Our exquisite collection of shirts </p>
                      </div>
                  </div>
              </div>
              </div>
          </div>
      <!--Footer-->
        <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->
     
      

</body>
</html>