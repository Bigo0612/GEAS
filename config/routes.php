<?php
$page = 'home';
if(!empty($_GET['page'])) {
    $page = $_GET['page'];
}

if($page == 'home') {
  $controller = new App\Controller\DefaultController();
  $controller->index();
}
elseif ($page == 'register') {
    $controller = new App\Controller\UserController();
    $controller->register();
}

else {
  $controller = new App\Controller\DefaultController();
  $controller->Page404();
}









