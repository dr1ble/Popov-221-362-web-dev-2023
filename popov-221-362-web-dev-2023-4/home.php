<?php
include 'header.html';
?>

<body>
    <?php
    if (isset($_POST['fio'])) {
        $fio = $_POST['fio'];
        $file = $_POST['file'];
        $message = $_POST['message'];
        $topic = $_POST['topic'];
        if (isset($_POST['source'])) {
            $source = $_POST['source'];
        } else {
            $source = '';
        }
    }

    echo "<h1>Ответ на ваше обращение:</h1>";
    echo "<p><h2>ФИО:</h2> <span>$fio</span></p>";
    echo "<p><h2>Текст обращения:</h2> <span>$message</span></p>";
    echo "<p><h2>Источник:</h2> <span>$source</span></p></h2>";
    echo "<p><h2>Вы прикрепили файл:</h2><span>$file</span></p></h2>";

    echo '<br><a class="button" href="index.php?N=' . $_POST['fio'] . '&E=' . $_POST['email'] . '&R='.$source. '">Заполнить снова</a></p></br>';
    ?>
</body>

</html> 