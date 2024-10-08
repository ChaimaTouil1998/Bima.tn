<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];


if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name,FILTER_SANITIZE_STRING);

    $updates_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
    $updates_name->execute([$name,$admin_id]);

    $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

    $select_old_pass = $conn->prepare("SELECT password FROM `admins` WHERE id=?");
    $select_old_pass->execute([$admin_id]);

    $fetch_prev_pass = $select_old_pass->fetch(PDO::FETCH_ASSOC);

    $prev_pass = $fetch_prev_pass['password'];

    $old_pass = sha1($_POST['old_pass']);
    $old_pass = filter_var($old_pass,FILTER_SANITIZE_STRING);

    $new_pass = sha1($_POST['new_pass']);
    $new_pass = filter_var($new_pass,FILTER_SANITIZE_STRING);

    $confirm_pass = sha1($_POST['confirm_pass']);
    $confirm_pass = filter_var($confirm_pass,FILTER_SANITIZE_STRING);

    if($old_pass == $empty_pass){
        $message[] = 'Entrer votre ancien mot de passe';
    }elseif($old_pass != $prev_pass){

        $message[] = ' ancien mot de passe incorrecte';

    }elseif($new_pass != $confirm_pass){
        $message[] = 'le mot de passe ne correspond pas';
    }else{
        if($new_pass != $empty_pass){

            $updates_pass = $conn->prepare("UPDATE `admins` SET password= ? WHERE id = ?");
            $updates_pass->execute([$confirm_pass,$admin_id]);

            $message[] = 'Mot de passe modifier avec succès';

        }else{
            $message[] = 'S`il vous plait Enter votre mot de passe ';
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile update</title>

    <!-- font awsome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>
    <?php include '../components/admin_header.php' ?>

    <!--admin profile update section starts -->

<section class="form-container">
    <form action="" method="POST">
        <h3>Modifier votre profile </h3> 

        <input type="text" name="name" maxlength="20"  placeholder="ecrire votre nom " class="box" 
        oninput="this.value = this.value.replace(/\s/g, '')" value="<?= $fetch_profile['name']; ?>">
        <br>
        <br>
        <input type="password" name="old_pass" maxlength="20"  placeholder="ecrire votre ancien mot de passe " class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <br>
        <br>
        <input type="password" name="new_pass" maxlength="20"  placeholder="ecrire votre nouveau mot de passe " class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <br>
        <br>
        <input type="password" name="confirm_pass" maxlength="20"  placeholder="Confirmer votre mot de passe " class="box" oninput="this.value = this.value.replace(/\s/g, '')">

        <input type="submit" value="modifier" name="submit" class="btn">
    </form>
</section>
   <!--admin profile update section ends -->



    <script src="../js/admin_script.js"></script>
</body>

</html>