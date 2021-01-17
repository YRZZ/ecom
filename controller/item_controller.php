<?php
include '../model/item.php';
$dataItem=getAllItem($pdo); 

if (isset($_SESSION['id'])){
    $dataOrder = orderByIdClient($pdo, $_SESSION['id']);
    if ($dataOrder!==false){
        $cartSum=countItem($pdo,    $dataOrder['id']);
    }
}

if (isset($_GET['id'])){
    $dataItem = getItemByCategory ($pdo, $_GET['id']);
}

if(empty($_POST)===false){
    if (isset($_SESSION['id'])){
        
        if ((orderByIdClient($pdo, $_SESSION['id'])) !== false){
        $post = $_POST;
        // $dataOrder = orderByIdClient($pdo, $_SESSION['id']);
        
        $scanOrder=scanOrderContent($pdo, $dataOrder, $post);
            
            if ($scanOrder !==false){
                if (($scanOrder['id_order'] === $dataOrder['id'] && $scanOrder['id_item']=== $_POST['id_item'])===true){
                    
                    $updatedQuantity= intval($scanOrder['quantity'] + intval($post['quantity']));
                    modifyItemQuantity($pdo, $updatedQuantity, $dataOrder['id'], $post['id_item']);
                    $_POST['quantity']=0;
                }
            }else{
                addToCart($pdo, $post, $dataOrder);
                
            }
        }else{
            openOrder($pdo, $_SESSION['id']);
            // $dataOrder = orderByIdClient($pdo, $_SESSION['id']);
            addToCart($pdo, $_POST, $dataOrder);
        }
    }else{ 
       header('Location: login');
       exit();
    }
    header('Location: item');
    exit();
}
// var_dump($dataOrder);

include '../view/item_view.php';