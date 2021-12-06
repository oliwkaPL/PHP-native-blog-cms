<?php

session_start();

require_once './vendor/autoload.php';

$router = new Router();
$router->getController();

class Router 
{
  public function getController()
  {
    $xml = new \DOMDocument();
    $xml->load('./Config/routes.xml');
    $routes = $xml->getElementsByTagName('route');

    isset($_GET['p']) ? $path = $_GET['p'] : $path = null;

    foreach($routes as $route){
      if ($path === $route->getAttribute('p')){
        $controllerClass = 'App\\Controller\\' . $route->getAttribute('controller');
        $action = $route->getAttribute('action');
        $params = [];
        if ($route->hasAttribute('params')){
          $keys = explode(',', $route->getAttribute('params'));
          foreach ($keys as $key){
            $params[$keys] = $_GET[$key];
          }
        }
        return new $controllerClass($action,$params);
      }
    }
    return new ErrorController('noRoute');
  }
};
?>