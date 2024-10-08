
<?php

include 'components/connect.php';
include 'inc/function.php';
$produits = getAllProductsByVF();

$produitMO = getAllProductsByMO();
$produitJS = getAllProductsByJS();

$produitHT = getAllProductsByHT();
session_start();

if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php   include "inc/header.php";
 ?>

    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        <div class="header-slider-item" >
                            <img src="img/slide 1.jpg" alt="Slider Image" />
                            
                        </div>
                        <div class="header-slider-item">
                            <img src="img/SLIDE-SITE-WEB-BRIMA-n2.jpg" alt="Slider Image" />
                            
                        </div>
                        <div class="header-slider-item">
                            <img src="img/SLIDE-SITE-WEB-BRIMA-n3.jpg" alt="Slider Image" />
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="header-img">
                       
                            <img src="img/espace-fournisseur.jpg" />
                            <a class="img-text" href="fournisseur/connexionF.php">
                                <p>Inscrivez-vous</p>
                            </a>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

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

    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Secure Payment</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>90 Days Return</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Category Start-->
    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/400x550-jardin.jpg" />
                        <a class="category-name" href="category.php?category=jardinage">
                            <p>Jardinage </p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-250">
                        <img src="img/450x400-informatique.jpg" />
                        <a class="category-name" href="category.php?category=téléphone&tablette">
                            <p>Télévision et Smartphone</p>
                        </a>
                    </div>
                    <div class="category-item ch-150">
                        <img src="img/400x200-electro.jpg" />
                        <a class="category-name" href="category.php?category=cuisine&electromenager">
                            <p>Electroménager</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-150">
                        <img src="img/400x200-maison-etbureau.jpg" />
                        <a class="category-name" href="category.php?category=maison&bureau">
                            <p>Meubles</p>
                        </a>
                    </div>
                    <div class="category-item ch-250">
                        <img src="img/450x400-N2.jpg" />
                        <a class="category-name" href="category.php?category=accessoires">
                            <p>Beauté & Accessoires</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="category-item ch-400">
                        <img src="img/400x550-mode.jpg" />
                        <a class="category-name" href="category.php?category=mode">
                            <p>Mode</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category End-->





    <!-- Call to Action Start -->
    <div class="call-to-action">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Appelez-nous</h1>
                </div>
                <div class="col-md-6">
                    <a href="tel:00 000">+216 00 000 000</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->


   
 
    

    <!-- Ventes Flash Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            
            <div class="section-header">
                <h1>Ventes Flash</h1>
            </div>
            <input type="hidden" name="pid">
            <div class="row align-items-center product-slider product-slider-4">
                
               
                <?php
                foreach ($produits as $p){
                    print '
                    <div class="col-lg-3">
                    
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
                            <a href="action/wish.php"><i class="fa fa-heart"></i></a>
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
    <!-- Ventes Flash End -->

    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h1>Contactez - Nous</h1>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <input type="email" value="Your email here">
                        <button>Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->

     <!-- Call to Action Start -->
     
    <!-- Call to Action End -->

    <!-- Meilleure Offre Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Meilleure Offre</h1>
            </div>
            <input type="hidden" name="pid">
            <div class="row align-items-center product-slider product-slider-4">
                
               
                <?php
                foreach ($produitMO as $p){
                    print '
                    <div class="col-lg-3">
                    
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
        </div>
    </div>
    <!-- Meilleure Offre End -->

  

    <!-- Journnée Spéciale Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1> Journnée Spéciale</h1>
            </div>
            <input type="hidden" name="pid">
            <div class="row align-items-center product-slider product-slider-4">
                
               
                <?php
                foreach ($produitJS as $p){
                    print '
                    <div class="col-lg-3">
                    
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

                            <button type="submit" name="name" style="background: 0; border-color: transparent;"><a href="product-detail.php?pid='.$p['id'].'"><i class="fa fa-heart"></i></a></button>
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
        </div>
    </div>
    <!-- Journnée Spéciale End -->

     <!-- Call to Action Start -->
     <div class="call-to-action">
        <div class="container-fluid">
           <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Secure Payment</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>90 Days Return</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur elit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->
        </div>
    </div>
    <!-- Call to Action End -->


    <!-- High Tech Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>High Tech</h1>
            </div>
            <input type="hidden" name="pid">
            <div class="row align-items-center product-slider product-slider-4">
                
               
                <?php
                foreach ($produitHT as $p){
                    print '
                    <div class="col-lg-3">
                    
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
        </div>
    </div>
    <!-- High Tech End -->

    

    <!-- Review Start -->
   
    <!-- Review End -->

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