<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['idRemove'])
    ) {
        $idRemove = $_POST['idRemove'];
        try {
            require 'DBConnect.php';
                $data__parameters = [
                    "ID_object" => $_POST['idRemove']
                ];
                $SQL__DROP__QUERY = " DELETE FROM `TB_contract` WHERE `IDobject` = :ID_object;
                DELETE FROM `TB_building` WHERE `ID_object` = :ID_object;";
                $insert__data__statement = $con->prepare($SQL__DROP__QUERY);
                $insert__data__statement->execute($data__parameters);
                $insert__record__flag = $insert__data__statement->rowCount();
                if ($insert__record__flag > 0) {
                    $server__response__success = array(
                        "code" => http_response_code(200),
                        "status" => true,
                        "message" => "Success"
                    );
                    echo json_encode($server__response__success);
                } else {
                    http_response_code(404);
                    $server__response__error = array(
                        "code" => http_response_code(404),
                        "status" => false,
                        "message" => "Failed to delete. Please try again."
                    );
                    echo json_encode($server__response__error);
                }
            } catch (Exception $ex) {
            http_response_code(404);
            $server__response__error = array(
                "code" => http_response_code(404),
                "status" => false,
                "message" => "Opps!! Something Went Wrong! " . $ex->getMessage()
            );
            echo json_encode($server__response__error);
        }
    } else {
        http_response_code(404);
        $server__response__error = array(
            "code" => http_response_code(404),
            "status" => false,
            "message" => "Invalid API parameters!"
        );
        echo json_encode($server__response__error);
    } 
} else {
    http_response_code(404);
    $server__response__error = array(
        "code" => http_response_code(404),
        "status" => false,
        "message" => "Bad Request"
    );
    echo json_encode($server__response__error);
}