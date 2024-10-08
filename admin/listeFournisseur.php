<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if (!isset($admin_id)) {
    header('location:admin_login.php');
};


include "../inc/function.php";

$four = getAllFournisseurs();




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

   

    <?php
                    if (isset($_GET['valider']) && $_GET['valider'] == "ok") {
                        print '  <div class="alert alert-success">
                        Visiteur validé
                        </div>';
                    }
                    ?>

                    

                   <section class="dashboard">
                   <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom et Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($four as $i => $visiteur) {
                                $i++;
                                print '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td>' . $visiteur['nom_prenom'] . '</td>
                                    <td >' . $visiteur['email'] . '</td>

                                    <td>
                                        <a  href="valider.php?id='.$visiteur['id'].'" class="btn btn-success">Valider</a>
                                    </td>
                                </tr>';
                            }
                            ?>

                        </tbody>

                    </table>
                   </section>


                </div>
    <!-- show products section ends -->

    <script src="../js/admin_script.js"></script>
</body>

</html>