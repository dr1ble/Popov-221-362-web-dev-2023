<?php
include 'db.php';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Запрос на получение информации о выбранном продукте
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = $row['name'];
        $productPrice = $row['price'];
        $productDescription = $row['description'];
        $productQuantity = $row['stock_quantity'];
        $productPhotoPath = $row['photo_path']; // Новое поле для хранения пути к фотографии

        ?>
        <!DOCTYPE html>
        <html lang="ru">
        
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="styles.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $productName; ?></title>
        </head>
        
        <body>
            <div class="details-container">
                <h1><?php echo $productName; ?></h1>
                <img src="<?php echo $productPhotoPath; ?>" alt="<?php echo $productName; ?>" width="400" height="400">
                <p>Цена: $<?php echo $productPrice; ?></p>
                <p>Описание: <?php echo $productDescription; ?></p>
                <p>Количество в наличии: <?php echo $productQuantity; ?></p>
            </div>
        </body>
        
        </html>
        <?php
    } else {
        echo "Продукт не найден";
    }
} else {
    echo "Некорректный запрос";
}
?>