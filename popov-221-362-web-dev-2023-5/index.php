<?php
include "db.php";
include "index.html";
$result = mysqli_query($mysql, "SELECT * FROM termins");

$columnNames = array(
    'id' => '№',
    'termin' => 'Термин',
    'definition' => 'Определение'
);

echo "<table class='tablek'>";
echo "<tr>";
foreach ($columnNames as $columnName) {
    echo "<th>$columnName</th>";
}
echo "</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $colName => $colValue) {
        echo "<td>" . $colValue . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

echo "<h2 class='center'><p>Фотографии Mazda RX-7: </h2>";
// SQL-запрос для получения данных из таблицы dbimages
$sql = mysqli_query($mysql, "SELECT * FROM `images`");
 
// Вывод изображений на страницу
while ($image_name = mysqli_fetch_assoc($sql)) {
    ?>
    <div class='image-container'>
        <img title="<?php echo $image_name['image_name']; ?>" src="images/<?php echo $image_name['image_url']; ?>" />
    </div>
    <?php
}
 



?>
</div>
</main>
<footer>
    <p>&copy; 2023. Все права защищены.</p>
    <p>Адрес: г. Москва, ул. Пушкина, д. 10</p>
    <p>Телефон: +7 (999) 123-45-67</p>
</footer>

</body>

</html>