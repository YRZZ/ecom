<?php

include '../model/user.php';

$dataItem=getAllItem($pdo); 
var_dump($_SERVER);

include '../view/home_view.php';