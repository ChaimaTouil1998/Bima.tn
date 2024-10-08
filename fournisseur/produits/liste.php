<?php
session_start();

include "../../inc/function.php";
$produits = getAllProduitsFour();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fournisseur - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "../template/navigation.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <h1>Liste des produits</h1>







                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nom_prenom'] ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../fournisseur/profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <?php if (isset($_GET['ajout']) && $_GET['ajout'] == 'ok') {
                    print '<div class="alert alert-success"> Produit Ajouté avec succés';
                } ?>
                <a class="btn float-right btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($produits as $p) {
                                $i++;
                                print '<tr>
                                    <th scope="row">' . $i . '</th>
                                    <td>' . $p['nom'] . '</td>
                                    <td >' . $p['description'] . '</td>
                                    <td>'.$p['prix'].' DT</td>

                                    <td>
                                    <a data-bs-toggle="modal" data-bs-target="#editModal' . $p['id'] . '" class="btn btn-success">Modifier</a>
                                    <a href="supprimer.php?idp=' . $p['id'] . '" class="btn btn-danger">Supprimer</a>
                                </td>
                                </tr>';
                            }
                            ?>

                        </tbody>

                    
                    </table>
                </div>
            </div>

            <!-- End of Main Content -->
            <div class="card-body">
                <br>

            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ajout.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" id="" placeholder="nom du produit">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" class="form-control" placeholder="description du produit" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="prix" class="form-control" id="" placeholder="prix du produit">
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control" id="" placeholder="prix du produit">
                        </div>
                        <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
                    </form>
                    

                </div>
                
                <input type="hidden" name="createur" value="<?php echo $_SESSION['user_id']; ?>">
            </div>
        </div>
    </div>





    <?php
    foreach ($produits as $index => $produit) {
    ?>

        <!-- Modal Modifier-->
        <div class="modal fade" id="editModal<?php echo $produit['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifier un produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="modifier.php" method="post">
                            <input type="hidden" value="<?php echo $produit['id']; ?>" name="idp" />
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" value="<?php echo $produit['nom']; ?>" placeholder="nom du produit...">
                            </div>
                            <div class="form-group">
                                <input type="number" name="prix" class="form-control" value="<?php echo $produit['prix']; ?>" placeholder="prix du produit...">
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="description" class="form-control" placeholder="entrer une description ..."><?php echo $produit['description']; ?> </textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" value="<?php echo $produit['image']; ?>" placeholder="image du produit...">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    <?php
    }
    ?>






    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>