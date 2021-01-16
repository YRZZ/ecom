<form action="/account_edit" method="post">

    <div>
        <label for="firstname"> First Name</label>
        <br>
        <input type="text" name="firstname" value="<?= $_SESSION['first_name'] ?>">
    </div>
    <div>
        <label for="lastname">Last Name</label>
        <br>
        <input type="text" name="lastname" value=" <?= $_SESSION['last_name'] ?>">
    </div>
    <div>
        <label for="email">email</label>
        <br>
        <input type="text" name="email" value="<?= $_SESSION['email'] ?>">
    </div>
    <div>
        <label for="phone">Phone</label>
        <br>
        <input type="number" name="phone" value="<?= $_SESSION['phone'] ?>">
    </div>
    <div>
        <label for="password"> Password </label>
        <br>
        <input type="password" name="password">
    </div>
    <div>
        <label for="new_password">New password</label>
        <br>
        <input type="password" name="new_password">
    </div>
    <p>Enter your password before submit</p>
    <input type="submit" value="Submit">

</form>

<?php
var_dump($_SESSION['first_name']);
