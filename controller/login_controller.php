<?php

include '../view/login_view.php';
include '../model/user.php';


$_SESSION['connected'] = false;

// $passwordHash = '$2y$10$USjE0V9IPIB5chbQr7XJLe0X5jdX2c8W5zOyV2h3rP8t3Xt2PbSie';

if (isset($_POST['email'])) {
    $_SESSION['date'] = date('d/m/Y');
    $_SESSION['time'] = date('H:i');
    $_SESSION['email'] = getEmailPassword($pdo, $_POST['email'])['email'];
    $dateTime = '['.$_SESSION['date'].'|'.$_SESSION['time'].']';
    
    $verifiedEmail = getEmailPassword($pdo, $_POST['email'])['email'];
    var_dump($verifiedEmail);
    $passwordHash = getEmailPassword($pdo, $_POST['email'])['password'];
    var_dump($passwordHash);
    $firstname = getEmailPassword($pdo, $_POST['email'])['first_name'];
    var_dump($firstname);
    if (password_verify($_POST['password'], $passwordHash) && $_POST['email'] === $verifiedEmail) {


        $_SESSION['connected'] = true;
        echo "<p>Session connecté</p>";
        echo "<p>Bonjour " . $firstname . '</p>';
        // header("Location: /profil");

        $my_logs = fopen('../logs/' . $_SESSION['date'] . 'logs.txt', 'a+');
        fputs($my_logs, $_SESSION['email'] . ' session connectée' . $_SERVER['REQUEST_URI'] . $dateTime . "\n");

    } else {
        $_SESSION['connected'] = false;
        echo "mot de passe invalide" . '<br>';
        $my_logs = fopen('../logs/' . $_SESSION['date'] . 'logs.txt', 'a+');
        fputs($my_logs, $_POST['email'] . ' a tenté de se connecter ' . $_SERVER['REQUEST_URI'] . $dateTime . "\n");
    }
    
}

// if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
//     header("Location: /profil");
// }

// var_dump(getEmailPassword($pdo,'forehead1@diigo.com'));
// getUser($pdo, 2);