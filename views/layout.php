<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Mon site' ?></title>
    <meta name="description" content="<?= $pageDescription ?? ''?>">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/views/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/views/css/user.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/views/css/profil.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/views/css/commentaire.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1 class="logo" >Sunset Blog</h1>
        <input type="checkbox" id="nav-toggle" class="nav-toggle">
        <nav>
            <ul>
                <li><a href="<?= $router->generate('home');?>">Home</a></li>
                <li><a href="<?= $router->generate('livreor');?>">Livre d'or</a></li>
                <li><a href="<?= $router->generate('contact');?>">Contact</a></li>
                <?php if (!empty($_SESSION)){ ?>
                    <li><a href="<?= $router->generate('profil');?>">Profil</a></li>
                    <li><a href="<?= $router->generate('logout');?>"><button type="submit" class="btn-dc">Deconnexion</button></a></li>
                <?php }else { ?>
                    <li><a href="<?= $router->generate('connexion');?>">Connexion</a></li>
                    <li><a href="<?= $router->generate('inscription');?>">Inscription</a></li>
                    <?php }?>
            </ul>
        </nav>
        <label for="nav-toggle" class="nav-toggle-label">
            <span></span>
        </label>
    </header>
        <div class="content">
            <?= $pageContent ?>
        </div>
        <script>
        AOS.init({
            duration: 2000,
        })
    </script>
</body>
</html>

