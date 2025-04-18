<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/header.css"/>

    <title>Login</title>
</head>    
<body>
<header>
        <a href="index.php" class="logo">Kepler</a>
    
        <nav class="header">
            <ul class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>


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