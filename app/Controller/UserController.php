<?php

namespace App\Controller;


use App\Weblitzer\Controller;
use App\Model\UserModel;
use App\Service\Form;
use App\Service\Validation;

class UserController extends Controller
{
    public function register()
    {
        die('test');
        $errors = array();
        $form = new Form($errors, 'post');
        if (isset($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $v = new Validation();
            $errors['nom'] = $v->textValid($post['nom'], 'nom', 2, 50);
            $errors['prenom'] = $v->textValid($post['prenom'], 'prenom', 2, 50);
            $errors['mail'] = $v->emailValid($post['mail']);
            $errors['password1'] = $v->textValid($post['password1'], 'password', 5, 20);
            $errors['password2'] = $v->generateErrorRepeat($post['password1'], $post['password2'], 'Les mots de passe ne correspondent pas.');
            $errors['cgu'] = $v->generateErrorCheckBox($post['cgu'], "Veuillez accepter les Conditions générales d’utilisation.");

            if ($v->IsValid($errors) == true) {
                $hash = password_hash($post['password1'], PASSWORD_DEFAULT);
                UserModel::insertUser($post['nom'], $post['prenom'], $post['mail'], $hash);
            }
        }

        $this->render('app.default.register', [
            'form' => $form,
            'errors' => $errors
        ]);
    }
}