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
    unset($fileArray[$key][0]);
    file_put_contents($fileAdress, json_encode($fileArray), JSON_PRETTY_PRINT);
//Sorts the array and creates a new page with the name of the array
$restaurant = $fileArray[$key]["restaurantName"];
mkdir("D:/xampp/htdocs/pideya/restaurants/$restaurant");
    createNewpage($restaurant);
}

function createNewPage($restaurant){
$filename = format($restaurant);
$content ="<!DOCTYPE html>
<html>

<head>
    <title><?php echo '$restaurant'?></title>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <link rel='stylesheet' href='../../../assets/css/adminLog.css'>
</head>

<body class='text-center'>
   <p>Hello, </p>
</body>

</html>
";
$handle = fopen("D:/xampp/htdocs/pideya/restaurants/$restaurant/$filename.php", "w");
$adress = "../../restaurants/$restaurant/$filename.php";
file_put_contents($adress, $content);
}

function format($array){
$resArray = explode(" ",$array);

$restaurant = "";
foreach ($resArray as $word){
    $restaurant .=$word."-";
}
return $restaurant;
}

function confirmationMessage(){
    echo "<p class ='alert alert-success d-flex justify-content-center'>!Restaurante agregado con exito!</p>";
}