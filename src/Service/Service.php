<?php 

abstract class Service {

    public function controller($controller) {
        $controllerString = $controller . "Controller";

        require_once "../Controller/" . $controllerString . ".php";

        return new $controllerString();
    }

    public function service($service) {
        $serviceString = $service . "Service";

        require_once $serviceString . ".php";

        return new $serviceString();
    }

    public function model($type) {
        require_once '../Model/' . $type . '.php';

        return new $type();
    }

}


?>