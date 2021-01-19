<?php
include '../model/order.php';
$cartSum['SUM(quantity)']=''; 

if (isset($_SESSION['id'])){
$dataOrder = orderByIdClient($pdo, $_SESSION['id']);

    if ($dataOrder!==false){
        $cartSum=countItem($pdo, $dataOrder['id']);
        $cartSum['SUM(quantity)'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/main.css">
    <script type="text/javascript" src="../public/js/main.js"></script>
    <title>Welcome</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/item">Product</a></li>
                <li><a href="/login">Login / Sign in</a></li>
                
                
                
            
            </ul>
            <?php if (isset($_SESSION['id'])) :?>
        </nav>
            <ul>
                <li><a href="/account">Account</a></li>
                <li><a href="/cart">Cart</a> <span><?= $cartSum['SUM(quantity)']; ?></li></span>
                <li><a href="/logout">Logout</a></li>
            </ul>
        <nav>
            <?php endif ?>
            
        </nav>
    </header>