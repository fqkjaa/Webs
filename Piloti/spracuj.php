<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $age = htmlspecialchars(trim($_POST['age']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $city = htmlspecialchars(trim($_POST['city']));
    $message = htmlspecialchars(trim($_POST['message']));
    $date = htmlspecialchars(trim($_POST['date']));

    // Валидация (Пример)
    if (empty($name) || empty($email) || empty($phone)) {
        echo "Пожалуйста, заполните все обязательные поля.";
        exit;
    }

    // Вывод данных для проверки
    echo "<h2>Данные, которые вы отправили:</h2>";
    echo "<p><strong>Имя:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Телефон:</strong> $phone</p>";
    echo "<p><strong>Возраст:</strong> $age</p>";
    echo "<p><strong>Пол:</strong> $gender</p>";
    echo "<p><strong>Город:</strong> $city</p>";
    echo "<p><strong>Сообщение:</strong> $message</p>";
    echo "<p><strong>Дата:</strong> $date</p>";
} else {
    echo "Ошибка: данные не отправлены!";
}
?>
