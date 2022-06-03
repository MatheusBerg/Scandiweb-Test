<?php 

abstract class Controller {

    public function service($service) {
        $serviceString = $service . "Service";

        require_once "../Service/" . $serviceString . ".php";

        return new $serviceString();
    }

    public function view($view, $data = []) {

        if (file_exists('../View/' . $view . '.php')) {
            require_once '../View/' . $view . '.php';
        }else{
            die('View doest not exist.');
        }

        return $data;
    }

}

?>