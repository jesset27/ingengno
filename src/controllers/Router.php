<?php

namespace Jesse\Ingengno\Controllers;

class Router
{
    public function handleRequest()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : '';
        switch ($url) {
            case 'Contato':
                $this->loadView('ContatoView');
                break;
            default:
                $this->loadView('HomeView');
                $homeController = new HomeController();
                $homeController->render();
                break;
        }
    }

    private function loadView($viewName)
    {
        include_once __DIR__ . '/../views/' . $viewName . '.php';
    }
}
