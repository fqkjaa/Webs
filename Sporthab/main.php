<?php
$subscribe_message = ''; 
$message_type = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subscribe_message = "Prihlásili ste sa na odber noviniek!";
        $message_type = "success";
    } else {
        $subscribe_message = "Zadajte prosím platný e-mail!";
        $message_type = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Hab</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.innerText = message;
            document.body.appendChild(notification);
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }
    </script>
</head>
<body>
    <?php if ($subscribe_message): ?>
    <script>
        showNotification("<?php echo $subscribe_message; ?>", "<?php echo $message_type; ?>");
    </script>
<?php endif; ?>
    <header>
            <div class="menu">
                <a href="#">≡</a>
                <a href="#">Sport Hab</a>
                <a href="#">🛒</a>
            </div>
    </header>
    
    <main>
        <section class="hero">
            <div class="section_1">
            <h3>Najlepšie značkové výrobky. 
                Veľký sortiment.
                Spolupráca s výrobcom. </h3>
            <img src="images/header_img.png">
        </div>
            <button>Uskutočniť objednávku</button>
        </section>
        
        <section class="catalog">
            <h2>Novinky</h2>
            <div class="products">
                <div class="product">
                    <img src="images/product_1.png" alt="Гантелі">
                    <p>Spoločnosť Gantelli</p>
                    <p>11.45 Euro</p>
                </div>
                <div class="product">
                    <img src="images/product_2.png" alt="М'яч баскетбольний">
                    <p>Basketbalový m'yach</p>
                    <p>17.17 Euro</p>
                </div>
                <div class="product">
                    <img src="images/product_3.png" alt="М'яч баскетбольний">
                    <p>Tenisová súprava</p>
                    <p>21.73 Euro</p>
                </div>
                <div class="product">
                    <img src="images/product_4.png" alt="М'яч баскетбольний">
                    <p>Tenisky ADIDAS SGZ8594/p>
                    <p>38.90 Euro</p>
                </div>
                <div class="product">
                    <img src="images/product_5.png" alt="М'яч баскетбольний">
                    <p>Športové oblečenie NIKE</p>
                    <p>44.63 Euro</p>
                </div>
                <div class="product">
                    <img src="images/product_6.png" alt="М'яч баскетбольний">
                    <p>Športový set PUMA</p>
                    <p>45.80 Euro</p>
                </div>
            </div>
        </section>
        
        <section class="discounts">
            <h3>O zľavách</h3>
            <form method="post" action="">
                <input type="email" name="email" placeholder="E-mail" required>
                <p>📧</p>
                <button type="submit">Odoslať</button>
            </form>
        </section>
        <section class="info">
            <div class="info_part_1">
                <h3>Spolupráca so známymi značkami:</h3>
                <img class="brand_image" src="images/brand_img.png">
                <img class="brand_image" src="images/brand_img_2.png">
                <img class="brand_image" src="images/brand_img_3.png">
            </div>
            <div class="info_part_2">
                <h3 class="ip2_h3">Viac ako 50000 objednávok</h3>
                <h3 class="ip2_h3">8000 recenzií</h3>
                <h3 class="ip2_h3">13 000 zamestnancov</h3>
                <h3 class="ip2_h3">8 rokov práce</h3>
            </div>
        </section>
    </main>
    
    <footer>
        <div class="footer_section1">
            <img src="images/logo.png">
        </div>
        <div class="footer_section2">
            <ul class="foot_nav">
                <li class="foot_nav_item">Domov</li>
                <li class="foot_nav_item">Informácie o nás</li>
                <li class="foot_nav_item">Katalóg</li>
                <li class="foot_nav_item">Kontakt</li>
                <li class="foot_nav_item">Dodávka</li>
                <li class="foot_nav_item">Obchod</li>
            </ul>
        </div>
        <div class="footer_section3">
            <h3 class="foot_sec3_h3">Objednať si hovor</h3>
            <h3 class="foot_sec3_h3">+38 (050) 546 5425</h3>
            <h3 class="foot_sec3_h3">sporthabcompany@gmail.com</h3>
        </div>
    </footer>
</body>
</html>
