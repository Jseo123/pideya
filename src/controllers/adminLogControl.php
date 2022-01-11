<?php
function logIn()
{
    $userObject = file_get_contents("../library/database/adminUsers.json");
    $json = json_decode($userObject, true);
    $user = $_POST["login-name"];
    $pass = $_POST["login-pass"];

    $userCheck = userCheck($user, $json);
    if ($userCheck !== null) {
        passCheck($userCheck, $pass);
    } else {
        header("Location: ../library/admin/admin.php?failedLog");
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
        $_SESSION["admin"] = $userArray["name"];
        header("Location: ../library/admin/panel.php");
    } else {
        header("Location: ../library/admin/admin.php?failedLog");
    }
}

function failedLog()
{
    echo "<p class='alert alert-danger'>Usuario o contraseña incorrecta<p>";
}

function logOut(){
    session_start();

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    header("Location: ../library/admin/admin.php");


}

function sessionCheck(){
    session_start();
    if (!isset($_SESSION["admin"])){
        header("Location: ../admin/admin.php?denied");
    }
}

function denied(){
    echo "<p class='alert alert-danger'>Acesso denegado. Inicie sesion por favor.<p>";
}