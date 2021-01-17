<?php
include_once '../model/user.php';
// $_SESSION['connected'] = false;

// $passwordHash = '$2y$10$USjE0V9IPIB5chbQr7XJLe0X5jdX2c8W5zOyV2h3rP8t3Xt2PbSie';

if (isset($_POST['email'])) {
    $_SESSION['date'] = date('d/m/Y');
    $_SESSION['time'] = date('H:i');
    $dateTime = '['.$_SESSION['date'].'|'.$_SESSION['time'].']';
    // $_SESSION['email'] = getEmailPassword($pdo, $_POST['email'])['email'];

    // $verifiedEmail = getEmailPassword($pdo, $_POST['email'])['email'];
    // var_dump($verifiedEmail);
    // $passwordHash = getEmailPassword($pdo, $_POST['email'])['password'];
    // var_dump($passwordHash);
    // $firstname = getEmailPassword($pdo, $_POST['email'])['first_name'];
    // var_dump($firstname);

    $dataSession= getEmailPassword($pdo, $_POST['email']);
    var_dump ($dataSession);
        if($dataSession!== false){
        $_SESSION['email'] = $dataSession['email'];
        $verifiedEmail = $dataSession['email'];
        $passwordHash = $dataSession['password'];
        $firstname = $dataSession['first_name'];

        if (password_verify($_POST['password'], $passwordHash) && $_POST['email'] === $verifiedEmail) {
            $_SESSION['connected'] = true;
            $clientInfos = getClient($pdo, $_SESSION['email']);
            $_SESSION['id'] = $clientInfos['id'];
            $_SESSION['first_name'] = $clientInfos['first_name'];
            $_SESSION['last_name'] = $clientInfos['last_name'];
            $_SESSION['phone'] = $clientInfos['phone'];
            
            echo "<p>Session connecté</p>";
            echo "<p>Bonjour " . $firstname . '</p>';
            

            // $my_logs = fopen('../logs/' . $_SESSION['date'] . 'logs.txt', 'a+');
            // fputs($my_logs, $_SESSION['email'] . ' session connectée' . $_SERVER['REQUEST_URI'] . $dateTime . "\n");
            header('Location: item');
            exit();
        } else {
            $_SESSION['connected'] = false;
            echo "mot de passe invalide" . '<br>';
            // $my_logs = fopen('../logs/' . $_SESSION['date'] . 'logs.txt', 'a+');
            // fputs($my_logs, $_POST['email'] . ' a tenté de se connecter ' . $_SERVER['REQUEST_URI'] . $dateTime . "\n");
        }
    }else{
        $_SESSION['connected'] = false;
        echo "Email inconnu" . '<br>';
    }
}
if (isset($_SESSION['connected'])&& $_SESSION['connected']=== true){
    header("Location: account");
}

var_dump($_SESSION);

// if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
//     header("Location: /profil");
// }

// var_dump(getEmailPassword($pdo,'forehead1@diigo.com'));
// getUser($pdo, 2);
include '../view/login_view.php';
include '../controller/register_controller.php';