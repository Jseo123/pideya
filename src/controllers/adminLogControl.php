<?php
function logIn()
{
    $userObject = file_get_contents("../library/database/adminUsers.json");
    $json = json_decode($userObject, true);
    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];

    $userCheck = userCheck($user, $json);
    if ($userCheck !== null){
        passCheck($userCheck, $pass);
        print_r($userCheck);
    } else {
        header("Location: ../library/admin/admin.php?failedLog");
    }



    //foreach ($json as $object) {
    //if ($object["name"] === $user or $object["email"] === $user) {
    // $check = password_verify($pass, $object["password"]);
    //if ($check === true) {
    //session_start();
    //$_SESSION["user"] = $user;
    //header("Location: ../library/admin/panel.php");
    //} else {
    // header("Location: ../library/admin/admin.php?failedLog");
    //}
    //} else if ($user === null){
    //header("Location: ../library/admin/admin.php?failedLog");
    //}
    //}
}

function userCheck($user, $json)
{
foreach ($json as $object){

    $check = in_array($user, $object);
    if ($check === true){
        return $object;
    }
}
}

function passCheck($userArray, $pass){
$arrayPass = $userArray["password"];
$passCheck = password_verify($pass, $arrayPass);
if ($passCheck === true){
    header("Location: ../library/admin/panel.php");
} else {
    header("Location: ../library/admin/admin.php?failedLog");
}

}

function failedLog()
{
    echo "<p class='alert alert-danger'>Usuario o contraseña incorrecta<p>";
}
