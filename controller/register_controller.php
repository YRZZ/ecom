<?php

include '../model/user.php';

// if(isset($_POST['firstname'])) {
//     var_dump($_POST);
//     var_dump(trim($_POST['firstname'])); //trim sert à ne pas prendre en compte les espaces (mais là ça marche pas)
//     if (trim($_POST['firstname']) === '') {
//         $firstname = false;
//     } else {
//         var_dump(addUser($pdo, $_POST));
//     }

// }

// var_dump(getAllUsers($pdo));

// var_dump(deleteUser($pdo, 59));




include '../view/signin_view.php';