<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
    header('location:index.php');
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email= ? AND password =?");
    $select_user->execute([$email, $pass]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row['id'];
        header('location:index.php');
    } else {
        $message[] = 'incorrect email ou mot de passe';
    }
}


if (isset($_POST['submit1'])) {

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $tel = $_POST['tel'];
    $tel = filter_var($tel, FILTER_SANITIZE_STRING);

    $adresse = $_POST['adresse'];
    $adresse = filter_var($adresse, FILTER_SANITIZE_STRING);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email= ? ");

    $select_user->execute([$email]);
    $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if ($select_user->rowCount() > 0) {
        $message[] = 'utilisateur existe déjà';
    } else {
        if ($pass != $cpass) {
            $message[] = 'les deux mots de passe ne sont pas confirmés';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password,tel,adresse) VALUES (?,?,?,?,?);");
            $insert_user->execute([$name, $email, $cpass,$tel,$adresse]);
            $message[] = 'Inscription réussite';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BRIMA.TN - CONNEXION</title>
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
    <?php include "inc/user_header.php"; ?>
  
    <!-- Bottom Bar Start -->

    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                <li class="breadcrumb-item"><a href="">Products</a></li>
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
                    <form action="" method="post">
                        <h3>Inscription</h3>
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom & Prénom</label>
                                    <input class="form-control" name="name" type="text" placeholder="Nom & Prénom" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['name']; ?>">
                                </div>

                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="email" placeholder="email" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['email']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Téléphone</label>
                                    <input class="form-control" name="tel" type="number" placeholder="Téléphone" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['tel']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Adresse</label>
                                    <input class="form-control" name="adresse" type="text" placeholder="Adresse" required oninput="this.value = this.value.replace
                                    (/\s/g, '')" value="<?= $fetch_profile['adresse']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Mot de passe</label>
                                    <input class="form-control" name="pass" type="password" placeholder="mot de passe" oninput="this.value = 
                                    this.value.replace(/\s/g, '')" value="<?= $fetch_profile['pass']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Confirmer mot de passe</label>
                                    <input class="form-control" name="cpass" type="password" placeholder="confirmer mot de passe" oninput="this.value = 
                                    this.value.replace(/\s/g, '')"value="<?= $fetch_profile['cpass']; ?>">
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" value="Se Connecter" name="submit1" class="btn">
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Login End -->
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