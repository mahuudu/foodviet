<?php
 session_start();
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}




require_once("controller/controller.php");
$controller = new Controller();
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    $controller->index();
}

//switch ($action) {
//    case 'login':
//        $controller->login();
//        break;
//    case 'doLogin':
//        $controller->doLogin();
//        break;
//    case'logout':
//        $controller->doLogOut();
//        break;
//    case 'register':
//        $controller->register();
//        break;
//    case'doRegister':
//        $controller->doRegister();
//        break;
//    case'acount':
//        $controller->detailAcount();
//        break;
//    case 'dochangepass':
//        $controller->doChangePass();
//        break;
//    default:
//        $controller->showProduct();
//        break;
//}

?>