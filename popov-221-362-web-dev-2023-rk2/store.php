<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Магазин</title>
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

    <main> 
        <div class="wrapper" id="productContainer" onClick="showDetails(1)">
        <!-- Ваш контент здесь -->
        <!-- <div class="product" onclick="showDetails(1)">
            <img src="product1.jpg" alt="Продукт 1">
            <h3>Продукт 1</h3>
            <p>Цена: $50</p>
            <p>Краткое описание продукта 1</p>
        </div>

        <div class="product" onclick="showDetails(2)">
            <img src="product2.jpg" alt="Продукт 2">
            <h3>Продукт 2</h3>
            <p>Цена: $70</p>
            <p>Краткое описание продукта 2</p>
        </div>

        </div> -->
        <!-- Добавьте другие продукты здесь -->


        <div class="products">
                <?php
                // Подключение к базе данных
                include 'db.php';

                // Получение информации о товарах из базы данных
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                ?>

                <div class="product-container">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $productId = $row['id'];
                        $productName = $row['name'];
                        $productPrice = $row['price'];
                        $productDescription = $row['description'];
                        $productQuantity = $row['stock_quantity'];
                        $productPhotoPath = $row['photo_path']; // Новое поле для хранения пути к фотографии
                
                        ?>
                        <div class="product">
                            <h3><?php echo $productName; ?></h3>
                            <img src="<?php echo $productPhotoPath; ?>" alt="<?php echo $productName; ?>" width="200" height="200">
                            <p><?php echo $productDescription; ?></p>
                            <p>$<?php echo $productPrice; ?></p>
                            <p>Quantity: <?php echo $productQuantity; ?></p>
                            <button class="view-details-btn" onclick="showDetails(<?php echo $productId; ?>)">Подробнее</button>
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $productId; ?>)">Добавить в корзину</button>
                        </div>
                        <?php
                    }
                } else {
                    echo "Нет доступных товаров";
                }
                ?>
            </div>
            <a href="shopping_list.php">
            Перейти к списку покупок</a>

            <script>
                function showDetails(productId) {
                    window.location.href = 'product_details.php?id=' + productId;
                }
            </script>

    <div class="cart-container">
        <h2>Корзина</h2>
        <ul id="cart-list"></ul>
    </div>


<script>
    var cartItems = [];

    function addToCart(productId, productName, productPrice) {
        var newItem = {
            id: productId,
            name: productName,
            price: productPrice
        };

        var existingItem = cartItems.find(item => item.id === productId);

        if (!existingItem) {
            cartItems.push(newItem);

            updateCartDisplay();
        } else {
            alert('Товар уже добавлен в корзину.');
        }
    }

    function updateCartDisplay() {

        var cartList = document.getElementById('cart-list');

        cartList.innerHTML = '';

        cartItems.forEach(item => {
            var listItem = document.createElement('li');
            listItem.textContent = `${item.name} - $${item.price}`;
            cartList.appendChild(listItem);
        });
    }
</script>
        

    </main>

    <!-- <div class="product-details" id="productDetails">
        <div class="details-container">
            <span class="close-btn" onclick="closeDetails()">×</span>
            <img src="" alt="Увеличенное изображение">
            <h2 id="productName"></h2>
            <p id="productPrice"></p>
            <p id="productDescription"></p>
            <p id="productCharacteristics"></p>
            <p id="productAvailability"></p>
        </div>
    </div> -->

    <!-- <script>
        function showDetails(productId) {
            // Здесь можно добавить логику получения данных о продукте по его идентификатору
            // В данном примере, используем заглушки
            try {
            const response = await fetch(`get_products.php?id=${productId}`);
            const productDetails = await response.json();

            document.getElementById("productName").textContent = productDetails.name;
            document.getElementById("productPrice").textContent = `Цена: ${productDetails.price}`;
            document.getElementById("productDescription").textContent = productDetails.description;
            document.getElementById("productCharacteristics").textContent = productDetails.price
            document.getElementById("productAvailability").textContent = `В наличии: ${productDetails.stock_quantity} шт.`;

            const productDetailsContainer = document.getElementById("productDetails");
            productDetailsContainer.style.display = "flex";
        } catch (error) {
            console.error("Ошибка при получении данных о продукте:", error);
        }
        }

        function closeDetails() {
            const productDetailsContainer = document.getElementById("productDetails");
            productDetailsContainer.style.display = "none";
        }
    </script> -->

    <footer>
        <p>&copy; 2023. Все права защищены.</p>
        <p>Адрес Магазина: г. Москва, ул. Пушкина, д. 10</p>
        <p>Телефон: +7 (999) 123-45-67</p>
    </footer>
</body>

</html>