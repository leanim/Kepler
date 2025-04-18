<?php
require_once 'database.php';
$db = Database::getInstance()->getConnection();
$search = $_GET['q'] ?? '';

$stmt = $db->prepare("SELECT * FROM planets WHERE name LIKE ?");
$stmt->execute(["%$search%"]);
$planets = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/header.css"/>

    <title>Search</title>

</head> 

<body>
<?php include 'header.php'; ?>
    <section>
        <h1>SEARCH</h1> 
        <form method="get">
            <input type="text" name="q" placeholder="Search" value="<?= htmlspecialchars($search) ?>">
        </form>

        <div class="eclipsecard">
    <a href="eclipse.php" class="planetlink">
    <div class="text-overlay">
        <h2>Eclipses</h2>
        <p>Click to explore upcoming eclipses</p>
    </div>
    </a>
</div>

    <?php foreach ($planets as $planet): ?>
        <div class="planetcard">
        <a href="planet.php?id=<?= $planet['id'] ?>" class="planetlink">
            <h2><?= $planet['name'] ?></h2>
            <p>Diameter : <?= $planet['diameter_km'] ?> km</p>
            <p>Temperature : <?= $planet['mean_temperature_celsius'] ?>°C</p>
        </div>
    <?php endforeach; ?>
    </section>
</body>
</html>