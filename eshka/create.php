<?php
require "db.php"; 

$sql = "CREATE TABLE IF NOT EXISTS roads (
    road_id INT AUTO_INCREMENT PRIMARY KEY,        
    road_name VARCHAR(100) NOT NULL,               
    road_length INT NOT NULL,
    road_time INT NOT NULL,                    
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

if ($mysqli->query($sql) === TRUE) {
    echo "<p>Tabuľka 'roads' bola úspešne vytvorená.</p>";
} else {
    echo "<p>Vytvorenie tabuľky 'roads' zlyhalo: " . $mysqli->error . "</p>";
}
?>
