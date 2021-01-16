<?php
include '../model/user.php';
include '../view/account_edit_view.php';

if (isset($_POST['password'])) {
    if ($_POST['password'] === $_SESSION['password']) {
        $_POST['firstname'] = trim($_POST['firstname']);
        $_POST['lastname'] = trim($_POST['lastname']);
        $_POST['email'] = trim($_POST['email']);
        $_POST['phone'] = trim($_POST['phone']);
        $_POST['new_password'] = trim($_POST['new_password']);
        $passwordHash = password_hash(trim($_POST['new_password']), PASSWORD_BCRYPT);
        $_POST['new_password'] = $passwordHash;

        var_dump(updateClient($pdo, $_SESSION['id']));
    }
}
var_dump($_POST);
var_dump(updateClient($pdo, $_SESSION['email']));
