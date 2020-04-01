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

        $errors = array();
        $form = new Form($errors, 'post');
        if (isset($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $v = new Validation();
            $errors['nom'] = $v->textValid($post['nom'], 'nom', 2, 50);
            $errors['prenom'] = $v->textValid($post['prenom'], 'prenom', 2, 50);
            $errors['mail'] = $v->emailValid($post['mail']);
            $errors['adresse1'] = $v->textValid($post['adresse1'], 'adresse1', 2, 500);
            $errors['password1'] = $v->textValid($post['password1'], 'password', 5, 20);
            $errors['password2'] = $v->generateErrorRepeat($post['password1'], $post['password2'], 'Les mots de passe ne correspondent pas.');
            $errors['ville'] = $v->textValid($post['ville'], 'ville', 2, 500);
            $errors['cp'] = $v->textValid($post['cp'], 'cp', 4, 9);
            $errors['telephone'] = $v->textValid($post['telephone'], 'telephone', 9, 10);
            $errors['cgu'] = $v->generateErrorCheckBox($post['cgu'], "Veuillez accepter les Conditions générales d’utilisation.");

            if ($v->IsValid($errors) == true) {
                $hash = password_hash($post['password1'], PASSWORD_DEFAULT);
                UserModel::insertUser($post['nom'], $post['prenom'], $post['mail'], $post['adresse1'], $hash, $post['ville'], $post['cp'], $post['telephone']);
            }
            header('Location: http://localhost/GEAS/public/connexion');
            exit;
        }

        $this->render('app.default.register', array(
            'form' => $form,
            'errors' => $errors
        ));
    }

    public function connexion()
    {

        $errors = array();
        $form = new Form($errors, 'post');
        if (isset($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $valid = new Validation();
            $errors['mail'] = $valid->emailValid($post['mail']);
            var_dump($errors);

            if ($valid->IsValid($errors) == true) {
                $user = UserModel::userLogin($post['mail']);
                if ($user->email === $post['mail'] && password_verify($post['password'], $user->password)) {
                    $_SESSION = array(
                        'id'    => $user->id,
                        'nom'   => $user->nom,
                        'prenom'=> $user->prenom
                    );
                    header('Location: index.php?page=home');
                } else {
                    $errors['password'] = 'Mot de passe ou mail incorrect';
                }
            } else {
                $errors['connexion'] = 'Erreur dans les identifiants';
            }
        } else {
            $errors['email'] = 'Erreur dans le fomulaire';
        }

        $this->render('app.default.connexion', array(
            'form'  => $form,
            'errors' => $errors
        ));
    }

    public function motDePasseOublie()
    {
        $title = 'Mot de passe oublié';
        $html = '';
        if (!empty($_POST['submitted'])) {
            $post = $this->cleanXss($_POST);
            $check = UserModel::userLogin($post['email']);
            $token = $check->token;
            if (!empty($check && !empty($token))) {
                $html = '<a href="index.php?page=modifMotDePasse&token='.$token.'">Changer de mot de passe</a>';
            } else {
                $html = 'Email inconnu';
            }
        }

        $this->render('app.default.motDePasseOublie', compact('title', 'html'));
    }

    public function modifMotDePasse()
    {
        $title = 'Changer votre mot de passe';
        $valid = new Validation();
        $um = new UserModel();
        $i = $um->checkId($_GET['token']);
        $um->setId($i->id);
        $id = $um->getId();
        if (!empty($id)) {
            if (!empty($_POST['submitted'])) {
                $post = $this->cleanXss($_POST);
                $password = $valid->textValid($post['password1'], 'mot de passe', 5, 20);
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $token = UserModel::generateToken(255);
                UserModel::changePassword($hash, $token, $id);
            }
        } else {
            echo 'no';
        }

        $this->render('app.default.modifMotDePasse', compact('title'));
    }


}