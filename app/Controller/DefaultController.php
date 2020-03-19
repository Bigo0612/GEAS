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
        $this->render('app.default.frontpage',array());
    }

    /**
     *
     */
    public function Page404()
    {
        $this->render('app.default.404');
    }

}
