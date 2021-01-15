<?php
// Database connection : $pdo
include_once '../pdo_connection.php';

include '../layout/header.php';

// Manage query strings
$slug =  explode('?', $_SERVER['REQUEST_URI'])[0];

// Router
switch ($slug) {
    // url
    case '/':
        // php file (controller)
        include '../controller/home_controller.php';
        break;
    case '/signin':
        include '../controller/signin_controller.php';
        break;
    case '/login':
        include '../controller/login_controller.php';
        break;
    default:
        include "../controller/404_controller.php";
        break;
}

include '../layout/footer.php';

?>

