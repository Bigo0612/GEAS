<form action="#" method="post">
    <?php

    use App\Service\Form;

    $form =new Form;
    echo $form->divStart('research');
    echo $form->divStart('wrap');
    echo $form->divStart('frame');
    echo $form->divStart('research_executive'); ?>
    <?php echo $form->divStart('research_question');
    ?> <p>Connectez vous<p>
        <?php echo $form->divEnd();
        echo $form->divEnd();

        echo $form->label('mail', 'Insérez votre mail', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('email','mail','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['mail'])) {
            echo '<span class="error">'.$errors['mail'].'</span>';
        }

        echo $form->label('password1', 'Mot de passe','lab');
        echo $form->divStart('inscrip');
        echo $form->input('password','password','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['password'])) {
            echo '<span class="error">'.$errors['password'].'</span>';
        }

        echo $form->divStart('sub');
        echo $form->submit();
        echo $form->divEnd();
        ?> <a href="index.php?page=motDePasseOublie">Mot de passe oublié ?</a> <?php
        echo $form->divEnd();
        echo $form->divEnd();
        echo $form->divEnd();

        ?>
</form>