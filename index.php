<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $email = mysqli_real_escape_string($conn, $_POST['usermail']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $_SESSION['usermail'] = $email;
      header('location:dex.html');
   }else{
      $error[] = 'Mot de passe ou email incorect.';
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>
<body>
     <!-- header  -->
     <header>
        <div class="menu_toggle">
            <span></span>
        </div>

        <div class="logo">
            <p><span>Accessoires</span>Informatiques</p>
        </div>
        <ul class="menu">
            <li><a href="index.html">Acceuil</a></li>
            <li><a href="accessoire.html">Accessoires</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <button class="login_btn">Connexion</button>
    </header>
    
<div class="form-container">

    <form action="" method="post">
        <h3 class="title">Se connecter</h3>
        <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$Erreur.'</span>';
            }
         }
      ?>
       <input type="email" name="usermail" placeholder="Enter votre email" class="box" required>
        <input type="password" name="password" placeholder="Enter votre mot de passe" class="box" required>
        <input type="submit" value="Se connecter" class="form-btn" name="submit">
        <p>Vous n'avez pas de compte? <a href="register_form.php">Créer un compte</a></p>
    </form>

</div>

<footer>
        <p>Accessoires Informatiques Copyright 2024</p>
    </footer>

    <script>
        //menu responsive code JS
        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu');
        var menu_toggle_span = document.querySelector('.menu_toggle span');

        menu_toggle.onclick = function(){
            menu_toggle.classList.toggle('active');
            menu_toggle_span.classList.toggle('active');
            menu.classList.toggle('responsive');
        }
    </script>
</body>
</html>