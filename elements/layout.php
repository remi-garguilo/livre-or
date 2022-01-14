<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Mon site' ?></title>
    <meta name="description" content="<?= $pageDescription ?? ''?>">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/elements/style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <?= $pageContent ?>
        </div>
    </div>
</body>
</html>

