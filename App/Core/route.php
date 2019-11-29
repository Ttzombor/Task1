<?php

class Route{
    /*
     *
     */
    static function start(){

        //Default
       $controller_name = "Main";
       $action_name = "index";

       /*Request_uri is the full name path
            Example: example.com/phone_book/{show}
       */
       $routes = explode('/',  $_SERVER['REQUEST_URI']);

       //Get Controller name
       if(!empty($routes[1])){
           $controller_name = $routes[1];
       }

       //Get action name
        if(!empty($routes[2])){
            $action_name = $routes[2];
        }

        //Adding prefix
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        //File -> Model
        $model_file = strtolower($model_name).'php';
        $model_path = "App/Models/".$model_file;

        $controller_file = strtolower($controller_name).'php';
        $controller_path = "App/Controllers/".$controller_file;

        if(!file_exists($controller_path)){
            /*
             * Exception
             */
            Route::ErrorPage(404);
        }
        else{
            include_once "App/Controller/".$controller_file;
        }

        //Creating Controller
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)){
            //Controller's action
            $controller->$action();
        }
        else{
            Route::ErrorPage(404);
        }
    }

    static function ErrorPage($num_error){
        return "404";
    }
}