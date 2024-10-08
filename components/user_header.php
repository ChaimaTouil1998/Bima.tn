<?php

if(isset($message)){
    foreach($message as $message){
        echo '
            <div class="message">
             <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        
            </div>
        ';
    }
}

?>



<header class="header">

    <section class="flex">



   


<div class="icons">
    <div class="fas fa-bars" id="menu-btn"></div>
    <div class="fas fa-user" id="user-btn"></div>

</div>

<div class="profile">
    <?php
        $select_profile = $conn -> prepare("SELECT * FROM  `users` WHERE id=? ");
        $select_profile -> execute([$user_id]);
        $fetch_profile = $select_profile -> fetch(PDO::FETCH_ASSOC);
    ?>

    <p><?= $fetch_profile['name']; ?></p>
    <a href="update_profile.php" class="btn">Modifier Profil</a>

    <div class="flex-btn">
        <a href="admin_login.php" class="option-btn">Connexion</a>
        <a href="register.php" class="option-btn">Inscription</a>

    </div>
    <a href="../logout.php" onclick="return confirm('êtes-vous sûr de vouloir vous déconnecter ');" class="delete-btn">Déconnexion</a>

</div>
    </section>
</header> 