<?php

use App\User;
use Toolbox\Toolbox;

$pageTitle = "Changer de login";
$pageDescription = "Changer votre login ici";
session_start();

$users = $_SESSION['auth']['login'];
$errors = false;
$void = false;

if (empty($_POST['Nlogin'])) {
	$void = true;
}
else {
	$login = $_SESSION['auth']['login'];
	$new_login = $_POST['Nlogin'];
	$auth = User::changeLogin($login, $new_login);
	if ($auth == null) {
		$errors = true;
	} else {
	 	header('location: ' . $router->generate('profil'));
	 	exit();
	}
}

?>
<div data-aos="zoom-in-left"
     data-aos-duration="2000"
        class="card-container">
	<span class="pro"><?= $users?></span>
	<img class="round " src="<?= BASE_URL; ?>/views/img/profil.png" alt="user" />
	<div class="buttons">
        <button class="primary mgn"><a href="<?= $router->generate('profil');?>">Retour</a></button>
	</div>
	<div class="skills">
		<h6>Information</h6>
		<form method="post">
			<input type="text"  name="Nlogin" placeholder="Nouveau login"/>
			<input type="submit" value="Envoyer">
        </form>
		<?php if($errors === true):?>
                <div class="alert">
                    <?= Toolbox::ajouterMessageAlerte(2);?>
                </div>
        <?php endif ?>
		<?php if($void === true):?>
                <div class="alert">
                    <?= Toolbox::ajouterMessageAlerte(5);?>
                </div>
        <?php endif ?>
	</div>
</div>