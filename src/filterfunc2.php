<?php
// Подключение к базе данных с использованием PDO
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Установка режима ошибок PDO на исключения
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Подготовка SQL запроса
    $sql = "SELECT * FROM items WHERE 1=1";

    // Добавление фильтров, если они были отправлены из формы
    $params = [];
    if (!empty($_POST['category'])) {
        $categories = implode("','", $_POST['category']);
        $sql .= " AND category IN ('" . implode("','", $_POST['category']) . "')";
    }
    if (!empty($_POST['minPrice'])) {
        $minPrice = $_POST['minPrice'];
        $sql .= " AND price >= :minPrice";
        $params['minPrice'] = $minPrice;
    }
    if (!empty($_POST['maxPrice'])) {
        $maxPrice = $_POST['maxPrice'];
        $sql .= " AND price <= :maxPrice";
        $params['maxPrice'] = $maxPrice;
    }

    // Подготовка и выполнение запроса с использованием подготовленного выражения
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    // Вывод результатов
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        foreach ($results as $row) {
            echo "Name: " . $row["name"]. " - Category: " . $row["category"]. " - Price: " . $row["price"]. "<br>";
        }
    } else {
        echo "0 results";
    }
} catch(PDOException $e) {
    // Вывод ошибки, если что-то пошло не так
    echo "Connection failed: " . $e->getMessage();
}

// Закрытие подключения
$conn = null;
?>