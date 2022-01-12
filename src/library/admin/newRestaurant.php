<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../assets/js/admin.js" defer></script>
    <link rel="stylesheet" href="../../../assets/css/admin.css">
</head>
<body>
<?php require_once  "../html/header.html";
require_once "../../controllers/adminLogControl.php";
sessionCheck();
?>
<form class="employeeForm" action="../../controllers/addRestaurant.php" method="POST" id="formulary">
            <div class="formFlex">
                <div class="flexMember">
            <label for="ownerName">Nombre del dueño</label><br>
            <input type="text" id="ownerName" name="ownerName" value="" required>
            </div>
            <div class="flexMember">
            <label for="lastName">Apellido</label><br>
            <input type="text" id="lastName" name="lastName" value="" required>
            </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
            <label for="restaurantName">Nombre del restaurante</label><br>
            <input type="text" id="restaurantName" name="restaurantName" value="" required>
            </div>
            <div class="flexMember">
            <label for="adress">Direccion</label><br>
            <input type="text" id="adress" name="adress" value="" required>
            </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
            <label for="phoneNumber">Numero de telefono</label><br>
            <input type="text" id="phone" name="phone" value="" required>
            </div>
            <div class="flexMember">
            <label for="cardNumber">Tarjeta</label><br>
            <input type="text" id="cardNumber" name="cardNumber" value="" required>
            </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
            <label for="cvc">CVC</label><br>
            <input type="number" id="cvc" name="cvc" value="" required>
            </div>
            <div class="flexMember">
            <label for="expirationDate">Fecha de expiracion</label><br>
            <input type="date" id="expirationDate" name="expirationDate" value="" required>
            </div>
            </div>

            <div class="formFlex">
                <div class="flexMember">
                <label for="email">Correo electronico</label><br>
            <input type="email" id="email" name="email" value="" required>
            </div>
            <div class="flexMember">
            <label for="user">Usuario</label><br>
            <input type="text" id="user" name="user" value="" required>
            </div>
            </div>
            <div class="formFlex">
                <div class="flexMember">
                <label for="pass">contraseña</label><br>
            <input type="password" id="password" name="password" value="" required>
            </div>
            <div class="flexMember">
            <label for="notes">Observaciones</label><br>
<textarea id="notes" name="notes" rows="4" cols="20"></textarea>
            </div>
            </div>
            <div class="formFlex">
            <div class="flexButtons">
                <button type="submit"class="btn btn-primary" id="formSub">Enviar</button>
            <a href="dashboard.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>
            </div>
        </form>
</form>

</body>
</html>
