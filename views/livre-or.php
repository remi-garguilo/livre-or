<?php
    use App\Commentaire;

    session_start();
    $commentaires = Commentaire::showCommentaire();
?>
<div data-aos="zoom-in" class="comms">
    <h2>Nos commentaires</h2>
    <?php foreach($commentaires as $comm): ?>
        <p>Commentaire envoyé le <?= $comm[3]; ?> : </br><?= $comm[1]; ?></br></p>
    <?php endforeach ?>
    <?php if (empty($_SESSION)){ ?>
        <h4 class="alert">VEUILLEZ VOUS CONNECTEZ AVANT DE POSTER UN COMMENTAIRE</h4>
        <h4><a class="info" href="<?= $router->generate('commentaire');?>">Veuillez vous connectez</a></h2>
    <?php }else { ?>
        <h4><a class="info" href="<?= $router->generate('commentaire');?>">Envoyer un commentaires</a></h2>
    <?php }?>
</div>
