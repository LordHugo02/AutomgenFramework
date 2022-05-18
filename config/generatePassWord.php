<?php
    require_once 'Config.php';

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password_crypte = crypt($_POST['password'], $salt_crypt);

        echo '<p>Ligne à copier dans le .htpass : <br>' . $login . ':' . $password_crypte . '</p>';
    } else {
?>
<p>Entrez votre login et votre mot de passe pour le crypter.</p>

<form method="post" action="generatePassWord.php">
    <p>
        Login : <input type="text" name="login"><br>
        Mot de passe : <input type="password" name="password"><br><br>

        <input type="submit" value="Crypter !">
    </p>
</form>
<?php
    }
?>
