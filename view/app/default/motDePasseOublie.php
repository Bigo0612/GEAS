<?php if (empty($_POST)) { ?>
    <form action="#" method="post">
        <label for="email">Votre adresse mail</label>
        <input type="email" name="email" id="email">
        <input type="submit" name="submitted" value="Envoyer">
        <a href="index.php?page=modifMotDePasse">Modifier votre mot de passe ?</a>
    </form>
<?php } else {
    echo $html;
}