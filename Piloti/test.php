<?php
session_start();

// Initialize score if not set
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
    $_SESSION['current_question'] = 0;
}

// Questions array
$questions = [
    [
        'question' => 'Aká je maximálna výška letu pre súkromných pilotov bez špeciálneho povolenia?',
        'options' => ['3000 metrov', '5000 metrov', '8000 metrov', '10000 metrov'],
        'correct' => 0
    ],
    [
        'question' => 'Čo sa rozumie pod pojmom „flight echelon“?',
        'options' => [
            'Rýchlosť letu',
            'Výška letu vzhľadom na hladinu mora pri štandardnom tlaku',
            'Smer letu',
            'Čas letu'
        ],
        'correct' => 1
    ],
    [
        'question' => 'Aký je minimálny vek na získanie licencie súkromného pilota?',
        'options' => ['16 rokov', '17 rokov', '18 rokov', '21 rokov'],
        'correct' => 2
    ]
];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {
    $selected_answer = (int)$_POST['answer'];
    $current = $_SESSION['current_question'];
    
    if ($selected_answer === $questions[$current]['correct']) {
        $_SESSION['score']++;
    }
    
    $_SESSION['current_question']++;
    
    // Check if test is complete
    if ($_SESSION['current_question'] >= count($questions)) {
        $_SESSION['test_complete'] = true;
    }
}

// Reset test
if (isset($_POST['reset'])) {
    $_SESSION['score'] = 0;
    $_SESSION['current_question'] = 0;
    unset($_SESSION['test_complete']);
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testovanie</title>
    <link rel="stylesheet" href="stylee.css">
</head>
<body class = "test_body">
<div class="navigation">
            <ul class="nav_ul">
                <li class="nav_item">
                     <a class="nav_item_a" href="index.html">
                         <img src="images/logo.jpg" alt="Logotyp Webovej stranky" class="logo"> Hlavná stránka
                     </a>
                </li>
                <li class="nav_item">
                    <a class="nav_item_a" href="pilot_1.html">
                        Ivan Kozhedub
                    </a>
                </li>
                <li class="nav_item">
                    <a class="nav_item_a" href="pilot_2.html">
                        Richard Bong
                    </a>
                </li>
                <li class="nav_item">
                    <a class="nav_item_a" href="pilot_3.html">
                        Alan Cobham
                    </a>
                </li>
                <li class="nav_item">
                    <a class="nav_item_a" href="test.php">
                        Vykonajte test
                    </a>
                </li>
                <li class="nav_item">
                    <a class="nav_item_a" href="semestralne prace/index.html">
                        Domáce úlohy
                    </a>
                </li>
            </ul>
        </div>
    <h1 class = "test_h1">Testovanie pre pilotov</h1>
    
    <?php if (isset($_SESSION['test_complete'])): ?>
        <div class="result">
            <h2>Test sa skončil!</h2>
            <p>Váš výsledok: <?php echo $_SESSION['score']; ?> из <?php echo count($questions); ?></p>
            <p>
                <?php
                $percentage = ($_SESSION['score'] / count($questions)) * 100;
                if ($percentage >= 75) {
                    echo "To je skvelé! Dobre poznáte základy.";
                } elseif ($percentage >= 50) {
                    echo "Nie je to zlé, ale treba na tom ešte popracovať.";
                } else {
                    echo "Odporúčame materiál zopakovať a vyskúšať ho znova.";
                }
                ?>
            </p>
            <form method="POST">
                <button type="submit" name="reset" class="submit-btn">Начать заново</button>
            </form>
        </div>
    <?php else: ?>
        <div class="question-container">
            <h3>Otázka <?php echo $_SESSION['current_question'] + 1; ?> из <?php echo count($questions); ?></h3>
            <p><?php echo $questions[$_SESSION['current_question']]['question']; ?></p>
            
            <form method="POST">
                <div class="options">
                    <?php foreach ($questions[$_SESSION['current_question']]['options'] as $index => $option): ?>
                        <label class="option">
                            <input type="radio" name="answer" value="<?php echo $index; ?>" required>
                            <?php echo $option; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="submit-btn">Odpoveď</button>
            </form>
        </div>
    <?php endif; ?>
</body>
</html>