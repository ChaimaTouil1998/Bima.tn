<?php
session_start();
// // connexion bd
include "../inc/functions.php";
$conn = connect();

//id visiteur
$visiteur = $_SESSION['id'];

$total = $_SESSION['panier'][1];

//creation du panier
$requete_panier ="INSERT INTO paniers (user, total) VALUES ('$user_id' , '$total')";

//exécution de la requete_panier

$resultat = $conn ->query($requete_panier);

$panier_id = $conn ->lastInsertId();

$commandes = $_SESSION['panier'][4];


foreach($commandes as $commande){
    //Ajouter une commande
    //requete

    $quantite = $commande[0];
    $total = $commande[1];
    $id_produit = $commande[4];


    $requete = "INSERT INTO commandes(qty,total,panier,name) VALUES('$quantite','$total','$panier_id','$id_produit')" ;
    //exécution de la requete

    $resultat = $conn ->query($requete);
}
//supprimer panier 
$_SESSION['panier']= null;
//redirection vers la page index
header('location:../checkout.php');



?>