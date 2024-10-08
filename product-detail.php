<?php

include 'components/connect.php';
include 'inc/function.php';

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
    <title>BRIMA.TN - DETAILS</title>
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
    <?php include "inc/header.php"; ?>



    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Product Detail</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    $pid = $_GET['pid'];
                    $select_products = $conn->prepare("SELECT * FROM `products` WHERE id =?");
                    $select_products->execute([$pid]);
                    if ($select_products->rowCount() > 0) {
                        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <form action="action/commander.php" method="post">

                                <div class="product-detail-top">
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <div class="product-slider-single normal-slider">
                                                <img src="img/<?= $fetch_products['image_01']; ?>" alt="Product Image">
                                                <img src="img/<?= $fetch_products['image_02']; ?>" alt="Product Image">
                                                <img src="img/<?= $fetch_products['image_03']; ?>" alt="Product Image">

                                            </div>
                                            <div class="product-slider-single-nav normal-slider">
                                                <div class="slider-nav-img"> <img src="img/<?= $fetch_products['image_01']; ?>" alt="Product Image">
                                                </div>
                                                <div class="slider-nav-img"><img src="img/<?= $fetch_products['image_02']; ?>" alt="Product Image"></div>
                                                <div class="slider-nav-img"><img src="img/<?= $fetch_products['image_03']; ?>" alt="Product Image"></div>

                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="product-content">
                                                <div class="title">
                                                    <h2><?= $fetch_products['name']; ?></h2>
                                                </div>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="">
                                                    <h4>Prix: <?= $fetch_products['price']; ?> DT </h4>
                                                    <div class=""></div>
                                                </div>
                                                <div class="quantity">
                                                    <h4>Quantité:</h4>
                                                    <div class="qty">
                                                        <input type="number" name="qty" onkeypress="if(this.value.length==2) return false;" value="1">
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <h4>Description: <?= $fetch_products['details']; ?></h4>
                                                </div>

                                                <div class="action">
                                                    <input type="hidden" value="<?= $fetch_products['id']; ?>" name="name">
                                                    <button type="submit" class="btn"><i class="fa fa-shopping-cart mr-1"></i>Ajouter au Panier</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    <?php
                        }
                    } else {
                        echo '<p class="empty"> Aucun produit existe </p>';
                    }
                    ?>









                </div>


            </div>
        </div>
    </div>
    <!-- Product Detail End -->



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