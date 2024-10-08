<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if (!isset($admin_id)) {
    header('location:admin_login.php');
};

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $details = $_POST['details'];
    $details = filter_var($details, FILTER_SANITIZE_STRING);

    $category = $_POST['category'];
    $category = filter_var($category, FILTER_SANITIZE_STRING);

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_size = $_FILES['image_01']['name'];
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_folder = '../img/' . $image_01;


    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_size = $_FILES['image_02']['name'];
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_folder = '../img/' . $image_02;

    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_size = $_FILES['image_03']['name'];
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_folder = '../img/' . $image_03;

    $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
    $select_products->execute([$name]);

    if ($select_products->rowCount() > 0) {
        $message[] = 'produit existe déjà !';
    } else {

        move_uploaded_file($image_01_tmp_name, $image_01_folder);
        move_uploaded_file($image_02_tmp_name, $image_02_folder);
        move_uploaded_file($image_03_tmp_name, $image_03_folder);
        $insert_product = $conn->prepare("INSERT INTO `products` (name, details, price, image_01, image_02, image_03,category) VALUES (?,?,?,?,?,?,?)");

        $insert_product->execute([$name, $details, $price, $image_01, $image_02, $image_03,$category]);


        $message[] = "Nouveau produit a été ajouté";
    }
}

if(isset($_GET['delete'])){
    $delete_id =  $_GET['delete'];
    $delete_product_image = $conn -> prepare("SELECT * FROM `products` WHERE id=?");
    $delete_product_image -> execute([$delete_id]);
    $fetch_delete_image = $delete_product_image -> fetch(PDO::FETCH_ASSOC);
    unlink('../img/'.$fetch_delete_image['image_01']);
    unlink('../img/'.$fetch_delete_image['image_02']);
    unlink('../img/'.$fetch_delete_image['image_03']);

    $delete_product = $conn -> prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product -> execute([$delete_id]);

    $delete_cart = $conn ->prepare("DELETE FROM `cart` WHERE pid = ?");
    $delete_cart -> execute([$delete_id]);

    $delete_wishlist = $conn ->prepare("DELETE FROM `wishlist` WHERE pid = ?");
    $delete_wishlist -> execute([$delete_id]);

    header('location:products.php'); 

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>

    <!-- font awsome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>
    <?php include '../components/admin_header.php' ?>


    <!-- ajouter produit start -->

    <section class="add-products">
        <h1 class="heading">Ajouter Produit</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" class="name">
            <div class="flex">

                <div class="inputBox">
                    <span>Nom du Produit (*)</span>
                    <input type="text" class="box" name="name" maxlength="100" required placeholder="Entrer Nom du Produit">
                </div>

                <div class="inputBox">
                    <span>Prix du Produit (*)</span>
                    <input type="number" class="box" min="0" max="99999999999999999" name="price" maxlength="100" required placeholder="Entrer Prix du Produit" onkeypress="if(yhis.value.length == 10) return false;">
                </div>

                <div class="inputBox">
                    <span>catégorie du Produit (*)</span>
                    <br>
<select name="category" id="">
    <option value="vente_flash">vente_flash</option>
    <option value="meilleure_offre">meilleure_offre</option>
    <option value="journnée_spéciale">journnée_spéciale</option>
    <option value="jardinage">Jardinage</option>
    <option value="téléphone&tablette">téléphone & tablette</option>
    <option value="cuisine&electromenager">Cuisine & Electromenager</option>
    <option value="electronique">Electronique</option>
    <option value="jardin&pleinair">jardin & pleinair</option>
    <option value="mode">mode</option>
    <option value="maison&bureau">Maison & Bureau</option>
    <option value="informatique">Informatique</option>
    <option value="articledesport">Article de sport</option>
    <option value="high_tech">High Tech</option>
    <option value="accessoires">Accesoires</option>
    <option value="autre">autre</option>
    


</select>                
</div>

                <div class="inputBox">
                    <span>image 01 (*)</span>
                    <input type="file" name="image_01" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" id="" required>
                </div>

                <div class="inputBox">
                    <span>image 02 (*)</span>
                    <input type="file" name="image_02" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" id="" required>
                </div>



                <div class="inputBox">
                    <span>image 03 (*)</span>
                    <input type="file" name="image_03" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" id="" required>
                </div>

                <div class="inputBox">
                    <span>Détails du Produit</span>
                    <textarea name="details" class="box" id="" cols="30" rows="10" maxlength="500" placeholder="Entrer Détails du produit" required></textarea>
                </div>
                <input type="submit" value="add product" name="add_product" class="btn">
            </div>
        </form>
    </section>

    <!-- ajouter produit end -->




    <!-- show products section starts -->

    <section class="show-products">
        <h1 class="heading"> Produits ajoutés</h1>
        <div class="box-container">
            <?php
            $show_products = $conn->prepare("SELECT * FROM `products`");
            $show_products->execute();
            if ($show_products->rowCount() > 0) {
                while ($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)) {


            ?>
            <div class="box">
                <img src="../img/<?= $fetch_products['image_01']; ?>" alt="">
                <div class="name"><?= $fetch_products['name'];  ?></div>
                <div class="price"><?= $fetch_products['price'];  ?> DT</div>
                <div class="details"><?= $fetch_products['details'];  ?></div>

                <div class="flex-btn">
                    <a href="update_products.php?update=<?= $fetch_products['id']; ?>" class="btn">Modifier</a>
                    <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('Voulez vous supprimer ce produit ?');">Supprimer</a>

                </div>
            </div>
            <?php
                }
            } else {
                echo '<p class="empty">Aucun Produit ajouté !</p>';
            }
            ?>
        </div>
    </section>

    <!-- show products section ends -->

    <script src="../js/admin_script.js"></script>
</body>

</html>