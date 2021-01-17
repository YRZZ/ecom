<?php
include '../model/user.php';

if (isset($_POST['password'])) {
    if (password_verify($_POST['password'], getEmailPassword($pdo, $_POST['email'])['password'])) {
        $_SESSION['first_name'] = trim($_POST['first_name']);
        $_SESSION['last_name'] = trim($_POST['last_name']);
        $_SESSION['email'] = trim($_POST['email']);
        $_SESSION['phone'] = trim($_POST['phone']);
        $_SESSION['password'] = trim($_POST['password']);
        $passwordHash = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
        $_SESSION['password'] = $passwordHash;
        echo 'fromage';
        var_dump(updateClient($pdo, $_SESSION));
        header('Location: account');
        exit();
    }
}
var_dump($_POST);
var_dump($_SESSION);
var_dump(updateClient($pdo, $_SESSION));

include '../view/account_edit_view.php';
