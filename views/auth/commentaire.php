<?php

use App\Commentaire;
use Toolbox\Toolbox;

session_start();
if (!isset($_SESSION['auth'])) {
	header('location: ' . $router->generate('home'));
	exit();
}
$errors = 0;
if (empty($_POST['commentaire'])) {
    $errors = 1;
} else {
    if (isset($_POST['commentaire'])) {
        $id_user= $_SESSION['auth']['id'];
        $commentaire = $_POST['commentaire'];
        $commentaires = Commentaire::getCommentaire($id_user, $commentaire);
    }
}
?>

<div class="form-com">
    <h3>Poster votre commentaire ici !</h3>
    <form action="" method="POST">
        <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br />
        <input type="submit" value="Envoyer">
    </form>
    <?php if ($errors == 1):?>
        <div class="alert">
            <h6><?= Toolbox::ajouterMessageAlerte(5);?></h3>
        </div>
    <?php endif ?>
</div>