<?php

?>

<h1>Your Account</h1>
<h3>Informations</h3>

<?php
include '../model/user.php';

echo '<p>Name : ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</p>';

// $sessionInfos = getClient($pdo, $_SESSION['email']);
// var_dump($sessionInfos);


// echo '<>Name : ' . $sessionInfos['first_name'] . ' Last Name : ' . $sessionInfos['last_name'] . '</>';
?>