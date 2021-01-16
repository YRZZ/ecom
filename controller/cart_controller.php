<?php
include '../model/user.php';
$cartEmpty='';
if (var_dump(orderByIdClient($pdo, $_SESSION['id'])) === false){
    $cartEmpty='<h1>Votre panier est vide</h1>';
}else{
    $cartEmpty='<h1>Votre panier contient </h1>';
    $cart = getContentOrder($pdo, $_SESSION['id']);
}
$i=1;
$total= 0;
// var_dump($_POST);
// var_dump($cart);

include '../view/cart_view.php';
?>