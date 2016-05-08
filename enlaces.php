<?php
/**
 * Created by PhpStorm.
 * User: Cubero
 * Date: 05/04/2016
 * Time: 13:24
 */
session_start();
if(!isset($_SESSION['auth']) && $_SESSION['auth']==false)
    header('location: index.php');
if(isset($_POST['enviar'])&&isset($_POST['nombre'])&&isset($_POST['enlace']))
    foreach($_SESSION['urlsSesion'] as $key =>$item){
        if($item['user']==$_SESSION['user']){
            $_SESSION['urlsSesion'][$key]['enlaces'][]=array('nombre'=>$_POST['nombre'],'enlaces'=>$_POST['enlace']);

        }
    }
if(isset($_POST['editar'])&&isset($_POST['nombre'])&&isset($_POST['enlace'])){
    foreach($_SESSION['urlsSesion'] as $key=> $item){
        if($item['user']==$_SESSION['user']){
            $_SESSION['urlsSesion'][$key]['enlaces'][$_GET['key2']]=array('nombre'=>$_POST['nombre'],'enlaces'=>$_POST['enlace']);
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enlaces</title>
</head>
<body>
<h3>Estas logueado como <?php echo $_SESSION['user'];?></h3>

<?php if(isset($_GET['key2'])&&isset($_GET['editar'])){
    echo'<h4>Editar enlace</h4>
            <form action="'.$_SERVER['PHP_SELF'].'?key2='.$_GET['key2'].'" method="post">

                Nombre:<input type="text" value="'.$_SESSION['urlsSesion'][$_GET['key1']]['enlaces'][$_GET['key2']]['nombre'].'" name="nombre">Enlace:<input type="text" value="'.$_SESSION['urlsSesion'][$_GET['key1']]['enlaces'][$_GET['key2']]['enlaces'].'"name="enlace"> <input type="submit" name="editar" value="editar"><br>
            </form>
        ';
}else{
    echo'<h4>Nuevo enlace</h4>
    <form action="'.$_SERVER['PHP_SELF'].'" method=\'post\'>
    Nombre:<input type="text" name="nombre">Enlace:<input type="text" name="enlace"> <input type="submit" name="enviar" value="enviar"><br>
</form>';
}
?>

<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Enlace</th>
        <th></th>
    </tr>
    <?php
    foreach($_SESSION['urlsSesion'] as $key1=> $enlaces){
        if($_SESSION['user'] == $enlaces['user']){
            foreach($enlaces['enlaces'] as $key2=>$enlace){
                echo '<tr>
                            <td>'.$key2.'</td>
                            <td>'.$enlace['nombre'].'</td>
                            <td>'.$enlace['enlaces'].'</td>
                            <td><a href="enlaces.php?key2='.$key2.'&&key1='.$key1.'&&editar=true">Editar</a></td>
                     </tr>';
            }
        }
    }
    ?>
</table>
<a href="salir.php">Salir</a>


</body>
</html>
