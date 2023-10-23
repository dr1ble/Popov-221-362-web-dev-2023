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
    <title>Попов Н.С. 221-362 ЛР 3</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Автомир</h1>
        <nav>
            <ul>
                <a <?php echo 'selected-menu'; ?>  href="index.php"><?php echo 'Главная'; ?></a>
                <a <?php echo 'selected-menu'; ?>  href="contactform.php" class="highlighted"><?php echo 'Форма обратной связи'; ?></a>
                <a <?php echo 'selected-menu'; ?>  href="loginpage.php" ><?php echo 'Войти'; ?></a>
            </ul>
        </nav>
    </header>
    <div class="contact-container">
        <form class="contact-form" action="https://httpbin.org/post" method="POST">
            <h2>Обратная связь</h2>
            <label for="name"><h3>ФИО:</h3></label>
            <input type="text" id="name" name="name" required>

            <label for="email"><h3>Email:</h3></label>
            <input type="email" id="email" name="email" required>

            <label for="source"><h3>Откуда узнали о нас:</h3></label>
            <div class="button-source">
                <input type="radio" id="radio1" name="source" value="Интернет">
                <label for="radio1">Интернет</label>
                <input type="radio" id="radio2" name="source" value="Телевидение">
                <label for="radio2">Телевидение</label>
                <input type="radio" id="radio3" name="source" value="Друзья">
                <label for="radio3">Друзья</label>
            </div>
            <div class="type-discuss">
                <label for="type"><h3>Тип обращения:</h3></label>
                <select id="type" name="type">
                    <option value="Жалоба">Жалоба</option>
                    <option value="Предложение">Предложение</option>
                </select>


                <label for="message"><h3>Текст сообщения:</h3></label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <label for="file"><h3>Вложения (файл):</h3></label>
                <input type="file" id="file" name="file">
            </div>
            <label>
                <input type="checkbox" name="consent"> Даю согласие на обработку персональных данных
            </label>

            <button type="submit">Отправить</button>
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