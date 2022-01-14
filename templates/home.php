<?php
    $pageTitle = "Home";
    $pageDescription = "Voici la page d'accueil";
?>

<h1>Voici ma homepage</h1>

<a href=" <?= $router->generate('contact');?>">Nous contactez</a>
<a href=" <?= $router->generate('article', ['id' => 60, 'slug' => 'nimporte']);?>">Voir l'article</a>
<?php dump($_SERVER) ;?>

