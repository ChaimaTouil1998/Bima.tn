<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_admin = $conn->prepare("DELETE FROM `admins` WHERE id= ?");
    $delete_admin->execute([$delete_id]);

    header('location:admin_accounts.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admins accounts</title>

    <!-- font awsome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>
    <?php include '../components/admin_header.php' ?>

    <!-- admins accounts section starts -->

    <section class="accounts" >

    <h1 class="heading">admins accounts</h1>
        
        <div class="box-container">

        <div class="box">
            <p>Admin register</p>
            <a href="register_admin.php" class="option-btn">Register </a>
        </div>


            <?php

            $select_account = $conn->prepare("SELECT * FROM `admins`");
            $select_account->execute();

            if($select_account->rowCount() > 0) {
                while($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)){

                    ?>
                    <div class="box">
                        <p>admin id : <span><?= $fetch_accounts['id'] ;?></span> </p>
                        <p>Nom : <span><?= $fetch_accounts['name'] ;?></span></p>

                        <div class="flex-btn">
                            <a href="admin_accounts.php?delete=<?= $fetch_accounts['id']; ?>" 
                            class="delete-btn" onclick="return confirm('Supprimer ce compte?');
                            ">delete</a>
                            <?php
                            if($fetch_accounts['id'] ==$admin_id){
                                echo '<a href="update_profile.php" class="option-btn">Modifier</a>' ;
                            }
                            ?>
                        </div>
                    </div>

                    <?php
                }
            }else{
                echo '<p class="empty">Aucun compte disponible</p>' ;
            }

            ?>
        </div>
    </section>

    <!-- admins accounts section ends -->





    <script src="../js/admin_script.js"></script>
</body>

</html>