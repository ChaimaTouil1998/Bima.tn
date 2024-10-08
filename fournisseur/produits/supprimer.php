<?php

//echo "Id de categories ".$_GET['idp'];
$idproduit = $_GET['idp'];

include "../../inc/function.php";

$conn = connect();

$requete = "DELETE FROM produits_four WHERE id ='$idproduit'";

$resultat= $conn-> query($requete);
 
if ($resultat){
    //echo "catégories a été supprimé avec succés.";
    header('location:liste.php?delete=ok');
}

?>
