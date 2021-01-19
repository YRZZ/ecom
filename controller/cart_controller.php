<?php
include '../model/item.php';

$cart = (getContentOrder($pdo, $_SESSION['id']));

$cartEmpty='';

if($_SESSION['connected']===true){
    
    // $itemId = getContentOrder($pdo, $_SESSION['id']);

    if(orderByIdClient($pdo, $_SESSION['id']) === false){
        $cartEmpty='<h2>Votre panier est vide</h2>';
    }elseif(empty($cart)!==false){
        $cartEmpty='<h2>Votre panier est vide</h2>';
    }else{
        $cartEmpty='<h2>Votre panier contient</h2>';
        $cart = (getContentOrder($pdo, $_SESSION['id']));
    }
}
$i=1;
$total= 0;
// var_dump($_SESSION);
// var_dump($_POST);
// var_dump($dataOrder );
// var_dump($itemId);
// var_dump($cart);

if(empty($_POST)=== false){
    $dataOrder = getOpenOrderByIdClient($pdo, $_SESSION['id']);
    foreach($cart as $value){
        // var_dump($value['id_item']);
        foreach($_POST as $key =>$id){
            modifyItemQuantity($pdo, $id , $dataOrder['id'] , $key);
        }
    }
    header("Location: cart");
    exit();
}

if(isset($_GET["remove_item"])){
   removeItem($pdo, $_GET["remove_item"]);
    echo"coucou";
    header("Location: /cart ");
    exit();
}
// var_dump($_GET);

// var_dump($_SERVER);


foreach($cart as $key=>$value){
    $i++;
}
        
       


include '../view/cart_view.php';
?>