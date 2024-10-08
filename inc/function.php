<?php
function connect(){
    
    $servername = "";

    $DBuser = "root";
    
    $DBpassword = "";
    
    $DBname = "ms_brima";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
    //php end
    
}



function getAllFournisseurs(){
    $conn = connect();

        //1- creation de la requete 
        $requete = "SELECT * FROM fournisseur WHERE etat=0";

        //3- exécution de la requête
        $resultat = $conn -> query($requete);
   
        $users = $resultat ->fetchAll();

        return $users; 
}

function getAllProducts()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM products";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produits = $resultat->fetchAll();

    //var_dump($categories)
    return $produits;
}

function getAllProduitsFour()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM produits_four";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produits = $resultat->fetchAll();

    //var_dump($categories)
    return $produits;
}



function getAllProductsByCategory()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $category = $_GET['category'];
    $requete = "SELECT * FROM `products`
      WHERE category LIKE '%{$category}%' ";
    $resultat = $conn->query($requete);
    $cat = $resultat->fetchAll();
    //var_dump($categories)
    return $cat;
}

function ConnectFournisseur($data)
{

    //connexion base de données
    $conn = connect();


    $email = $data['email'];
    $mp = md5($data['mp']);
    $requete = "SELECT * FROM fournisseur WHERE email= '$email' AND mp ='$mp'";

    $resultat = $conn->query($requete);

    $fournisseur = $resultat->fetch();

    return $fournisseur;
}

function getProduitById($id){
  $conn = connect();

  //1- creation de la requete 
  $requete = "SELECT * FROM products WHERE id=$id";

   //3- exécution de la requête
   $resultat = $conn -> query($requete);

   //4- resultat
   $produit = $resultat -> fetch();

   return $produit;
}

function getAllProductsById()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $pid = $_GET['pid'];
    $requete = "SELECT * FROM `products`
      WHERE id = ? ";
    $resultat = $conn->query($requete);
    $cat = $resultat->fetchAll();
    //var_dump($categories)
    return $cat;
}

function getAllUsers()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM users";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $users = $resultat->fetchAll();

    //var_dump($categories)
    return $users;
}
function getAllProductsByVF()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM `products` WHERE category LIKE 'vente_flash' ";
    $resultat = $conn->query($requete);
    $produitVF = $resultat->fetchAll();
    //var_dump($categories)
    return $produitVF;
}

function getAllProductsByMO()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM `products` WHERE category LIKE 'meilleure_offre' ";
    $resultat = $conn->query($requete);
    $produitMO = $resultat->fetchAll();
    //var_dump($categories)
    return $produitMO;
}


function getAllProductsByJS()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM `products` WHERE category LIKE 'journnée_spéciale' ";
    $resultat = $conn->query($requete);
    $produitJS = $resultat->fetchAll();
    //var_dump($categories)
    return $produitJS;
}

function getAllProductsByHT()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM `products` WHERE category LIKE 'high_tech' ";
    $resultat = $conn->query($requete);
    $produitHT = $resultat->fetchAll();
    //var_dump($categories)
    return $produitHT;
}



function getAllPaniers(){
  $conn = connect();

  //1- creation de la requete 
  $requete = "SELECT u.name ,u.tel ,p.total,p.etat,p.image_01 , p.id FROM paniers p, users u WHERE p.user = u.id";

  //3- exécution de la requête
  $resultat = $conn -> query($requete);

  $commandes = $resultat ->fetchAll();

  return $commandes; 
}
function getAllCommandes(){
  $conn = connect();

  //1- creation de la requete 
  $requete = "SELECT p.name , p.image_01, c.qty, c.total, c.panier  FROM commandes c, products p WHERE c.name = p.id";

  //3- exécution de la requête
  $resultat = $conn -> query($requete);

  $commandes = $resultat ->fetchAll();

  return $commandes; 
}

function AddFournisseur($data)
{

   $conn = connect();

    // Hashage de Mot de passe
    $mphash = md5($data['mp']);

    $requete = "INSERT INTO fournisseur(nom_prenom,raison_social,matricule_fiscale,email,mp,telephone,adresse,piéce,site) 
    VALUES ('" . $data['nom_prenom'] . "','" . $data['raison_social'] . "','" . $data['matricule_fiscale'] . "','" . $data['email'] . "',
    '" . $mphash . "','" . $data["telephone"] . "','" . $data["adresse"] . "','" . $data["piéce"] . "','" . $data["site"] . "')";

    $resultat = $conn->query($requete);

    if ($resultat) {
        return true;
    } else {
        return false;
    }
}