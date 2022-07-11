<?php
define("ROOT",'C:\OpenServer\domains\Router');

class Router{
    private $routes;
    public function __construct()
    {
        $routespath=ROOT.'/Components/routes.php';
        $this->routes=require_once($routespath);
    }

    private  function  getURI(){
        return trim($_SERVER['REQUEST_URI'],'/');
    }

    public function run(){
        $uri=$this->getURI();
        foreach ($this->routes as $urlpattern=>$path){
            if (preg_match("~$urlpattern~",$uri)){
                $replacement=preg_replace("~$urlpattern~",$path,$uri);//меняет по шаблону паттерна в path из url
                $controllerAction=explode('/',$replacement);
                $controller=array_shift($controllerAction).'Controller';
                $action=array_shift($controllerAction).'Action';
                $parametrs=$controllerAction;
                //вызов контроллера с action
            }
        }
    }
}
