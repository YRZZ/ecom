<?php

include '../model/user.php';

$dataItem=getAllItem($pdo); 

if (isset($_GET['id'])){
    $dataItem = getItemByCategory ($pdo, $_GET['id']);
    
}
include '../view/item_view.php';