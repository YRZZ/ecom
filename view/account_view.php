<?php

?>

<h1>Your Account</h1>
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