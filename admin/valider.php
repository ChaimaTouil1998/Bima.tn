<?php

$idvisiteur = $_GET['id'];


include "../inc/function.php";
$conn = connect();


$requete = "UPDATE fournisseur SET etat= 1 WHERE id= '$idvisiteur'";

$resultat = $conn -> query($requete);

if ($resultat){
    header('location:listeFournisseur.php?valider=ok');
}else{
    echo "Erreur de validation";
}
?>