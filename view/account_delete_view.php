<p>Do you want to delete your account ? </p>

<form action="/account_delete" methode="post">
    <div>
        <label for="email">email</label>
        <br>
        <input id="email" type="email" name="email" value="<?= $_SESSION['email'] ?>">
    </div>

    <div>
        <label for="password"> Password </label>
        <br>
        <input id="password" type="password" name="password">
    </div>

    <input type="submit" value="Confirm">
</form>