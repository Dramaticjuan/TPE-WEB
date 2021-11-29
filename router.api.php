<?php
require_once 'libs/Router.php';
require_once 'app/controllers/api.controller.php';

$router = new Router();

$router->addRoute('comments/libro/:ID', 'GET', 'ApiCommentsController', 'getAllComments');
$router->addRoute('comments/', 'POST', 'ApiCommentsController', 'sendComment');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentsController', 'deleteComment');



$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
