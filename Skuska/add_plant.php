<?php
require "db.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $plant_name = $_POST["name"] ?? '';
    $plant_height = $_POST["height"] ?? 0;
    $plant_type = $_POST["type"] ?? '';


    if (empty($plant_name) || empty($plant_height) || empty($plant_type)) {
        echo "<p>Všetky polia sú povinné. Skúste to znova.</p>";
        exit;
    }


    $sql = "INSERT INTO plants (name, height, type) VALUES ('$plant_name', $plant_height, '$plant_type')";


    if ($mysqli->query($sql) === TRUE) {
        echo "<p>Rastlina bola úspešne pridaná!</p>";
    } else {
        echo "<p>Chyba pre pridanie rastliny: " . $mysqli->error . "</p>";
    }
}
?>
