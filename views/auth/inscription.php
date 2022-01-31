<?php
use App\User;
use Toolbox\Toolbox;

$pageTitle = "Inscrivez-vous";
$pageDescription = "Cette page vous sert à vous inscrire";

session_start();
$errors = false;
$errors_pw = false;
if (!empty($_POST)) {
    if ($_POST['password'] ==  $_POST['passwordC']) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $auth = User::Register($login, $password);
        if ($auth === 1) {
            $errors = true;
        } else {
            header('location: ' . $router->generate('connexion'));
            exit();
        }
    } else {
        $errors_pw = true;
    }
}
?>

<div data-aos="zoom-in"
     data-aos-duration="2000 class="login-page">
    <div class="form">
        <form  method="post" class="login-form">
            <input type="text" id="login" name="login" placeholder="Login"/>
            <input type="password" id="password" name="password" placeholder="Mot de passe"/>
            <input type="password" id="passwordC" name="passwordC" placeholder="Confirmation de mot de passe"/>
            <button class="button" type="submit" >S'inscrire</button>
            <?php if($errors === true):?>
                <div class="alert">
                    <?= Toolbox::ajouterMessageAlerte(2);?>
                </div>
            <?php endif ?>
            <?php if($errors_pw === true):?>
                <div class="alert">
                    <?= Toolbox::ajouterMessageAlerte(1);?>
                </div>
            <?php endif ?>
            <p class="message"> Déja un compte ? <a class = 'link' href="<?= $router->generate('inscription')?>"><strong> Connectez-vous</strong></a></p>
        </form>
    </div>
</div>