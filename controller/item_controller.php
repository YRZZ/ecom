<?php

include '../model/user.php';

$dataItem=getAllItem($pdo); 

var_dump($_SERVER['QUERY_STRING']);
var_dump(htmlspecialchars($_GET['id']));

include '../view/item_view.php';