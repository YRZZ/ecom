<?php

?>
<link rel="stylesheet" type="text/css" href="ecom/public/css/global.css" />
<link rel="stylesheet" type="text/css" href="ecom/public/css/informations.css" />

<h2>Your Account</h2>

<div class="informations">
    <h3>Informations</h3>
    <?php
    echo '<p> Name : ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</p>';
    echo '<p> Email : ' . $_SESSION['email'] . '</p>';
    echo '<p> Phone : ' . $_SESSION['phone'] . '</p>';
    ?>

    <p>
    <form action="/account_edit" method="post">
        <input type="submit" value="edit account">
    </form>
    </p>
    <p>
    <form action="/account_delete" method="post">
        <input type="submit" value="delete account">
    </form>
    </p>
</div>