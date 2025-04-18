<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/contact.css"/>
    <link rel="stylesheet" href="assets/css/header.css"/>

    <title>Contact</title>
</head>

<body>
<header>
        <a href="index.html" class="logo">Kepler</a>
    
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
    <h1> CONTACT</h1>

<div class="form">
    <form method="post" action="">
        <p>Contact us</p>    
            <input type="text" name="username" placeholder=" Username" required id="ps" />
            <input type="email" name="email" placeholder=" Email" required id="em"/> 
            <input type="subject" name="subject" placeholder=" Subject" required id="su"/>                 
            <textarea name="mymessage" placeholder=" My message" required id="my"></textarea>
            <input type="submit" name="submit" value="submit" id="btn"/>
    </form>

    </section>
    </body>
</html>