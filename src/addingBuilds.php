<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        true
    ) {
        $typeOfObject_B = $_POST['typeOfObject'];
        $City = $_POST['city'];
        $Street = $_POST['street'];
        $buildingNum = $_POST['buildingNum'];
        $apartmentNum = $_POST['apartmentNum'];
        $space = $_POST['space'];
        $descriptions = $_POST['descriptions'];
        $rent = $_POST['rent'];
        $buildingImg = $_POST['buildingImg'];
        $image = $_POST['image'];
        if (!empty($_POST['ID_object'])) {
            $ID_object = $_POST['ID_object'];
        } else {
            $ID_object = date(dmyh);
        }
        try {
            require 'DBConnect.php';
                $data__parameters = [
                    "ID_object" => $ID_object,
                    "typeOfObject_B" => $_POST['typeOfObject'],
                    "City" => $_POST['city'],
                    "Street" => $_POST['street'],
                    "buildingNum" => $_POST['buildingNum'],
                    "apartmentNum" => $_POST['apartmentNum'],
                    "space" => $_POST['space'],
                    "descriptions" => $_POST['descriptions'],
                    "rent" => $_POST['rent'],
                    "buildingImg" => ('../images/' . $_POST['buildingImg']),
                ];
                $SQL__INSERT__QUERY = "INSERT INTO `TB_building`(
                                                        `ID_object`,
                                                        `typeOfObject`,
                                                        `City`,
                                                        `Street`,
                                                        `buildingNum`,
                                                        `apartmentNum`,
                                                        `space`,
                                                        `descriptions`,
                                                        `rent`,
                                                        `buildingImg`
                                                    )
                                                    VALUES(
                                                        :ID_object,
                                                        :typeOfObject_B,
                                                        :City,
                                                        :Street,
                                                        :buildingNum,
                                                        :apartmentNum,
                                                        :space,
                                                        :descriptions,
                                                        :rent,
                                                        :buildingImg
                                                    );";
                $insert__data__statement = $con->prepare($SQL__INSERT__QUERY);
                $insert__data__statement->execute($data__parameters);
                $insert__record__flag = $insert__data__statement->rowCount();
                if ($insert__record__flag > 0) {
                    $server__response__success = array(
                        "code" => http_response_code(200),
                        "status" => true,
                        "message" => "building successfully created."
                    );
                    echo json_encode($server__response__success);
                } else {
                    http_response_code(404);
                    $server__response__error = array(
                        "code" => http_response_code(404),
                        "status" => false,
                        "message" => "Failed to create building. Please try again."
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
