<?php
require_once "./databaseManager.php";

if(isset($_POST)){
    $restaurant = $_POST;
    unset($_POST);
addRestaurant($restaurant);
header("Location:../library/admin/panel.php?addedRestaurant");
}
