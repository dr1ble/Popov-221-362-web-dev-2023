<?php
$seconds = date('s');
$imageClass = ($seconds % 2 == 0) ? 'car.jpg' : 'car2.jpeg';
$pageTitle = 'Попов 221-362 Лаб3';

$specifications = array(
    array('Поколение', 'Год выпуска', 'Мощность'),
    array('1 (SA/FB)', '1978', '105 л.с.'),
    array('2 (FC)', '1985', '185 л.с.'),
    array('3 (FD)', '1992', '265 л.с. '),
);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Попов Н.С 221-362 ЛР 3</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Автомир</h1>
        <nav>
            <ul>
                <a <?php echo 'selected-menu'; ?>  href="index.php"><?php echo 'Главная'; ?></a>
                <a <?php echo 'selected-menu'; ?>  href="contactform.php"><?php echo 'Форма обратной связи'; ?></a>
                <a <?php echo 'selected-menu'; ?>  href="loginpage.php" class="highlighted"><?php echo 'Войти'; ?></a>
            </ul>
        </nav>
    </header>
    <div class="login-container">
        <form class="login-form" action="https://httpbin.org/post" method="POST">
            <h2>Вход</h2>
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>

            <label>
                <input type="checkbox" name="remember"> Запомнить меня
            </label>

            <button type="submit">Войти</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2023. Все права защищены.</p>
        <p>Адрес: г. Москва, ул. Пушкина, д. 10</p>
        <p>Телефон: +7 (999) 123-45-67</p>
        <?php
            date_default_timezone_set('Europe/Moscow');
            $currentDate = date('d.m.Y в H:i:s');
            echo 'Сформировано ' . $currentDate;
            ?>
    </footer>
</body>

</html>