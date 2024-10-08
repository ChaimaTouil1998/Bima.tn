<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '
            <div class="message">
             <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div> 
        ';
    }
}

?>



<!-- Top bar Start -->
<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <a href="mailto:brima.tn@email.com"> <i class="fa fa-envelope"></i>
                    brima.tn@email.com</a>

            </div>
            <div class="col-sm-6">
                <a href="tel:   +216 00 000 000">
                    <i class="fa fa-phone-alt"></i>
                    +216 00 000 000
                </a>

            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="index.php" class="nav-item nav-link active">Accueil</a>
                    <a href="product-list.php" class="nav-item nav-link">Produits</a>
                    <a href="cart.php" class="nav-item nav-link">Panier</a>
                    <a href="checkout.php" class="nav-item nav-link">Checkout</a>



                    <a href="contact.php" class="nav-item nav-link">Contact Us</a>


                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <?php
                        $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                        $select_profile->execute([$user_id]);
                        if ($select_profile->rowCount() > 0) {
                            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);



                        ?>
                            <p></p>
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $fetch_profile['name']; ?></a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="nav-item nav-link">Connexion&Inscription</a>
                                <a href="my-account.php" class="nav-item nav-link">Mon Compte</a>
                                <a href="logout.php" class="nav-item nav-link" onclick="return confirm ('Quitter cette site ?');">Déconnecter</a>
                            </div>
                        <?php
                        } else { ?>
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                            <div class="dropdown-menu">
                                <?php if (isset($_SESSION['user_id'])) {
                                    print '<a href="my-account.php" class="nav-item nav-link">Mon Compte</a>
                                                    <a href="logout.php" class="nav-item nav-link" onclick="return confirm ("Quitter cette site ?");">Déconnecter</a>
                                                    ';
                                } else {
                                    print '  
                                                    <a href="login.php" class="nav-item nav-link">Connexion&Inscription</a>
    ';
                                } ?>

                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->

<!-- Bottom Bar Start -->
<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo.png" alt="Logo" style="height: 150px;">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <?php
                    $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` 
                                WHERE user_id = ?");
                    $count_wishlist_items->execute([$user_id]);
                    $total_wishlist_items = $count_wishlist_items->rowCount();



                    ?>
                    <?php
                    $count_cart_items = $conn->prepare("SELECT * FROM `paniers` 
                                WHERE user = ?");
                    $count_cart_items->execute([$user_id]);
                    $total_cart_items = $count_cart_items->rowCount();



                    ?>

                    <?php if (isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])) {
                        print ' <a href="cart.php" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>
                        ('.count($_SESSION['panier'][3]).')
                        </span>
                    </a>';
                    }else{
                        print ' <a href="cart.php" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <span>
                        (0)
                        </span>
                    </a>';
                    } ?>
                   
                    <a href="cart.php" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>

                        <span>
                            (<?= $total_cart_items; ?>)
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->