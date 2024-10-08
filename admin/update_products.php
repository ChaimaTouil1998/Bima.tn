<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if (!isset($admin_id)) {
    header('location:admin_login.php');
};

if(isset($_POST['update'])){

    $pid = $_POST['pid'];
    $pid = filter_var($pid, FILTER_SANITIZE_STRING);

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);

    $details = $_POST['details'];
    $details = filter_var($details, FILTER_SANITIZE_STRING);

    $update_product = $conn -> prepare("UPDATE `products` SET name =? , details =?, price =? WHERE id = ?");
    $update_product -> execute([$name,$details, $price, $pid]);

    $message[] = 'Produit a été bien modifié';

    $old_image_01 = $_POST['old_image_01'];
    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
    $image_01_size = $_FILES['image_01']['name'];
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_folder = '../img/' . $image_01;

    if(!empty($image_01)){

        $update_image_01 = $conn -> prepare("UPDATE `products` SET image_01=? WHERE id=?");
       $update_image_01 -> execute([$image_01,$pid]);
       move_uploaded_file($image_01_tmp_name, $image_01_folder);
       unlink('../img/'.$old_image_01);
       $message[] = 'iamge modifiée';
    }

    $old_image_02 = $_POST['old_image_02'];
    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
    $image_02_size = $_FILES['image_02']['name'];
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_folder = '../img/' . $image_02;
    if(!empty($image_02)){

        $update_image_02 = $conn -> prepare("UPDATE `products` SET image_02=? WHERE id=?");
       $update_image_02 -> execute([$image_02,$pid]);
       move_uploaded_file($image_02_tmp_name, $image_02_folder);
       unlink('../img/'.$old_image_02);
       $message[] = 'iamge modifiée';
    }
    $old_image_03 = $_POST['old_image_03'];
    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
    $image_03_size = $_FILES['image_03']['name'];
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_folder = '../img/' . $image_03;
    if(!empty($image_03)){

        $update_image_03 = $conn -> prepare("UPDATE `products` SET image_03=? WHERE id=?");
       $update_image_03 -> execute([$image_03,$pid]);
       move_uploaded_file($image_03_tmp_name, $image_03_folder);
       unlink('../img/'.$old_image_03);
       $message[] = 'iamge modifiée';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>

    <!-- font awsome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>
    <?php include '../components/admin_header.php' ?>

    <!-- update product section starts -->

<section class="update-product">

<h1 class="heading"> Modifier Produit</h1>
<?php

            $update_id = $_GET['update'];
            $show_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
            $show_products->execute([$update_id]);
            if ($show_products->rowCount() > 0) {
                while ($fetch_products = $show_products->fetch(PDO::FETCH_ASSOC)) {


            ?>
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">

                <input type="hidden" name="old_image_01" value="<?= $fetch_products['image_01']; ?>">
                <input type="hidden" name="old_image_02" value="<?= $fetch_products['image_02']; ?>">
                <input type="hidden" name="old_image_03" value="<?= $fetch_products['image_03']; ?>">

                 <div class="image-container">
                    <div class="main-image">
                        <img src="../img/<?= $fetch_products['image_01']; ?>" alt="" >
                    </div>
                    <div class="sub-images">
                        <img src="../img/<?= $fetch_products['image_01']; ?>" alt="" >
                        <img src="../img/<?= $fetch_products['image_02']; ?>" alt="" >
                        <img src="../img/<?= $fetch_products['image_03']; ?>" alt="" >
                    </div>
                    
                 </div>
                 <span>Modifier le nom </span>
                 <input type="text"  required placeholder="Entrer le nom du produit"  name="name" maxlength="100" class="box" value="<?= $fetch_products['name']; ?>" id="">

                 <span>Modifier le prix </span>
                 <input type="number" min="0" max="9999999999" required placeholder="Entrer le prix du produit" name="price" onkeypress="if(this.value.length == 10) return false;" class="box" 
                 value="<?= $fetch_products['price']; ?>" id="">
                 <textarea name="details" class="box" id="" cols="30" rows="10" maxlength="500" placeholder="Entrer Détails du produit" required ><?= $fetch_products['details'];  ?></textarea>
                 
                 <span>Modifier Image 1 </span>
                 <input type="file" name="image_01" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" >
                 <span>Modifier Image 2 </span>
                 <input type="file" name="image_02" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" >
                 <span>Modifier Image 3 </span>
                 <input type="file" name="image_03" class="box" accept="image/jpg, image/jpeg, image/png, image/webp" >
                 <div class="flex-btn">
                    <input type="submit" value="update" class="btn" name="update"> 
                    <a href="products.php" class="option-btn ">Retourner</a>
                 </div>
            </form>

<?php
                }
            } else {
                echo '<p class="empty">Aucun Produit ajouté !</p>';
            }
            ?>
</section>


    <!-- update product section ends -->

    <script src="../js/admin_script.js"></script>
</body>

</html>