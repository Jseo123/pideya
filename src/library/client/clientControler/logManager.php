<?php
function logIn()
{
    $userObject = file_get_contents("./../../database/restaurantList.json");
    $json = json_decode($userObject, true);
    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];
print_r(($json));
    $userCheck = userCheck($user, $json);
    if ($userCheck !== null) {
        passCheck($userCheck, $pass);
    } else {
        header("Location: ../client.php?failedLog");
    }
}

function userCheck($user, $json)
{
    foreach ($json as $object) {

        $check = in_array($user, $object);
        if ($check === true) {
            return $object;
        }
    }
}

function passCheck($userArray, $pass)
{
    $arrayPass = $userArray["password"];
    $passCheck = password_verify($pass, $arrayPass);
    if ($passCheck === true) {
        session_start();
        $restaurantName = $userArray["restaurantName"];
        $_SESSION[$restaurantName] = $userArray["restaurantName"];
redirect($userArray, $restaurantName);
    } else {
        header("Location: ../client.php?failedLog");
    }
}

function redirect($userArray, $restaurant){
$folder = $_SESSION[$restaurant];
$page = format($folder);
header ("Location: ../../../../restaurants/$folder/$page.php");
}

function format($array){
    $resArray = explode(" ",$array);
    
    $restaurant = "";
    foreach ($resArray as $word){
        $restaurant .=$word."-";
    }
    return $restaurant;
    }

    
function failedLog()
{
    echo "<p class='alert alert-danger'>Usuario o contraseña incorrecta<p>";
}