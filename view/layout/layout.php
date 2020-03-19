<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Framework POO</title>
    <link rel="stylesheet" type="text/css" href="<?= $view->asset('css/style.css'); ?>">
  </head>
  <body>


    <header>
      <nav>
          <ul>
              <li><a href="<?= $view->path('home'); ?>">Home</a></li>
              <li><a href="<?= $view->path('inscription'); ?>">Inscription</a></li>
              <li><a href="<?= $view->path('connexion'); ?>">Connexion</a></li>
          </ul>
      </nav>
    </header>

    <div class="container">
        <?= $content; ?>
    </div>

    <footer>
        <div class="foot">
            <p>&copy; 2020 - minigarde &reg;</p>
            <a href="<?= $view->path('mentionsLegales'); ?>">Mentions légales</a> |
            <a href="<?= $view->path('cgu'); ?>">Conditions d'utilisation</a> |
            <a href="contact.php">Contact</a>
        </div>
    </footer>

    <script src="<?= $view->asset('js/main.js'); ?>"></script>
  </body>
</html>
