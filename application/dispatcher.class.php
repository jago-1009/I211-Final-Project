<?php

/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: dispatcher.class.php
 * Description:
 */
class dispatcher
{

}

//class Dispatcher {
//
//    public function __construct() {
//        self::dispatch();
//    }
//
//    //dispatch request to the appropriate controller/method
//    public static function dispatch() {
//        //split the uri into url and querystrings
//        $uri_array = explode('?', trim($_SERVER['REQUEST_URI'], '/'));
//
//        //extract components in url and store them in an array.
//        $url_array = explode('/', $uri_array[0]);
//
//        //remove the root folder name from the array if there is
//        //array_shift($url_array);
//        while (array_search(basename(getcwd()), $url_array) !== FALSE) {
//            array_shift($url_array);
//        }
//
//        //strip off index.php or index from the beginning of url if present
//        if (count($url_array) > 0 && ($url_array[0] == "index.php" or $url_array[0] == "index")) {
//            array_shift($url_array);
//        }
//
//
//        $controllerName = !empty($url_array[0]) ? ucfirst($url_array[0]) . 'Controller' : 'PhotoController';
//
//        //create controller instance
//        if (!class_exists($controllerName)) {
//            $message = "Controller '$controllerName' does not exist.";
//            include 'error.php';
//            exit();
//        }
//        $controller = new $controllerName();
//
//        //get method name or assign the default method "index"
//        $method = !empty($url_array[1]) ? $url_array[1] : 'index';
//
//        //remove .php from the method name if present
//        if (strpos($method, '.')) {
//            $method = substr($method, 0, strpos($method, '.'));
//        }
//        //get all arguments and store them in an array
//        $args = array();
//        if (count($url_array) > 2) {
//            $args = array_slice($url_array, 2);
//        }
//
//        //call a method with a variable number of arguments
//        call_user_func_array(array($controller, $method), $args);
//    }
//}dd