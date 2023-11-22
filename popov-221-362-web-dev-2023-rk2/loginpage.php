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
            <li><a href='index.html' >Главная</a></li>
            <li><a href ='store.php'>Магазин</a></li>
            <li><a href ='loginpage.php'>Авторизация</a></li>
        </ul>
    </nav>
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
    
    </footer>
</body>

</html>