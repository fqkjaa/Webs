<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<div class="navs">
            <a class="nav_elem" href="index.html">
                <i>🏢</i> Uvod pro letiska
            </a>
            <a class="nav_elem" href="letisko_1.html">
                <i>✈</i> Letisko Changi
            </a>
            <a class="nav_elem" href="letisko_2.html">
                <i>✈</i> Letisko Hamad
            </a>
            <a class="nav_elem" href="letisko_3.html">
                <i>✈</i> Letisko Dubaj
            </a>
            <a class="nav_elem" href="letisko_4.html">
                <i>✈</i> Letisko Inčchon
            </a>
            <a class="nav_elem" href="registracia.php">
                <i>📋</i> Registracia
            </a>
            <a class="nav_elem" href="Ivan/index.html">
                <i>🏠</i> Moja Stranka
            </a>
        </div>

    <main class="main">
        <!-- Подзаголовок -->
        <h1>Registracia</h1>
        <!-- Проверка если метод пост то считывание заполненых полей и вложение их значений в переменную -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = htmlspecialchars($_POST['first_name']);
            $lastName = htmlspecialchars($_POST['last_name']);
            $airport = htmlspecialchars($_POST['airport']);

            // проверка если необходимые поля заполнены то вывод сообщения об успешной регистрации в противном случае сообщение об ошибке
            if (!empty($firstName) && !empty($lastName) && !empty($airport)) {
                echo "<p class='success_message'>Registrácia bola úspešne dokončená! Ďakujeme, $firstName $lastName, vybrali ste letisko: $airport.</p>";
            } else {
                echo "<p class='error_message'>Vyplňte všetky polia.</p>";
            }
        }
        ?>

        <!-- Формуляр для заполнения required - обязательные поля for - указывает для какого поля   -->
        <form method="POST" action="registracia.php" class="registration_form">
            <label for="first_name">Meno:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Priezvisko:</label>
            <input type="text" id="last_name" name="last_name" required>
            <!-- выпадающий список для выбора аэропорта -->
            <label for="airport">Vyberte letisko:</label>
            <select id="airport" name="airport" required>
                <option value="" disabled selected>Vyberte...</option>
                <option value="Changi (Singapur)">Changi (Singapur)</option>
                <option value="Hamad (Katar)">Hamad (Katar)</option>
                <option value="Dubaj (SAE)">Dubaj (SAE)</option>
                <option value="Inčchon (Južná Kórea)">Inčchon (Južná Kórea)</option>
            </select>

            <button type="submit">Potvrdiť</button>
        </form>
    </main>
