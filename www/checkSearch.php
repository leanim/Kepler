<?php
require_once 'database.php'; 

class PlanetImporter {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function importPlanets() {
        try {
            $this->db->exec("TRUNCATE TABLE planets");

            $apiUrl = 'https://api.le-systeme-solaire.net/rest/bodies/?filter[]=isPlanet,eq,true';
            $data = file_get_contents($apiUrl);
            $planets = json_decode($data, true)['bodies'];

            $stmt = $this->db->prepare("
                INSERT INTO planets (
                    name, diameter_km, mass_kg, gravity, 
                    distance_from_sun_km, number_of_moons, mean_temperature_celsius
                ) VALUES (
                    :name, :diameter, :mass, :gravity, 
                    :distance, :moons, :temperature
                )
            ");

            foreach ($planets as $planet) {
                $diameter = $planet['equaRadius'] * 2; 
                $mass = $planet['mass']['massValue'] * pow(10, $planet['mass']['massExponent']);
                $distance = $planet['semimajorAxis'] * 149597870.7;
                $temperature = isset($planet['avgTemp']) ? $planet['avgTemp'] - 273.15 : null; 
                $moons = count($planet['moons'] ?? []);

                $stmt->execute([
                    ':name' => $planet['englishName'], 
                    ':diameter' => $diameter,
                    ':mass' => $mass,
                    ':gravity' => $planet['gravity'] ?? null,
                    ':distance' => $distance,
                    ':moons' => $moons,
                    ':temperature' => $temperature
                ]);
                
                echo "Planet imported : " . $planet['englishName'] . "<br>";
            }

            return "Import completed successfully!";
            
        } catch (PDOException $e) {
            return "Error during import : " . $e->getMessage();
        }
    }
}

$importer = new PlanetImporter();
$result = $importer->importPlanets();
echo $result;
?>