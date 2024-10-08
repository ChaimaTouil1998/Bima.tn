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


////requete
$requete = "SELECT * FROM products WHERE id = ? " ;

// //exécution de la requete

$resultat = $conn ->query($requete);

$produit = $resultat -> fetch();

$total = $quantite * $produit['price'];


$requete_panier = "INSERT INTO wishlist (user, total) VALUES ('$user_id' , '$total')";

$resultat = $conn -> query($requete_panier);

if(!isset($_SESSION['wish'])){// panier n'existe pas
    $_SESSION['wish'] = array($user_id, 0, array()); //création du panier

}
$_SESSION['wish'][1] += $total ;

$_SESSION['wish'][4][] = array($quantite, $total,$produit['name'],$produit['image_01']);

header('location:../wishlist.php');
?>