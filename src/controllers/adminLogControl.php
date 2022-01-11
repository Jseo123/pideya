<?php
function logIn()
{
    $userObject = file_get_contents("../library/database/adminUsers.json");
    $json = json_decode($userObject, true);
    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];
    foreach ($json as $object) {
        if ($object["name"] === $user or $object["email"] === $user) {
            $check = password_verify($pass, $object["password"]);
            if ($check === true) {
                session_start();
                $_SESSION["user"] = $user;
            } else {
            }
        }
    }
}

