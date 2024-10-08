<?php
session_start();
//test user connectes
if(!isset($_SESSION['nom'])){ //user non connecté
    header('location:../connexion.php');
    exit();
}

// // connexion bd
include "../inc/functions.php";
$conn = connect();

 $visiteur = $_SESSION['id'];



// //var_dump($_POST);
$id_produit =  $_POST['nouveauté'];
$quantite =  $_POST['quantite'];





// //requete
$requete = "SELECT prix,nom FROM nouveautés WHERE id = '$id_produit' " ;
// //exécution de la requete

$resultat = $conn ->query($requete);

$produit = $resultat -> fetch();


$total = $quantite * $produit['prix'];

$date = date("Y-m-d");

if(!isset($_SESSION['panier'])){// panier n'existe pas
    $_SESSION['panier'] = array($visiteur, 0, $date, array()); //création du panier

}
$_SESSION['panier'][1] += $total ;

$_SESSION['panier'][3][] = array($quantite, $total,$date, $date, $id_produit,$produit['nom']);



header('location:../panier.php');
?>