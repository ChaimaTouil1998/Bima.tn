<?php 

$nom =$_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];


$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);


if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
    $image = $_FILES["image"]["name"];
}else{
    echo "Sorry, there ";
}

$date = date('Y-m-d');

//2- la chaîne de connexion
include "../../inc/function.php";
$conn = connect();

try {
    //3- Creation de la requête d'exécution
    $requete = "INSERT INTO produits_four(nom,description,prix,image,date_creation) VALUES ('$nom','$description','$prix','$image','$date')";

    //4- Execution de la requête
    $resultat = $conn->query($requete);

    if ($resultat) {
        
$produit_id = $conn->lastInsertId();

    // $requete2 = "INSERT INTO stocks(produit,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur','$date_creation')"; 

   // if($conn -> query($requete2)){
        //header('location:liste.php?ajout=ok');
    //}else{
        //echo "Impossible d'ajouter le stock du produit";
    //}
   
    }
    
} catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    if($e -> getCode() == 23000){
        header('location:liste.php?erreur=duplicate');
    }
}
?>