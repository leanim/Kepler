<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>Login</title>
</head>    
<body>

    <section>
    <div class="intro">
        <h1>LOGIN</h1> 
        
        <?php
        if (isset($_SESSION['error'])) { 
            echo '<div class="error">' . htmlspecialchars($_SESSION['error']) . '</div>'; 
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success'])) {
            echo '<div class="success">' . htmlspecialchars($_SESSION['success']) . '</div>'; 
            unset($_SESSION['success']); 
        }
        ?>

    </div>
        
        <div class="content">
        <form method="POST" action="checkLogin.php">
            <p>Sign in</p>
            <input type="email" name="email" placeholder="  Email" required id="em"/>
            <input type="password" name="password" placeholder="  Password" required id="pas"/>
            <input type="submit" name="submitForm" value="Login" id="log"/>
            <a href="register.php">Register</a>
        </form>
        </div>
    </section>

</body>
</html>