<?php
/**
 * Created by PhpStorm.
 * User: Cubero
 * Date: 05/04/2016
 * Time: 13:02
 */
session_start();
if(!isset($_SESSION['auth']))
    header('location: index.php');

if(isset($_POST['registrarse'])&&isset($_POST['user'])&&isset($_POST['password'])&&isset($_POST['password1'])&&$_POST['password']==$_POST['password1']){

    $_SESSION['registrados'][]=array('user'=>$_POST['user'],'password'=>$_POST['password']);
    $_SESSION['urlsSesion'][] = array('user'=>$_POST['user'],'enlaces'=>array());
    header('location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
<form action='registro.php' method="post">
    Nombre:<input type="text" name="user"><br>
    Password:<input type="password" name="password"><br>
    Confirm Password<input type="password" name="password1"><br>
    <input type="submit" name="registrarse" value="register"><br>
</form>

</body>
</html>
