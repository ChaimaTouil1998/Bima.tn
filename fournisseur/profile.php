<?php

include '../components/connect.php';

session_start();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BRIMA.TN - PROFIL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="../lib/slick/slick.css" rel="stylesheet">
    <link href="../lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <?php include "../inc/header_four.php"; ?>


    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Accueil</a></li>
                <li class="breadcrumb-item"><a href="product-list.php">Produits</a></li>
                <li class="breadcrumb-item active">Mon Compte</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Informations Fournisseur</a>
                        <a class="nav-link" href="../logout.php"><i class="fa fa-sign-out-alt"></i>Déconnexion</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">






                      
                            <h4>Modifier Mon Compte</h4>
                            <form action="dashboardFournisseur/index.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" name="nom_prenom" disabled type="text" placeholder="Nom & Prénom" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value=" <?= $fetch_profile['name']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="email" type="email"disabled placeholder="email" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['email']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="telephone" type="number" disabled placeholder="Téléphone" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['tel']; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" name="adresse" type="text" disabled placeholder="Adresse" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['adresse']; ?>">
                                    </div>
                                    <div class="col-md-12">


                            </form>
                        

                        
                    
                           
                        </div>
                        <div class="col-md-12">
                            <input type="submit" <?php if($_SESSION['etat'] ==0 ){
                                echo "disabled";
                            } ?> value="Accéder au dashboard Fournisseur " name="submit" class="btn">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- My Account End -->

    <?php include("../inc/footer.php"); ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>