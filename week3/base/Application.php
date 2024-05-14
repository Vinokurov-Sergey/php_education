<?php
namespace Base;

class Application
{
    private $route;

    public function __construct($route)
    {
        $this->route = $route;
    }
    public function run()
    {
        $view = new View();
        $view->setTemplatePath(getcwd() . '/app/View');
        try {
            $this->route->dispatch($_SERVER['REQUEST_URI']);
            $controller = $this->route->getController();
            $action = $this->route->getAction();
            $controller->setView($view);
            $session = new Session();
            $session->init();
            $controller->setSession($session);
            $controller->preDispatch();
            $result = $controller->$action();
            echo $result;
        } catch (RedirectException $e)
        {
            header('Location: ' . $e->getUrl());
        }
        catch (\Exception $e)
        {
            echo 'Page not found';
        }
    }
}
