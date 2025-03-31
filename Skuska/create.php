<?php
require "db.php"; 

$sql = "CREATE TABLE IF NOT EXISTS plants (
    plant_id INT AUTO_INCREMENT PRIMARY KEY,        
    name VARCHAR(100) NOT NULL,               
    height TINYINT NOT NULL CHECK (height BETWEEN 1 AND 10) ,                
    type ENUM('izbova', 'vonkova') NOT NULL        
) ENGINE=MyISAM DEFAULT CHARSET=utf8";

if ($mysqli->query($sql) === TRUE) {
    echo "<p>Tabuľka 'plants' bola úspešne vytvorená.</p>";
} else {
    echo "<p>Vytvorenie tabuľky 'plants' zlyhalo: " . $mysqli->error . "</p>";
}
?>
