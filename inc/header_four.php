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

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="height: 50px;">
                <div class="navbar-nav mr-auto">
                    <a href="index.php" class="nav-item nav-link">Accueil</a>
                    <a href="product-list.php" class="nav-item nav-link">Produits</a>
                    <a href="cart.php" class="nav-item nav-link">Panier</a>
                    <a href="checkout.php" class="nav-item nav-link">Checkout</a>



                    <a href="contact.php" class="nav-item nav-link">Contact Us</a>


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
                        <img src="../img/logo.png" alt="Logo" style="height: 150px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bottom Bar End -->