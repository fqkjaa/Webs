<?php


$host = "localhost";
$meno = "kononov";
$psw = "Psw_2024";
$db = "kononov";

$mysqli = mysqli_connect($host,$meno,$psw);
if(mysqli_connect_errno() ) {
    echo "<p>Nepodarilo sa spojit s databazou  :( </p>";
    exit;
}

$databaza = mysqli_select_db($mysqli, $db );
if (!$databaza) {
    echo "<p>Nepodarilo sa vybrat databazu $db:( </p>";
    exit;
}

$mysqli->set_charset("utf8");

echo "<p>spojenie a vyber databazy uspesny</p>";
?>