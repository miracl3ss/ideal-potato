<?php
require 'DBConnect.php';

try {
    $sql = "SELECT * FROM TB_building LEFT JOIN TB_city as TB_c ON TB_building.City=TB_c.ID_city LEFT JOIN TB_street as TB_s ON TB_building.Street=TB_s.ID_street LEFT JOIN TB_typeOfObject as TB_tOB ON TB_building.typeOfObject_B=TB_tOB.ID_typeOfObject WHERE 1=1";

    if (!empty($_POST['category'])) {
        $categories = implode(",", $_POST['category']);
        $sql .= " AND typeOfObject_B IN (" . implode(",", $_POST['category']) . ")";
    }
    
    $stmt = $con->query($sql);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        foreach ($results as $row) {
            echo "<section>" . "Артикул объекта: " . $row["ID_object"] .  ", Тип: " . $row["typeOfObject"] . "<br>" ." Описание: " . $row["description"] . "<br>" . " Город: " .$row["City_name"] . ", Улица: " . $row["Street"] . ", Номер дома: " .$row["buildingNum"] . ", Номер квартиры: " . $row["apartmentNum"] . "<br>" . " Площадь: " . $row["space"] . "<br>" . "<img src='" .$row["buildingImg"]."'>"  . "</section>";
        }
    } else {
        echo $sql;
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$con = null;