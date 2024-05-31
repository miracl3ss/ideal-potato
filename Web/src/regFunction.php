<?php
header('Content-type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        !empty($_POST['fullName']) && !empty($_POST['phoneNumber']) && !empty($_POST['emailID'])
        && !empty($_POST['userName']) && !empty($_POST['userPassword'])
    ) {
        $fullName = $_POST['fullName'];
        $phoneNumber = $_POST['phoneNumber'];
        $emailID = $_POST['emailID'];
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        try {
            require 'DBConnect.php';
            $SELECT__USER__SQL = "SELECT * FROM `users` WHERE users.email_id=:emailID;";
            $duplicate__user__statement = $con->prepare($SELECT__USER__SQL);
            $duplicate__user__statement->bindParam(':emailID', $emailID, PDO::PARAM_STR);
            $duplicate__user__statement->execute();
            $duplicate__user__flag = $duplicate__user__statement->rowCount();
            if ($duplicate__user__flag > 0) {
                http_response_code(404);
                $server__response__error = array(
                    "code" => http_response_code(404),
                    "status" => false,
                    "message" => "This user is already registered."
                );
                echo json_encode($server__response__error);
            } else {
                $password__hash = password_hash($userPassword, PASSWORD_DEFAULT);
                $data__parameters = [
                    "fullName" => $_POST['fullName'],
                    "phoneNumber" => $_POST['phoneNumber'],
                    "emailID" => $_POST['emailID'],
                    "userName" => $_POST['userName'],
                    "userPassword" => $password__hash
                ];
                $SQL__INSERT__QUERY = "INSERT INTO `users`(
                                                        `full_name`,
                                                        `phone_number`,
                                                        `email_id`,
                                                        `username`,
                                                        `password`
                                                    )
                                                    VALUES(
                                                        :fullName,
                                                        :phoneNumber,
                                                        :emailID,
                                                        :userName,
                                                        :userPassword
                                                    );";
                $insert__data__statement = $con->prepare($SQL__INSERT__QUERY);
                $insert__data__statement->execute($data__parameters);
                $insert__record__flag = $insert__data__statement->rowCount();
                if ($insert__record__flag > 0) {
                    $server__response__success = array(
                        "code" => http_response_code(200),
                        "status" => true,
                        "message" => "User successfully created."
                    );
                    echo json_encode($server__response__success);
                } else {
                    http_response_code(404);
                    $server__response__error = array(
                        "code" => http_response_code(404),
                        "status" => false,
                        "message" => "Failed to create user. Please try again."
                    );
                    echo json_encode($server__response__error);
                }
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
