<?php

include '../components/connect.php';

session_start();

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND
     password = ?");
    $select_admin->execute([$name,$pass]);

    if($select_admin->rowCount()> 0 ){

        $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
        $_SESSION['admin_id'] = $fetch_admin_id['id'];

header('location:dashboard.php');
    } else{
        $message[] = 'incorrect username or password!';
    }





}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    
<!-- font awsome cdn link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

<!-- custom css file link -->
<link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>



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

<!--admin login form section starts -->

<section class="form-container">
    <form action="" method="POST">
        <h3>login now</h3> 
        <p>default Username = <span>admin</span> & password = <span></span></p>

        <input type="text" name="name" maxlength="20" required placeholder="ecrire votre nom " class="box" oninput="this.value = this.value.replace(/\s/g, '')">
        <br>
        <br>
        <input type="password" name="pass" maxlength="20" required placeholder="ecrire votre password " class="box" oninput="this.value = this.value.replace(/\s/g, '')">

        <input type="submit" value="Login now" name="submit" class="btn">
    </form>
</section>
<!--admin login form section ends -->

</body>
</html>