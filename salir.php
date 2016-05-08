<?php
/**
 * Created by PhpStorm.
 * User: Cubero
 * Date: 06/04/2016
 * Time: 9:48
 */

session_start();
$_SESSION['user']='invitado';
$_SESSION['auth']=false;
header('location: index.php');