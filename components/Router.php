<?php

/**
 * Class Router
 */
class Router
{
    /**
     * @var mixed
     */
    private  $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $reutesPath = ROOT.'/config/routes.php';
        $this->routes = include($reutesPath);
    }

    /**
     * Returns request string
     *
     * @return string
     */
    private function getUri(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Run Router
     */
    public function run(){
        // Get URL
        $uri = $this->getUri();

        // Check route
        foreach ($this->routes as $uriPattern => $path){
            if(preg_match("~$uriPattern~", $uri)){

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                // Include files
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($result != null){
                    break;
                }
            }
        }
    }
}