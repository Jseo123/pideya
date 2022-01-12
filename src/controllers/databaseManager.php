<?php
//adds id to the object returned by the form and adds the new object to JSON file.
function addRestaurant(array $restaurant)
{
    $fileAdress = "../library/database/restaurantList.json";
    $fileArray = json_decode(file_get_contents($fileAdress));
    $id = count($fileArray) + 1;
    $key = $id - 1;
    array_push($fileArray, $restaurant);
    array_push($fileArray[$key], $id);
    $fileArray[$key]["id"] = $fileArray[$key][0];
    $pass = $fileArray[$key]["password"];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
    $fileArray[$key]["password"] = $hashedPass;
    echo $fileArray[$key]["password"];
    unset($fileArray[$key][0]);
    file_put_contents($fileAdress, json_encode($fileArray), JSON_PRETTY_PRINT);
}

function confirmationMessage(){
    echo "<p class ='alert alert-success d-flex justify-content-center'>!Restaurante agregado con exito!</p>";
}