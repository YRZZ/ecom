<?php
include '../model/user.php';
// $post= $_POST;

// if (isset($_POST['password'])){
// $passwordHash = password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
// $_POST['password'] = $passwordHash;
// }

// $connected=false;
// $passwordHash = '$2y$10$USjE0V9IPIB5chbQr7XJLe0X5jdX2c8W5zOyV2h3rP8t3Xt2PbSie' ;
if (empty($_POST['email']) === false && empty($_POST['password']) === false && empty($_POST['lastname']) === false){
    if(isset($_POST['email'])){
        $_POST['firstname']= trim($_POST['firstname']);
        $_POST['lastname']= trim($_POST['lastname']);
        $_POST['email']= trim($_POST['email']);
        $_POST['phone']= trim($_POST['phone']);
        $_POST['password']= trim($_POST['password']);
        $passwordHash = password_hash(trim($_POST['password']),PASSWORD_BCRYPT);
$_POST['password'] = $passwordHash;

        var_dump(addUser($pdo, $_POST));
    }
}else{
    echo 'Renseignez les champs obligatoires ';
}
var_dump($_POST);
var_dump(getUserEmail ($pdo, 'forehead1@diigo.com'));




##################################################################
//code pour log-in

// if(isset($_POST['email'])){ //vérifie si le champ email est remplie
//     if(password_verify($_POST['password'], $passwordHash) && $_POST['email']=== 'mail@mail.fr'){ //vérifie si le password haché est correct et si il correspond a la bonne adresse email.
//         $connected = password_verify($_POST['password'], $passwordHash) ;
        
//         $my_logs = fopen('./logs/'.$_SESSION ['date'].'logs.txt', 'a+');
//         fputs($my_logs, $_SESSION['email'].' session connectée'.$_SERVER['REQUEST_URI'].$dateTime."\n");
        
//         $_SESSION['connected'] = $connected;
//         echo "Session connecté!".'<br>';
//     }else{
//         $_SESSION['connected'] = false;
//         echo "mot de passe invalide".'<br>';
//         $my_logs = fopen('./logs/'.$_SESSION ['date'].'logs.txt', 'a+');
//         fputs($my_logs,$_POST['email'].' a tenté de se connecter '.$_SERVER['REQUEST_URI'].$dateTime."\n");
//     }
// };

include '../view/register_view.php';
?>