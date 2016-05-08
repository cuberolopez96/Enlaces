<?php
/**
 * Created by PhpStorm.
 * User: Cubero
 * Date: 30/03/2016
 * Time: 10:11
 */
session_start();
if(!isset($_SESSION['user'])){
    $_SESSION['user']='invitado';}
if(!isset($_SESSION['auth'])){
    $_SESSION['auth']=false;}
if(!isset($_SESSION['registrados'])){
    $_SESSION['registrados']= array();
}
if(!isset($_SESSION['urlsSesion'])){
    $_SESSION['urlsSesion']=array();
}

print_r($_SESSION);
if(isset($_POST['login'])&&isset($_POST['user'])&&(isset($_POST['password']))){
    foreach($_SESSION['registrados'] as $usuario){
        if($usuario['user']==$_POST['user']&&$usuario['password']==$_POST['password']){
            $_SESSION['user']=$usuario['user'];
            $_SESSION[ 'auth']=true;
            header('location: enlaces.php');
        }
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action=<?php echo $_SERVER['PHP_SELF']; ?> method='post'>
    Nombre:<input type="text" name="user"><br>
    Contraseña:<input type="password" name="password"><br>
    <input type="submit" name="login" value="Login"><br>
</form>
<a href="registro.php">Registrarse</a>

</body>
</html>
