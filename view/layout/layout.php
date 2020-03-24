<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniGarde</title>
    <link rel="stylesheet" type="text/css" href="<?= $view->asset('css/style.css'); ?>">
</head>
<body>


<header>
    <nav>
        <ul>
            <li><a href="<?= $view->path('home'); ?>">Home</a></li>
            <?php if (empty($_SESSION)) { ?>
                <li class="inscription">
                    <a class="inscription-link" href="<?= $view->path('register'); ?>">Inscription</a>
                </li>
                <li class="connexion">
                    <a class="connexion-link" href="<?= $view->path('connexion'); ?>">Connexion</a>
                </li>
            <?php } else { ?>
                <li class="connexion">
                    <a href="<?= $view->path('deconnexion') ?>">Déconnexion</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>





<div class="container">
    <?= $content; ?>
</div>

<footer>
    <div class="foot">
        <div class="footer-icons">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-youtube-square"></i></a>
        </div>
        <p>&copy; 2020 - minigarde &reg;</p>
        <a href="<?= $view->path('mentionsLegales'); ?>">Mentions légales</a>
        <a href="<?= $view->path('cgu'); ?>">Conditions d'utilisation</a>
        <a href="<?= $view->path('contact'); ?>">Contact</a>
    </div>
</footer>

<script src="<?= $view->asset('js/main.js'); ?>"></script>
<script src="https://kit.fontawesome.com/5d1ae1daad.js" crossorigin="anonymous"></script>

</body>
</html>