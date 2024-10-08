<?php
session_start();
//1- recupération des données de la formulaire
$id = $_POST['idp'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$date_modification = date("Y-m-d"); //2023-06-14
$target_dir = "../../img/";
$target_file = $target_dir.basename($_FILES["image"]["name"]);

if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
    $image = $_FILES["image"]["name"];
}else{
    echo "Sorry, there ";
}

//2- la chaîne de connexion
include "../../inc/function.php";
$conn = connect();

//3- Creation de la requête d'exécution
$requete = "UPDATE  produits_four SET nom = '$nom', description = '$description',prix = '$prix',image='$image', date_modification = '$date_modification' WHERE id='$id' ";


//4- Execution de la requête
$resultat = $conn -> query($requete);

if($resultat){
    header('location:liste.php?modif=ok');
}

?>