<?php
session_start();

if(isset($_SESSION['nom_prenom'])){
    header('location:profile.php');

}

include "../inc/function.php";
if(!empty($_POST)){
    AddFournisseur($_POST);
}

$fournisseur =true;

if (!empty($_POST)){
    $fournisseur = ConnectFournisseur($_POST);

    if( is_array($fournisseur) && count($fournisseur) > 0){
        session_start();
        $_SESSION['email'] = $fournisseur['email'];
        $_SESSION['nom_prenom'] = $fournisseur['nom_prenom'];
        $_SESSION['mp'] = $fournisseur['mp'];
        $_SESSION['telephone'] = $fournisseur['telephone'];
        $_SESSION['etat'] = $fournisseur['etat'];

        header('location:profile.php');
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BRIMA.TN - CONNEXION_Fournisseur</title>
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


    <!-- Bottom Bar Start -->

    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active">Login & Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <form action="connexionF.php" method="post">
                        <h3>Inscription</h3>
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom & Prénom</label>
                                    <input class="form-control" name="nom_prenom" type="text" placeholder="Nom & Prénom" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>Code</label>
                                    <input class="form-control" name="code" type="text" placeholder="code" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>Raison Social</label>
                                    <input class="form-control" name="raison_social" type="text" placeholder="Raison social" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>
                                

                                <div class="col-md-6">
                                    <label>Matricule fiscale</label>
                                    <input class="form-control" name="matricule_fiscale" type="text" placeholder="Matricule fiscale" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>Adresse de livraison</label>
                                    <input class="form-control" name="adresse" type="text" placeholder="Adresse de livraison" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="email" placeholder="email" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>Téléphone</label>
                                    <input class="form-control" name="telephone" type="number" placeholder="Téléphone" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>Site Web</label>
                                    <input class="form-control" name="site" type="text" placeholder="Site Web" required oninput="this.value = this.value.replace
                                    (/\s/g, '')">
                                </div>

                                <div class="col-md-6">
                                    <label>Mot de passe</label>
                                    <input class="form-control" name="mp" type="password" placeholder="mot de passe" oninput="this.value = 
                                    this.value.replace(/\s/g, '')">
                                </div>

                                

                                <div class="col-md-6">
                                    <a href="../files/Hébergeurs en Tunisie (1).pdf" >Tapez pour télécharger la charte d’utilisation de ce site, des réseaux et des services multimédia...</a> 
                                </div>

                                <div class="inputBox">
                    <span>Veuillez ajouter la charte signé ci-dessous</span>
                    <br>
                    <input type="file" name="piéce" class="box" accept="files/jpg, files/jpeg, files/png, files/webp, files/pdf" id="" >
                </div>
                            

                                <div class="col-md-12">
                                    <br>
                                    <input type="submit" value="Valider" name="submit1" class="btn">
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <form action="" method="post">
                    <h3>Connexion</h3>

                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6"> 
                                    <label>E-mail</label>
                                    <input class="form-control" required type="email" name="email" placeholder="E-mail" oninput="this.value = 
                                    this.value.replace(/\s/g, '')">
                                </div>
                                <div class="col-md-6">
                                    <label>Mot de Passe</label>
                                    <input class="form-control" name="mp" type="password" placeholder="Password" oninput="this.value = 
                                    this.value.replace(/\s/g, '')">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Se Connecter" name="submit" class="btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
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