<?php
require "db.php"; 


$sql = "CREATE TABLE IF NOT EXISTS films (
    film_id INT AUTO_INCREMENT PRIMARY KEY,        
    film_name VARCHAR(50) NOT NULL,               
    film_description VARCHAR(150) NOT NULL,        
    film_rating INT NOT NULL CHECK(film_rating BETWEEN 1 AND 5),
    film_poster VARCHAR(255) NOT NULL               
) ENGINE=MyISAM DEFAULT CHARSET=utf8";


if ($mysqli->query($sql) === TRUE) {
    echo "<p>Tabuľka 'films' bola úspešne vytvorená.</p>";
} else {
    echo "<p>Vytvorenie tabuľky 'films' zlyhalo: " . $mysqli->error . "</p>";
}
?>
