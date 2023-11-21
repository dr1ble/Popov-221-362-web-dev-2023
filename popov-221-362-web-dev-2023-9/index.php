<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №9 - 6</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="text-center py-5">
                <h2 class="name">Циклические алгоритмы. Условия в алгоритмах. Табулирование функций</h2>
                <h1>Попов Никита Сергеевич 221-362</h1>
                <h3>Лабораторная работа №9 - 6</h3>
                <h4><img src="polytech_logo_main_RGB.png" alt="логотип" class="logo"></h4>
            </div>
        </div>
    </header>

    <main class="main">
        <form method="post" action="">
            <br>
            <label class="label" for="startArgument">Начальный аргумент:</label>
            <input type="number" name="startArgument" id="startArgument" required>
            <br><br>
            <label for="numValues">Количество значений функции:</label>
            <input type="number" name="numValues" id="numValues" required>
            <br><br>
            <label for="step">Шаг:</label>
            <input type="number" name="step" id="step" required>
            <br><br>
            <label for="layoutType">Тип верстки:</label>
            <select name="layoutType" id="layoutType">
                <option value="A">Тип A</option>
                <option value="B">Тип B</option>
                <option value="C">Тип C</option>
                <option value="D">Тип D</option>
                <option value="E">Тип E</option>
            </select>
            <br><br>
            <button type="submit" class="btn">Рассчитать</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Получаем значения из формы и присваиваем их переменным
            $startArgument = (int) $_POST["startArgument"];
            $numValues = (int) $_POST["numValues"];
            $step = (int) $_POST["step"];
            $layoutType = $_POST["layoutType"];

            // Вывод типа верстки в подвале
            echo "<br><footer><p>Тип верстки: $layoutType</p></footer>";

            $values = []; // Перемещение объявления и инициализации массива $values
        
            // Вычисление значений функции и их вывод в соответствии с выбранным типом верстки
            for ($i = 0; $i < $numValues; $i++) {
                $k = $i + 1;
                $argument = $startArgument + ($i * $step);

                if ($layoutType == 'A' || $layoutType == 'B' || $layoutType == 'C' || $layoutType == 'D') {
                    if ($argument == 20) {
                        $value = 'Ошибка';
                    } else {
                        if ($argument <= 10) {
                            $value = round(pow($argument, 2) * 0.33 + 4, 2);
                        } elseif ($argument > 10 && $argument < 20) {
                            $value = round(18 * $argument - 3, 2);
                        } else {
                            $value = round(1 / ($argument * 0.1 - 2), 2);
                        }
                    }
                    $values[] = $value;

                    if ($layoutType == 'A') {
                        echo "f($argument) = $value<br><br>";
                    } elseif ($layoutType == 'B') {
                        echo "<ul><li>f($argument) = $value</li></ul>";
                    } elseif ($layoutType == 'C') {
                        echo "<ol start='$k'><li>f($argument) = $value</li></ol>";
                    } elseif ($layoutType == 'D') {
                        echo "<table border='1' cellspacing='0' cellpadding='10'>
                            <tr>
                                <td>Шаг</td>
                                <td>Аргумент функции</td>
                                <td>Значение функции</td>
                            </tr>
                            <tr>
                                <td>$i</td>
                                <td>$argument</td>
                                <td>$value</td>
                            </tr>
                        </table>";
                    }
                } elseif ($layoutType == 'E') {
                    if ($argument == 20) {
                        $value = 'Ошибка';
                    } else {
                        if ($argument <= 10) {
                            $value = round(pow($argument, 2) * 0.33 + 4, 2);
                        } elseif ($argument > 10 && $argument < 20) {
                            $value = round(18 * $argument - 3, 2);
                        } else {
                            $value = round(1 / ($argument * 0.1 - 2), 2);
                        }
                    }
                    $values[] = $value;

                    echo "<div style='border: 2px solid red; padding: 8px; display: inline-block; margin-right: 8px; margin-bottom: 2%'>f($argument) = $value</div>";
                }
            }


            // Вычисление и вывод максимального, минимального, среднего арифметического и суммы значений функции
            $max = round(max($values), 2);
            $min = round(min($values), 2);
            $average = round(array_sum($values) / count($values), 2);
            $sum = round(array_sum($values), 2);

            echo "<br>Максимальное значение: $max<br><br>";
            echo "Минимальное значение: $min<br><br>";
            echo "Среднее арифметическое: $average<br><br>";
            echo "Сумма значений: $sum<br>";
        }
        ?>
    </main>

    <footer class="footer">
        <div class="container">
            <?php
            echo "<footer><p>Тип верстки: $layoutType</p></footer>";
            ?>
            &copy; 2023 Циклические алгоритмы. Условия в алгоритмах. Табулирование функций
        </div>
    </footer>

</body>

</html>