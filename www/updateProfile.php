<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/updateProfile.css">
    <link rel="stylesheet" href="assets/css/header.css"/>

    <title>Profile</title>
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
        <h1>PROFILE</h1> 
        
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


        <nav class="acc">
            <nav class="usern">
                <form method="POST" action="checkProfile.php">
                <p>Update your username</p>
                <input type="username" name="current_username" placeholder=" Current username" required id="user"/>
                <input type="username" name="new_username" placeholder="  New username" required id="user"/>
                <input type="username" name= "confirm_new_username" placeholder="  Confirm new username" required id="user"/>
                <input type="submit" value="Confirm"name= "update_name" id="conf"/>
                </form>
            </nav>

            <nav class="pic">
                <form method="POST" action="picture.php" enctype="multipart/form-data">
                <p>Update your profile picture</p>
                <label for="profile_picture">Select a new profile picture :</label>
                <input type="file" name="profile_picture" id="profile_picture" required>
                <button type="submit" class="button">Download</button>
                </form>
            </nav>

            <nav class="logout">
                <form method="POST" action="logout.php">
                <button type="submit" class="btn">Logout</button>
                </form>
            </nav>
        </nav>    
    </section>
</body>
</html>