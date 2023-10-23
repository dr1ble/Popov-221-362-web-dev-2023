<?php
$seconds = date('s');
$imageClass = ($seconds % 2 == 0) ? 'car.jpg' : 'car2.jpeg';
$imageClass1 = ($seconds % 2 == 0) ? 'car3.jpg' : 'car4.jpg';
$pageTitle = 'Попов 221-362 Лаб3';

$specifications = array(
    array('Поколение', 'Год выпуска', 'Мощность'),
    array('1 (SA/FB)', '1978', '105 л.с.'),
    array('2 (FC)', '1985', '185 л.с.'),
    array('3 (FD)', '1992', '265 л.с. '),
);

$speclist = array(
    'Двигатель: Роторный Wankel',
    'Максимальная мощность: До 276 лошадиных сил',
    'Привод: Задний',
    'Трансмиссия: 5-ступенчатая механическая или 4-ступенчатая автоматическая',
    'Максимальная скорость: Более 250 км/ч (для FD)',
);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta char  set="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Автомир</h1>
        <nav>
            <ul>
                <a href = "<?php $name = "index.php"; echo $name; ?>"class="highlighted"><?php echo 'Главная'; ?></a>
                <a href = "<?php $name = "contactform.php"; echo $name; ?>"<?php echo 'Форма обратной связи'; ?>></a>
                <a href = "<?php $name = "loginpage.php"; echo $name;?>"<?php echo 'Войти'; ?>></a>
            </ul>
        </nav>
    </header>

    <main>
        <div>
            <img src=<?php echo $imageClass; ?> alt="car" width="800px" height="500px">
            <img src=<?php echo $imageClass1; ?> alt="car2" width="800px" height="500px">
        </div>
        <div>
            <h2>Mazda RX-7</h2>
            <p>Mazda RX-7 -
                Спортивный автомобиль, выпускавшийся японским автопроизводителем Mazda с 1978 по 2002 год.
                Оригинальная RX-7 оснащалась двухсекционным роторно-поршневым двигателем и имела переднюю
                среднемоторную, заднеприводную компоновку. RX-7 пришла на смену RX-3 (обе в Японии продавались под
                маркой Savanna), вытеснила все остальные роторные автомобили Mazda за исключением Cosmo.
                За всю историю Mazda RX-7 было три поколения. Первое поколение выпускалось с 1978 по 1985 год. Второе
                поколение — с 1985 по 1991. Третье поколение — с 1992 по 2002 год.</p>
            <table>
                <?php foreach ($specifications as $option) :?>
                    <tr>
                        <?php foreach ($option as $cell) :?>
                            <td><?php echo $cell; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
                <!-- <thead>
                    <tr>
                        <th>Поколение</th>
                        <th>Год выпуска</th>
                        <th>Мощность</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1 (SA/FB)</td>
                        <td>1978</td>
                        <td>105 л.с. </td>
                    </tr>
                    <tr>
                        <td>2 (FC)</td>
                        <td>1985</td>
                        <td>185 л.с. </td>
                    </tr>
                    <tr>
                        <td>3 (FD)</td>
                        <td>1992</td>
                        <td>265 л.с. </td>
                    </tr>
                </tbody>
            </table> -->
            <h2>Основные характеристики:</h2>
            <ul>
                <?php foreach ($speclist as $spec) : ?>
                        <li><?php echo $spec; ?></li>
                <?php endforeach; ?>
            </ul>

            <h2>Популярность и наследие</h2>
            <p>Mazda RX-7 остается одним из самых иконичных и культовых спортивных автомобилей. Его комбинация стиля, мощности и уникального роторного двигателя делают его популярным среди автолюбителей и коллекционеров по всему миру.</p>

            <p>Не смотря на то, что производство RX-7 было прекращено, многие энтузиасты поддерживают и восстанавливают эти автомобили, а Mazda продолжает использовать их технологии в своих последующих моделях.</p>

        </div>
    </main>
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