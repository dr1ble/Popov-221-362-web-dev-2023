<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №10</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="text-center py-5">
                <h1 class="name">Основы работы со строковыми данными в РНР. Кодировка. Анализ текста</h1>
                <h2>Попов Никита Сергеевич 221-362</h2>
                <h3>Лабораторная работа №10</h3>
            </div>
        </div>
    </header>

    <main class="main">
        <?php
        if (isset($_POST['data']) && $_POST['data']) {
            // Если значение 'data' было отправлено через POST запрос и не является пустым
        
            // Выводим текст "Исходный текст:" с отправленным значением 'data'
        
            echo '<br><b>Исходный текст:</b><div class="src_text"><br>' . nl2br($_POST['data']) . '</div><br>';

            // Открываем разметку таблицы с классом "table"
            echo '<table class="table">';

            // Вызываем функцию test_it() с аргументом 'data', преобразованным в кодировку CP1251
            test_it(iconv("utf-8", "cp1251", $_POST['data']));
            // Вызываем функцию test_symbs() с аргументом 'data', преобразованным в кодировку CP1251
            $arr_symbs = test_symbs(iconv("utf-8", "cp1251", $_POST['data']));

            // Выводим текст "Символы в исходном тексте:" и открываем разметку таблицы для символов
            echo '<b>Символы в исходном тексте</b><table class="table">';
            foreach ($arr_symbs as $key => $value) {
                // Выводит каждый символ и его количество в таблице
                echo '<tr><td>' . iconv("cp1251", "utf-8", $key) . '</td><td>' . $value . '</td></tr>';
            }
            echo "</table><br>";
        } else {
            // Если значение 'data' не было отправлено или является пустым
            echo '<div><b><p>Нет текста для анализа</b></div><br><br><br><br><br><br><br><br><br><br>';
        }

        function test_it($text)
        {
            // Выводит количество символов в тексте
            echo '<tr><td>Количество символов </td><td>' . strlen($text) . '</td></tr>';

            // Определяет массив с цифрами
            $cifra = array(
                '0' => true,
                '1' => true,
                '2' => true,
                '3' => true,
                '4' => true,
                '5' => true,
                '6' => true,
                '7' => true,
                '8' => true,
                '9' => true
            );

            // Определяет массив со знаками препинания
            $punctuation = array(',' => true, '.' => true, '-' => true, '!' => true, '?' => true, "'" => true);

            // Инициализация переменных
            $cifra_amount = 0; // Количество цифр в тексте
            $punctuation_count = 0; // Количество знаков препинания в тексте
            $word_amount = 0; // Количество слов в тексте
            $letter_count = 0; // Количество букв в тексте
            $upperCase_count = 0; // Количество заглавных букв в тексте
            $lowerCase_count = 0; // Количество строчных букв в тексте
            $word = ''; // Текущее слово
            $words = array(); // Список всех слов
        
            // Перебирать все символы в тексте
            for ($i = 0; $i < strlen($text); $i++) {
                // Если символ является цифрой, увеличиваем счетчик цифр
                if (isset($cifra[$text[$i]]))
                    $cifra_amount++;
                // Если символ является знаком препинания, увеличиваем счетчик знаков
                else if (isset($punctuation[$text[$i]]))
                    $punctuation_count++;
                // Если символ не является пробелом, увеличиваем счетчик букв
                else if ($text[$i] != ' ') {
                    $letter_count++;
                    // Если символ является строчной буквой, увеличиваем счетчик строчных букв
                    if (iconv("cp1251", "utf-8", $text[$i]) == mb_strtolower(iconv("cp1251", "utf-8", $text[$i]))) {
                        $lowerCase_count++;
                    }
                    // Если символ является заглавной буквой, увеличиваем счетчик заглавных букв
                    else {
                        $upperCase_count++;
                    }
                }

                // Если символ является пробелом, знаком препинания или текст закончился
                if ($text[$i] == ' ' || $text[$i] == ',' || $text[$i] == '.' || $text[$i] == '!' || $text[$i] == '?' || $i == strlen($text) - 1) {
                    // Если символ не является пробелом или знаком препинания, добавляем его к текущему слову
                    if ($text[$i] != ' ' && $text[$i] != ',' && $text[$i] != '.' && $text[$i] != '!' && $text[$i] != '?')
                        $word .= $text[$i];

                    // Если есть текущее слово
                    if ($word) {
                        // Если текущее слово уже сохранено в массиве, увеличиваем его количество повторений
                        if (isset($words[$word]))
                            $words[$word]++;
                        // Иначе, добавляем текущее слово в массив со значением 1, так как это первое повторение слова
                        else
                            $words[$word] = 1;
                    }

                    $word = ''; // Сбрасываем текущее слово
                } else {
                    // Если слово продолжается, добавляем текущий символ к текущему слову
                    $word .= $text[$i];
                }
            }

            // Выводит количество цифр, знаков препинания, букв, заглавных и строчных букв, а также количество слов в тексте
            echo '<tr><td>Количество цифр </td><td>' . $cifra_amount . '</td></tr>';
            echo '<tr><td>Количество знаков препинания </td><td>' . $punctuation_count . '</td></tr>';
            echo '<tr><td>Количество букв </td><td>' . $letter_count . '</td></tr>';
            echo '<tr><td>Количество заглавных букв </td><td>' . $upperCase_count . '</td></tr>';
            echo '<tr><td>Количество строчных букв </td><td>' . $lowerCase_count . '</td></tr>';
            echo '<tr><td>Количество слов </td><td>' . count($words) . '</td></tr></table><br>';

            echo '</table><br>';

            // Cортировка списка слов по ключу
            ksort($words);

            // Выводит слова и их количество в таблице
            echo '<b>Слова в исходном тексте</b><table class="table">';
            foreach ($words as $key => $value) {
                echo '<tr><td>' . iconv("cp1251", "utf-8", $key) . '</td><td>' . $value . '</td></tr>';
            }
            echo '</table><br>';
        }

        function test_symbs($text)
        {
            $symbs = array();

            $l_text = mb_strtolower(iconv("cp1251", "utf-8", $text)); // Преобразование текста в нижний регистр и CP1251 кодировку
        
            $l_text = iconv("utf-8", "cp1251", $l_text); // Преобразование текста обратно в CP1251 кодировку
        
            for ($i = 0; $i < strlen($l_text); $i++) {
                // Подсчет количества вхождений каждого символа
                if (isset($symbs[$l_text[$i]])) // Если символ уже существует в массиве
                    $symbs[$l_text[$i]]++; // Увеличение счетчика символа
                else
                    $symbs[$l_text[$i]] = 1; // Инициализация счетчика символа с 1 - символ встретился впервые
            }

            return $symbs; // Возвращаем ассоциативный массив символов и их количества
        }
        ?>

        <a class="btn" href="index.html">Другой анализ</a>
    </main>

    <footer class="footer">
        <div class="container">
            &copy; 2023 Основы работы со строковыми данными в РНР. Кодировка. Анализ текста
        </div>
    </footer>


</body>

</html>