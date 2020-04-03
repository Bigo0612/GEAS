<?php

namespace App\Controller;

use App\Weblitzer\Controller;



/**
 *
 */
class DefaultController extends Controller
{

    public function index()
    {
        $this->render('app.default.frontpage',array(

        ));
    }

    public function register()
    {
        $message = '';

        $this->render('app.default.register',array(
            'message'   => $message,
        ));
    }

    public function connexion()
    {
        $message = '';

        $this->render('app.default.connexion',array(
            'message'   => $message,
        ));
    }

    public function deconnexion()
    {
        $message = '';

        $this->render('app.default.deconnexion',array(
            'message'   => $message,
        ));
    }

    public function mentionsLegales()
    {
        $message = '';

        $this->render('app.default.mentionsLegales',array(
            'message'   => $message,
        ));
    }

    public function cgu()
    {
        $message = '';

        $this->render('app.default.cgu',array(
            'message'   => $message,
        ));
    }

    public function contact()
    {
        $message = '';

        $this->render('app.default.contact',array(
            'message'   => $message,
        ));
    }

    public function rechercher()
    {
        $message = '';

        $this->render('app.default.rechercher',array(
            'message'   => $message,
        ));
    }

    /**
     *
     */
    public function Page404()
    {
        $this->render('app.default.404');
    }

}
