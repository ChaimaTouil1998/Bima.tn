<?php

include 'components/connect.php';
include 'inc/function.php';

session_start();

if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}else{
    $user_id = '';
}
$total = 0;
//var_dump($_SESSION['panier']);
if(isset($_SESSION['wish'])){
	$total = $_SESSION['wish'][1];
}


$commandes = array();
if(isset($_SESSION['wish'])){
    if(count($_SESSION['wish'][4])  > 0){
        		$commandes = $_SESSION['wish'][4];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BRIMA.TN - PANIER</title>
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
                    <li class="breadcrumb-item active">Favoris</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                
                  

                        <?php
    $select_wishlist = $conn -> prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
    $select_wishlist  -> execute ([$user_id]);
    if($select_wishlist -> rowCount() > 0){
        while ($fetch_wishlist = $select_wishlist -> fetch(PDO::FETCH_ASSOC)){
            $grand_total+= $fetch_wishlist['price'];

?>
<form action="" method="post" class="box">
<input type="hidden" name="pid" value="<?=$fetch_wishlist['pid']; ?>">
<input type="hidden" name="name" value="<?=$fetch_wishlist['name']; ?>">
<input type="hidden" name="price" value="<?=$fetch_wishlist['price']; ?>">
<input type="hidden" name="image" value="<?=$fetch_wishlist['image']; ?>">



    <a href="product-detail.php?pid=<?= $fetch_wishlist['pid']; ?>" class="fas fa-eye"></a>
    <img src="img/<?=$fetch_wishlist['pid']; ?>" class="image" alt="">
    <div><?=$fetch_wishlist['name']; ?></div>
   <div> <span><?=$fetch_wishlist['price']; ?></span> DT</div>
    <input type="number" name="qty" value="1" onkeypress="if(this.value.length == 2) return false;">


    <input type="submit" value="ajouter au panier" name="add_to_cart" class="btn">
    <input type="submit" value="supprimer" onclick="return confirm('Voulez-vous supprimer ce favoris?');" name="delete" class="delete-btn">
</form>                            
<?php 
        }
    }else{
        echo '';
    } ?>
                     
                   
                    
                </div>
            </div>
        </div>
        <!-- Cart End -->
        
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
