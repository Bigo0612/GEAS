<form action="#" method="post" style="text-align: center; margin-top: 50px">
    <?php

    use App\Service\Form;

    $form =new Form;
    echo $form->divStart('research');
    echo $form->divStart('wrap');
    echo $form->divStart('frame');
    echo $form->divStart('research_executive');
    ?>
    <?php echo $form->divStart('research_question');
    ?> <p>Inscrivez vous<p>
        <?php echo $form->divEnd();
        echo $form->divEnd();
        echo $form->label('nom', 'Insérez votre nom', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('text','nom','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['nom'])) {
            echo '<span class="error">'.$errors['nom'].'</span>';
        }

        echo $form->label('prenom', 'Insérez votre prénom', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('text','prenom','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['prenom'])) {
            echo '<span class="error">'.$errors['prenom'].'</span>';
        }

        echo $form->label('mail', 'Insérez votre mail', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('email','mail','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['mail'])) {
            echo '<span class="error">'.$errors['mail'].'</span>';
        }

        echo $form->label('adresse', 'Insérez votre adresse', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('text','adresse1','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['adresse1'])) {
            echo '<span class="error">'.$errors['adresse1'].'</span>';
        }

        echo $form->label('password1', 'Mot de passe','lab');
        echo $form->divStart('inscrip');
        echo $form->input('password','password1','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['password1'])) {
            echo '<span class="error">'.$errors['password1'].'</span>';
        }

        echo $form->label('password2', 'Confirmez votre mot de passe','lab');
        echo $form->divStart('inscrip');
        echo $form->input('password', 'password2','searchjobs2');
        echo $form->divEnd();

        echo $form->label('ville', 'Insérez votre ville', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('text','ville','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['ville'])) {
            echo '<span class="error">'.$errors['ville'].'</span>';
        }

        echo $form->label('cp', 'Insérez votre code postal', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('number','cp','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['cp'])) {
            echo '<span class="error">'.$errors['cp'].'</span>';
        }

        echo $form->label('telephone', 'Insérez votre numéro de téléphone', 'lab');
        echo $form->divStart('inscrip');
        echo $form->input('number','telephone','searchjobs2');
        echo $form->divEnd();
        if (!empty($errors['telephone'])) {
            echo '<span class="error">'.$errors['telephone'].'</span>';
        }

        echo $form->label('cgu', 'Veuillez accepter les CGU');
        echo $form->inputCheckbox('checkbox', 'cgu', true, 'check');
        if (!empty($errors['cgu'])) {
            echo '<span class="error">'.$errors['cgu'].'</span>';
        }

        echo $form->divStart('sub');
        echo $form->submit();
        echo $form->divEnd();

        echo $form->divEnd();
        echo $form->divEnd();
        echo $form->divEnd();
        ?>
</form>