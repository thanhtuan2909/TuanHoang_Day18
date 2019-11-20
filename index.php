<?php
/**
 * Created by PhpStorm.
 * User: Thanh Tuấn
 * Date: 11/15/2019
 * Time: 4:48 PM
 */
session_start();
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'employee';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = ucfirst($controller);
$fileController = $controller . 'Controller.php';
$pathController = "controllers/$fileController";
if (!file_exists($pathController)){
    die('Trang không tồn tại');
}
require_once "$pathController";
$classController = $controller . "Controller";
$object = new $classController();
if (!method_exists($object, $action)){
    die("404 Error");
}
$object->$action();