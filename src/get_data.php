<?php
try {
    require 'DBConnect.php';
    $table = $_GET['table'];
    $response = array();
    $prefixTable = 'TB_' . $table;

    if ($table === 'typeOfObject' || $table === 'city' || $table === 'street') {
        $stmt = $con->prepare("SELECT ID_$table, $table FROM $prefixTable");
        $stmt->execute();
    } else {
        die("Invalid request");
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
