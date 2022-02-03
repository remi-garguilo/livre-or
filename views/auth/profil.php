<?php

use App\User;
$pageTitle = "Profil";
$pageDescription = "Voici votre profil";

session_start();
if (!isset($_SESSION['auth'])) {
	header('location: ' . $router->generate('home'));
	exit();
}
$user = $_SESSION['auth']['login'];
?>
<div data-aos="zoom-in"
        class="card-container">
	<span class="pro"><?= $user ?></span>
	<img class="round " src="<?= BASE_URL; ?>/views/img/profil.png" alt="user" />
	<h3>Changer d'information</h3>
	<div class="buttons">
		<button class="primary"><a href="<?= $router->generate('changer_login');?>">Changer Login</a></button>
		<button class="primary"><a href="<?= $router->generate('changer_password');?>">Changer Password</a></button>
	</div>
	<div class="skills">
		<h6>Permission</h6>
		<ul>
			<li>Changer login</li>
			<li>Changer password</li>
			<li>Créer commentaire</li>
			<li>Répondre à un commentaire</li>
		</ul>
	</div>
</div>