<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Магазин Автомир</h1>
    </header>

    <nav>
        <ul>
            <div class="logo-container">
                <img src="images/logo.png" alt="Логотип">
            </div>
            <li><a href='index.html'>Главная</a></li>
            <li><a href='store.php'>Магазин</a></li>
            <li><a href='loginpage.php'>Авторизация</a></li>
        </ul>
    </nav>


    <?php
    // Подключение к базе данных
    include 'db.php';

    // Обработка данных формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Пользователь найден";
            header("Location: store.php");
            exit;
        } else {
            // Ошибка: неправильное имя пользователя или пароль
            echo '<div style="text-align: center; margin-top: 50px;">Неверное имя пользователя или пароль</div>';
        }
    }
    ?>

    <div class="login-container">
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Вход</h2>
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" placeholder="user" required>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" placeholder="user" required>

            <label>
                <input type="checkbox" name="remember"> Запомнить меня
            </label>

            <button type="submit">Войти</button>
        </form>
    </div>
    <footer>
        <p>&copy; 2023. Все права защищены.</p>
        <p>Адрес Магазина: г. Москва, ул. Пушкина, д. 10</p>
        <p>Телефон: +7 (999) 123-45-67</p>

    </footer>
</body>

</html>