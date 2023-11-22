<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №9</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="text-center py-5">
                <h1 class="name">Циклические алгоритмы. Условия в алгоритмах. Табулирование функций</h1>
                <h2>Попов Никита Сергеевич 221-362</h2>
                <h3>Лабораторная работа 9</h3>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <form method="post" action="" class="contact-form">
                <div class="form-group">
                    <label class="form-label" for="start">Начальный аргумент:</label>
                    <input type="number" name="start" id="start" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")
                        echo $_POST['start'] ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="encouning">Количество значений функции:</label>
                        <input type="number" name="encouning" id="encouning" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")
                        echo $_POST['encouning'] ?>" required>
                    </div>
                
                    <br>
                    <div class="form-group">
                        <label class="form-label" for="step">Шаг:</label>
                        <input type="number" name="step" id="step" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")
                        echo $_POST['step'] ?>" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="form-label" for="min_value">Минимальное значение:</label>
                        <input type="number" name="min_value" id="min_value" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")
                        echo $_POST['min_value'] ?>" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="form-label" for="max_value">Максимальное значение:</label>
                        <input type="number" name="max_value" id="max_value" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST")
                        echo $_POST['max_value'] ?>" required>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="form-label" for="type">Тип верстки:</label>
                        <select name="type" id="type" class="form-field">
                            <option value="A">Тип A</option>
                            <option value="B">Тип B</option>
                            <option value="C">Тип C</option>
                            <option value="D">Тип D</option>
                            <option value="E">Тип E</option>
                        </select>
                    </div>

                    <input type="submit" class="btn" value="Рассчитать">
                </form>
            </div>
            <br>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php
            $min_value = (int) $_POST['min_value'];
            $max_value = (int) $_POST['max_value'];

            $start = (int) $_POST['start'];
            $encouning = (int) $_POST['encouning'];  // кол-во вычисляемых значений
            $step = (int) $_POST['step'];
            $type = $_POST['type']; //тип верстки
        
            $all = [];

            switch ($type) {
                case 'A':
                    break;
                case 'B':
                    echo '<ul>';
                    break;
                case 'C':
                    echo '<ol>';
                    break;
                case 'D':
                    echo '<table class="table_block">';
                    break;
                case 'E':
                    echo '<div class="block">';
                    break;
            }
            ?>
            <?php

            //Цикл со счетчиком
            function algFixedIteration()
            {
                global $min_value;
                global $max_value;
                global $start;
                global $encouning;
                global $step;
                global $type;
                global $all;

                $arr = [];
                $arr = $all;
                $x = $start;
                $f = 0;

                for ($i = 0; $i < $encouning; $i++, $x += $step) {
                    $f = getValue($x);

                    if (($f >= $max_value || $f < $min_value) && $f != 'error') {
                        break;
                    }

                    if ($f != 'error') {
                        array_push($arr, $f);
                    }

                    addTag($type, $x, $f, $i);

                }
                echo '<div class="box">';
                echo 'SUM: ' . array_sum($arr) . '<br>';
                echo 'MIN: ' . min($arr) . '<br>';
                echo 'MAX: ' . max($arr) . '<br>';
                echo 'AVG: ' . round(array_sum($arr) / count($arr), 3) . '<br></div>';
            }

            //Цикл с предусловием
            function algPrecondition()
            {
                global $min_value;
                global $max_value;
                global $start;
                global $encouning;
                global $step;
                global $type;
                global $all;

                $arr = [];
                $arr = $all;

                $x = $start;

                $i = 0;
                $f = 0;

                while ($i < $encouning && ($f < $max_value && $f >= $min_value)) {
                    $f = getValue($x);

                    if ($f != 'error') {
                        array_push($arr, $f);
                    }

                    addTag($type, $x, $f, $i);

                    if ($f == 'error') {
                        $f = $min_value;
                    }
                    $i++;
                    $x += $step;
                }

                echo '<div class="box">';
                echo 'SUM: ' . array_sum($arr) . '<br>';
                echo 'MIN: ' . min($arr) . '<br>';
                echo 'MAX: ' . max($arr) . '<br>';
                echo 'AVG: ' . round(array_sum($arr) / count($arr), 3) . '<br></div>';
            }

            //Цикл с постусловием
            function algPostcondition()
            {
                global $min_value;
                global $max_value;
                global $start;
                global $encouning;
                global $step;
                global $type;

                global $all;

                $arr = [];
                $arr = $all;

                $x = $start;

                $i = 0;

                do {
                    $f = getValue($x);
                    if ($f != 'error') {
                        array_push($arr, $f);
                    }
                    addTag($type, $x, $f, $i);

                    if ($f == 'error') {
                        $f = $min_value;
                    }


                    $i++;
                    $x += $step;
                }
                while ($i < $encouning && ($f < $max_value && $f >= $min_value));
                echo '<div class="box">';
                echo 'SUM: ' . array_sum($arr) . '<br>';
                echo 'MIN: ' . min($arr) . '<br>';
                echo 'MAX: ' . max($arr) . '<br>';
                echo 'AVG: ' . round(array_sum($arr) / count($arr), 3) . '<br></div>';


            }

            //Функция для вывода
            function addTag($type, $x, $f, $i)
            {
                switch ($type) {
                    case 'A':
                        echo 'f(' . $x . ')=' . $f;
                        echo '<br>';
                        break;
                    case 'B':
                        echo '<li>f(' . $x . ')=' . $f . '</li>';
                        break;
                    case 'C':
                        echo '<li>f(' . $x . ')=' . $f . '</li>';
                        break;
                    case 'D':
                        $i += 1;
                        echo '<tr><td>' . $i . '</td><td>f(' . $x . ')</td><td>' . $f . '</td></tr>';
                        $i -= 1;
                        break;
                    case 'E':
                        
                        echo '<div class="block_item">f(' . $x . ')=' . $f . '</div>';
                        break;
                }
            }

            //Функция для вычисления значения f
            function getValue($x)
            {
                if ($x <= 10) {
                    $f = round((3 * $x + 9), 2);
                } 
                else if ($x > 10 && $x < 20){
                    if ($x == 11){
                        $f = 'error';
                    }
                    else 
                    $f = round((($x + 3)/(pow($x, 2) - 121)), 2);
                }
                else if ($x >= 20){
                     $f = round((pow($x, 2) * 4), 2);
    
                }
            

                return $f;
            }

            algFixedIteration();
        
            switch ($type) {
                case 'A':
                    break;
                case 'B':
                    echo '</ul>';
                    break;
                case 'C':
                    echo '</ol>';
                    break;
                case 'D':
                    echo '</table>';
                    break;
                case 'E':
                    echo '</div>';
                    break;
            }
            ?>
        <?php } ?>
    </main>
    <footer class="footer">
        <div class="container">
            <?php
            echo "<footer><p>Тип верстки: " . ($type ?? "") . "</p></footer>";
            ?>
            &copy; 2023 Циклические алгоритмы. Условия в алгоритмах. Табулирование функций
        </div>
    </footer>

</body>

</html>