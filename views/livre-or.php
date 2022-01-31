<?php
    use App\Commentaire;

    session_start();
    $commentaires = Commentaire::showCommentaire();
?>
<div data-aos="zoom-in" class="comms">
    <h2>Nos commentaires</h3>
    <?php foreach($commentaires as $comm): ?>
        <p>Commentaire envoyé le <?= $comm[3]; ?> : </br><?= $comm[1]; ?></br></p>
    <?php endforeach ?>
    <h4><a class="info" href="<?= $router->generate('commentaire');?>">Envoyer un commentaires</a></h2>
</div>
