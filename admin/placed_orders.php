<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if (!isset($admin_id)) {
    header('location:admin_login.php');
};

if(isset($_POST['update_payment'])){
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];
    $update_status =$conn->prepare("UPDATE `orders` SET payment_status=? WHERE id=? ");
    $update_status->execute([$payment_status, $order_id]);
    $message[] = 'Mise à jours de payment avec succès';
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id= ?");
    $delete_order->execute([$delete_id]);

    header('location:placed_orders.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>placed orders</title>

    <!-- font awsome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>
    <?php include '../components/admin_header.php' ?>

    <!-- Placed orders section starts -->

    <section class="placed-orders">

        <h1 class="heading">Passez votre commandes</h1>

        <div class="box-container">

            <?php

            $select_orders = $conn->prepare("SELECT * FROM `orders`");
            $select_orders->execute();

            if ($select_orders->rowCount() > 0) {
                while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {

            ?>
            <div class="box">
                <p>user id <span><?=$fetch_orders['user_id']; ?></span></p>
                <p>commandes passée le <span><?= $fetch_orders['placed_on'] ;?></span></p>
                <p>Nom <span><?= $fetch_orders['name'] ;?></span></p>
                <p>email <span><?= $fetch_orders['email'] ;?></span></p>
                <p>Numéro <span><?= $fetch_orders['number'] ;?></span></p>
                <p>Adresse <span><?= $fetch_orders['address'] ;?></span></p>
                <p>Total d'article<span><?= $fetch_orders['total_products'] ;?></span></p>
                <p>Prix total <span><?= $fetch_orders['total_price'] ;?></span></p>
                <p>Méthode de payment <span><?= $fetch_orders['method'] ;?></span></p>

                <form action="" method="POST">
                    <input type="hidden" name="order_id" value="<?=$fetch_orders['id']; ?>">

                    <select name="payment_status" class="drop-down" id="">
                        <option value="" selected disabled>
                            <?= $fetch_orders ['payment_status']; ?>
                            <option value="pending">En attente</option>
                            <option value="Completed">Terminer</option>
                        </option>
                    </select>
                    <div class="flex-btn">

                        <input type="submit" value="update" class="btn" name="update_payment">

                        <a href="placed_orders.php?delete=<?= $fetch_orders['id']; ?>" class="delete-btn" 
                        onclick="return confirm('Voulez vous supprimer cette commande?');">Supprimer</a>

                    </div>
                </form>

            </div>

            <?php

                }
            } else {
                echo '<p class="empty">aucune commande passée! </p>';
            }

            ?>

        </div>

    </section>


    <!-- Placed orders section starts -->

    <script src="../js/admin_script.js"></script>
</body>

</html>