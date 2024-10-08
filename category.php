<?php

include 'components/connect.php';
include 'inc/function.php';
$produits = getAllProducts();
$cat = getAllProductsByCategory();
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BRIMA.TN - ACCUEIL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php include "inc/header.php";
    ?>



 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="product-list.php">Produits</a></li>
                    <li class="breadcrumb-item active">Catégories</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->


  <!-- Ventes Flash Start -->
  <div class="featured-product product">
        <div class="container-fluid">
            
            
            <input type="hidden" name="pid">
            <div class="row align-items-center ">
                
               
                <?php
                foreach ($cat as $c){
                    print '
                    <div class="col-lg-3">
                    
                    <div class="product-item">
                  
                       
                    <div class="product-title">
                    <input type="hidden" name="pid" value="'.$c['id'].'">
                    <input type="hidden" name="name" value="'.$c['name'].'">
                    <input type="hidden" name="price" value="'.$c['price'].'">
                    <input type="hidden" name="image" value="'.$c['image_01'].'">

                   <a href="#"> '.$c['name'].'</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.php?pid = '.$c['id'].'">
                            <img src="img/'.$c['image_01'].'" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="product-detail.php?pid = '.$c['id'].'"><i class="fa fa-cart-plus"></i></a>
                            <button type="submit" name="add_to_wishlist" style="background: 0; border-color: transparent;"><a href="product-detail.php?pid = '.$c['id'].'"><i class="fa fa-heart"></i></a></button>
                            <a href="product-list.php?pid = '.$c['id'].'"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span> '.$c['price'].' Dt </span></h3>
                        <button class="btn" type="submit" name="add_to_cart" value="add_to_cart"><a  style="color: black;" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a></button>

                    </div>
                </div></div>';
                }
                    ?>





                
                    
            
    
    
            </div>
        </div>
    </div>
    <!-- Ventes Flash End -->






    <?php include("inc/footer.php"); ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>