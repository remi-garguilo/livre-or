<?php

use App\User;
use Toolbox\Toolbox;
$pageTitle = "Changer de mot de passe";
$pageDescription = "Changer votre mot de passe ici";
session_start();
$users = $_SESSION['auth']['login'];
$errors = 0;

if (!empty($_POST)) {
	$id = $_SESSION['auth']['id'];
	$password = $_SESSION['auth']['password'];
	$oldpassword = $_POST['password'];
    $newpassword = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

	if (password_verify($oldpassword, $password)
		&& $newpassword == $confirm_password)
	{
		User::changePassword($newpassword, $id);
		header('location: ' . $router->generate('profil'));
		exit();
	} else {
		$errors = 1;
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
            <div class="ipt"><input type="password"  name="password" placeholder="Password"/></div>
			<div class="ipt"><input type="password"  name="new_password" placeholder="Nouveau Password"/></div>
			<div class="ipt"><input type="password"  name="confirm_password" placeholder="Confirmation du nouveau Password"/></div>
			<input type="submit" value="Envoyer">
        </form>
	</div>
	<?php if($errors === 1):?>
                <div class="alert">
                    <?= Toolbox::ajouterMessageAlerte(4);?>
                </div>
    <?php endif ?>
</div>