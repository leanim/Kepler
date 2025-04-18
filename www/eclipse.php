<?php
require_once 'Database.php';
$db = Database::getInstance()->getConnection();

$query = $db->prepare("
    SELECT * FROM eclipses 
    WHERE date >= CURDATE() 
    ORDER BY date ASC
");
$query->execute();
$eclipses = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/eclipse.css">
    <title>Eclipse</title>
</head>
<body>
    <section>
    <header>
        <h1>UPCOMING ECLIPSES</h1>
        <a href="search.php" class="backbtn">Back to Search</a>
    </header>

        <table>
            <tr>
                <th>Type</th>
                <th>Date</th>
                <th>Magnitude</th>
                <th>Duration</th>
                <th>Path Width (km)</th>
            </tr>
            <?php foreach ($eclipses as $eclipse): ?>
                <tr>
                    <td><?= htmlspecialchars($eclipse['type']) ?></td>
                    <td><?= date('d/m/Y', strtotime($eclipse['date'])) ?></td>
                    <td><?= htmlspecialchars($eclipse['magnitude']) ?></td>
                    <td><?= htmlspecialchars($eclipse['duration']) ?></td>
                    <td><?= htmlspecialchars($eclipse['path_width_km']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>