<?php

use App\User;
$pageTitle = "Connectez-vous";

session_start();
$errors = false;

if (!empty($_POST)) {

    $auth = User::Login($_POST['login'], $_POST['password']);
    if ($auth) {
        header('location: ' . $router->generate('home'));
        exit();
    }
    $errors = true;
}
?>


<div data-aos="zoom-in-left"
     data-aos-duration="2000 class="login-page">
    <div class="form">
        <form  method="post" class="login-form">
            <input type="text" id="login" name="login" placeholder="Login"/>
            <input type="password" id="password" name="password" placeholder="Password"/>
            <button class="button" type="submit" >Connexion</button>
            <?php if ($errors): ?>
                <div class="alert">Identifiant ou mot de passe incorrecte</div>
            <?php endif ?>
            <p class="message">Pas de compte ? <a class = 'link' href="<?= $router->generate('inscription')?>"><strong>Inscrivez-vous </strong></a></p>
        </form>
    </div>
</div>