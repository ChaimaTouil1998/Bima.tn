<?php
session_start();
//test user connectes
include "../components/connect.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

// // connexion bd
include "../inc/function.php";
$conn = connect();


// //var_dump($_POST);
$id_produit =  $_POST['name'];
$quantite =  $_POST['qty'];


////requete
$requete = "SELECT * FROM products WHERE id = '$id_produit' " ;

// //exécution de la requete

$resultat = $conn ->query($requete);

$produit = $resultat -> fetch();

$total = $quantite * $produit['price'];


$requete_panier = "INSERT INTO paniers (user, total) VALUES ('$user_id' , '$total')";

$resultat = $conn -> query($requete_panier);

if(!isset($_SESSION['panier'])){// panier n'existe pas
    $_SESSION['panier'] = array($user_id, 0, array()); //création du panier

}
$_SESSION['panier'][1] += $total ;

$_SESSION['panier'][4][] = array($quantite, $total, $id_produit,$produit['name'],$produit['image_01']);

header('location:../cart.php');
?>