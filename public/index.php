<?php

require '../vendor/autoload.php';
require_once '../src/Service/ErrorService.php';

// Erreur et leurs dépendances
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.UTF-8');

ErrorService::initialize();

// Définir le répertoire de base
const BASE_DIR      = __DIR__;
const PHP           = '.php';
const VIEW          = '../templates/';
const LIBS_ASSETS   = '/assets/libs/';
const CUR_ASSETS    = '/assets/current/';

// Démarrer la session
session_start();

// Forcer HTTPS si nécessaire
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'off') {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}

// Obtenir l'URL de la requête
$url                = $_SERVER['REQUEST_URI'];

// Supprimer les paramètres de requête de l'URL
$url                = strtok($url, '?');

// Analyser l'URL
$urlParts           = explode('/', trim($url, '/'));

// Obtenir le nom du contrôleur et de l'action
$controllerName     = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'HomeController';
$action             = !empty($urlParts[1]) ? $urlParts[1] : 'index';

// Router
$controllerMap      = [
    'HomeController'            => 'Src\\Controller\\HomeController',
    'DocumentationController'   => 'Src\\Controller\\DocumentationController',
    'ModifierController'        => 'Src\\Controller\\ModifierController',
    'PhonebookController'       => 'Src\\Controller\\PhoneBookController'
];

if (isset($controllerMap[$controllerName])) {
    $controllerClass = $controllerMap[$controllerName];
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            $error = new \Src\Controller\ErrorController();
            $error->error(404);
        }
    } else {
        $error = new \Src\Controller\ErrorController();
        $error->error(404);
    }
} else {
    $error = new \Src\Controller\ErrorController();
    $error->error(404);
}