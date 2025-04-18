<?php
require_once 'database.php';
$db = Database::getInstance()->getConnection();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: search.php');
    exit();
}

$planetId = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM planets WHERE id = ?");
$stmt->execute([$planetId]);
$planet = $stmt->fetch();

$diameter = isset($planet['diameter_km']) ? number_format($planet['diameter_km']) . ' km' : 'Unknown';
$mass = isset($planet['mass_kg']) ? number_format($planet['mass_kg']) . ' kg' : 'Unknown';
$gravity = isset($planet['gravity']) ? $planet['gravity'] : 'Unknown';
$distance = isset($planet['distance_from_sun_km']) ? number_format($planet['distance_from_sun_km']) . ' km' : 'Unknown';
$temperature = isset($planet['mean_temperature_celsius']) ? $planet['mean_temperature_celsius'] . '°C' : 'Unknown';
$moons = isset($planet['number_of_moons']) ? $planet['number_of_moons'] : 'Unknown';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/planet.css">
    <title><?= htmlspecialchars($planet['name']) ?></title>
</head>
<body>
    <section class="planetdetails">
        <h1><?= htmlspecialchars($planet['name']) ?></h1>
            <?php; ?>
            
            <div class="planetdata">
                <p><strong>Diameter :</strong> <?= $diameter ?></p>
                <p><strong>Mass :</strong> <?= $mass ?></p>
                <p><strong>Gravity :</strong> <?= $gravity?></p>
                <p><strong>Distance from Sun :</strong> <?= $distance ?></p>
                <p><strong>Number of Moons :</strong> <?= $moons ?></p>
                <p><strong>Average Temperature :</strong> <?= $temperature ?></p>
            </div>
        </div>
        
        <a href="search.php" class="backbtn">Back to Search</a>
    </section>
</body>
</html>