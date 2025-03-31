<?php
require "db.php"; 


$sql_all = "SELECT * FROM plants ORDER BY height ASC";
$result_all = $mysqli->query($sql_all);


$sql_min = "SELECT * FROM plants ORDER BY height ASC LIMIT 1";
$result_min = $mysqli->query($sql_min);
$min_plant = $result_min->fetch_assoc();


$sql_max = "SELECT * FROM plants ORDER BY height DESC LIMIT 1";
$result_max = $mysqli->query($sql_max);
$max_plant = $result_max->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zoznam Rastlín</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="pages_navigation">
        <a class="pages_navigation_element active" href="formular.html" data-details="Pridajte novu rastlinu"> Pridat Rastlinu
        </a>
        <a class="pages_navigation_element" href="show_plants.php" data-details="Pozrejte vsecy rastliny"> Pozriet vsetky rastliny
        </a>
    </div>
    <h2>Zoznam Rastlín</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Názov Rastliny</th>
                <th>Výška</th>
                <th>Typ Rastliny</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_all->num_rows > 0) {
                while ($row = $result_all->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['plant_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['height']}</td>
                            <td>{$row['type']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Žiadne rastliny v databáze.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <h2>Najvyššia Rastlina</h2>
    <?php if ($max_plant): ?>
        <p><strong>Názov:</strong> <?= htmlspecialchars($max_plant['name']); ?>, 
           <strong>Výška:</strong> <?= $max_plant['height']; ?>, 
           <strong>Typ:</strong> <?= $max_plant['type']; ?></p>
    <?php else: ?>
        <p>Žiadne dáta o najvyššej rastline.</p>
    <?php endif; ?>


    <h2>Najnižšia Rastlina</h2>
    <?php if ($min_plant): ?>
        <p><strong>Názov:</strong> <?= htmlspecialchars($min_plant['name']); ?>, 
           <strong>Výška:</strong> <?= $min_plant['height']; ?>, 
           <strong>Typ:</strong> <?= $min_plant['type']; ?></p>
    <?php else: ?>
        <p>Žiadne dáta o najnižšej rastline.</p>
    <?php endif; ?>
</body>
</html>
