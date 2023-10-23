<?php
include 'header.html';
?>
<?php
    if (isset($_GET['N'])) {$fio =$_GET['N'];} else {$fio='';}
    if (isset($_GET['E'])) {$email =$_GET['E'];} else {$email='';}
    if (isset($_GET['R'])) {$source =$_GET['R'];} else {$source='';}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $topic = $_POST['topic'];
    $file = $_POST['file'];
    $consent = isset($_POST['consent']) ? 'Да' : 'Нет';
    $source = $_POST['source'];
    

    // Перенаправление на страницу home.php для вывода ответа.
    header("Location: home.php?fio=$fio&message=$message&source=$source&file=$file");
    exit();
}
?>



<body>
    <form action="home.php" method="post">
        <label for="fio">ФИО:</label>
        <input type="text" id="fio" name="fio" value="<?=$fio ?>" required><br>

        <label for="email">Ваш е-майл:</label>
        <input type="email" id="email" name="email" value="<?=$email ?>" placeholder="example@example.com" required><br>

        <label for="message">Сообщение:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br>
        <label for="topic">Тема обращения:</label>
        <select id="topic" name="topic" required>
            <option value="Предложение">Предложение</option>
            <option value="Жалоба">Жалоба</option>
        </select><br>
        <div class="form-field margins">
            <label for="file">
            <h3>Вложения (файл):</h3>
            </label>
            <input type="file" id="file" name="file">
            </div>
        <br><label for="consent">Даю согласие на обработку данных:</label>
        <input type="checkbox" id="consent" name="consent"><br>

        <p><label>Как вы узнали о нас?</label></p>
        <div class="radio-group">
            <input type="radio" id="internet" name="source" value="Реклама из интернета" required <?php if ($source == 'Реклама из интернета') echo ' checked="checked"' ?>>
            <label for="internet">Реклама из интернета</label>

            <input type="radio" id="friends" name="source" value="Рассказали друзья" required <?php if ($source == 'Рассказали друзья') echo ' checked="checked"' ?>>
            <label for="friends">Рассказали друзья</label>
        </div><br>

        <input type="submit" value="Отправить">
    </form>
</body>