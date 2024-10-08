<?php

include 'components/connect.php';
include 'inc/function.php';
$produits = getAllProducts();
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
    <title>BRIMA.TN - PRODUITS</title>
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
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item"><a href="product-list.php">Produits</a></li>
                <li class="breadcrumb-item active">Listes Des Produits</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                    <?php
                foreach ($produits as $p){
                    print '
                    <div class="col-md-4">
                    
                    <div class="product-item">
                  
                       
                    <div class="product-title">
                    <input type="hidden" name="pid" value="'.$p['id'].'">
                    <input type="hidden" name="name" value="'.$p['name'].'">
                    <input type="hidden" name="price" value="'.$p['price'].'">
                    <input type="hidden" name="image" value="'.$p['image_01'].'">

                   <a href="#"> '.$p['name'].'</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.php?pid='.$p['id'].'">
                            <img src="img/'.$p['image_01'].'" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="product-detail.php?pid='.$p['id'].'"><i class="fa fa-cart-plus"></i></a>
                            <button type="submit" name="add_to_wishlist" style="background: 0; border-color: transparent;"><a href="product-detail.php?pid='.$p['id'].'"><i class="fa fa-heart"></i></a></button>
                            <a href="product-list.php?pid='.$p['id'].'"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span> '.$p['price'].' Dt </span></h3>
                        <button class="btn" type="submit" name="add_to_cart" value="add_to_cart"><a  style="color: black;" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a></button>

                    </div>
                </div></div>';
                }
                    ?>

                       
                            
                                
                                    

                    </div>

                    <!-- Pagination Start -->
                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Pagination Start -->
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=téléphone&tablette"><i class="fas fa-chalkboard	"></i>Téléphone & Tablette</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=cuisine&electromenager"><i class="fas fa-concierge-bell"></i>Cuisine & Electroménager</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=electronique"><i class="fas fa-cogs"></i>Electronique</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=jardin&pleinair"><i class="fab fa-pagelines"></i>Jardin & Plein air</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=mode"><i class="fa fa-tshirt"></i>Mode</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=maison&bureau"><i class="fas fa-couch"></i>Maison & Bureau</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=informatique"><i class="fa fa-microchip"></i>Informatique</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=articledesport"><i class="fas fa-running"></i>Article de Sport</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="category.php?category=autre"><i class="fas fa-spinner"></i>Autres Catégorie</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                        <input type="hidden" value="<?= $fetch_products['id']; ?>" name="name">

                        <?php
                foreach ($produits as $p){
                    print '
                    <div class="col-md-4">
                    
                    <div class="product-item">
                  
                       
                    <div class="product-title">
                    <input type="hidden" name="pid" value="'.$p['id'].'">
                    <input type="hidden" name="name" value="'.$p['name'].'">
                    <input type="hidden" name="price" value="'.$p['price'].'">
                    <input type="hidden" name="image" value="'.$p['image_01'].'">

                   <a href="#"> '.$p['name'].'</a>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="product-image">
                        <a href="product-detail.php?pid='.$p['id'].'">
                            <img src="img/'.$p['image_01'].'" alt="Product Image">
                        </a>
                        <div class="product-action">
                            <a href="product-detail.php?pid='.$p['id'].'"><i class="fa fa-cart-plus"></i></a>
                            
                            <button type="submit" name="add_to_wishlist" style="background: 0; border-color: transparent;"><a href="product-detail.php?pid='.$p['id'].'"><i class="fa fa-heart"></i></a></button>
                            <a href="product-list.php?pid='.$p['id'].'"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="product-price">
                        <h3><span> '.$p['price'].' Dt </span></h3>
                        <button class="btn" type="submit" name="add_to_cart" value="add_to_cart"><a  style="color: black;" href="product-detail.php?pid='.$p['id'].'"><i class="fa fa-shopping-cart"></i>Buy Now</a></button>

                    </div>
                </div></div>';
                }
                    ?>
                        </div>
                    </div>

                    
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product List End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

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