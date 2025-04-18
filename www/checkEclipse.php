<?php
require_once 'Database.php';

$db = Database::getInstance()->getConnection();

$csvFile = 'eclipse.csv';
if (($handle = fopen($csvFile, "r")) === FALSE) {
    die("Failed to open the CSV file");
}

$headers = fgetcsv($handle, 1000, ",");

while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $row = array_combine($headers, $data);
    $year = (int)$row['year'];

    if ($year < 2025 || $year > 2125) continue;

    switch ($row['eclipse_type']) {
        case 'T': $type = 'Total'; break;
        case 'P': $type = 'Partial'; break;
        case 'A': $type = 'Annular'; break;
        case 'H': $type = 'Hybrid'; break;
        default:  $type = $row['eclipse_type'];
    }

    $date = "$year-{$row['month']}-{$row['day']}";

    $duration = '00:00:00';
    if (preg_match('/(\d+)m(\d+)s/', $row['central_duration'], $m)) {
        $duration = "00:".str_pad($m[1], 2, '0', STR_PAD_LEFT).":".str_pad($m[2], 2, '0', STR_PAD_LEFT);
    }

    $stmt = $db->prepare("
        INSERT INTO eclipses 
        (date, type, magnitude, duration, path_width_km)
        VALUES (?, ?, ?, ?, ?)
    ");
    
    $stmt->execute([
        $date,
        $type,
        $row['magnitude'],
        $duration,
        round($row['path_width'])
    ]);
    
    echo "Imported: $date ($type)<br>";
}

fclose($handle);
echo "Import completed successfully!";
?>