<?php
class Route{
    /*
     *
     */


    public static function start(){

        //Default
        $controller_name = "User";
        $action_name = "index";

        /*Request_uri is the full name path
             Example: example.com/phone_book/{show}
        */
        $routes = explode('/',  $_SERVER['REQUEST_URI']);

        //Get Controllers name
        if(!empty($routes[1])){
            $controller_name = $routes[1];
        }

        //Get action name
        if(!empty($routes[2])){
            $action_name = $routes[2];
        }

        //Adding prefix
        $model_name = ucfirst($controller_name);
        $controller_name = ucfirst($controller_name).'Controller';

        /*echo "Model: $model_name ";
        echo "Controller: $controller_name ";
        echo "Action: $action_name ";*/

        //File -> Models
        $model_file = $model_name.'.php';
        $model_path = "App/Models/".$model_file;

        if(file_exists($model_path))
        {
            include "App/Models/".$model_file;
        }

        $controller_file = $controller_name.'.php';
        $controller_path = "App/Controllers/".$controller_file;



        $requestMethod = $_SERVER["REQUEST_METHOD"];
        /*echo $requestMethod;*/


        if(file_exists($controller_path)) {
            include "App/Controllers/" . $controller_file;

            $dbConnection = (new Database())->getConnection();

            //Creating Controllers
            $controller = new $controller_name($dbConnection);
            $action = $action_name;

            if (method_exists($controller, $action)) {
                //Controllers's action should use switch
                print_r($_POST);
                if($requestMethod = "POST" && isset($_POST['search']))
                    $controller->$action($_POST);
                elseif($requestMethod = "POST" && isset($_POST['Import']))
                    $controller->$action($_FILES);
                elseif($requestMethod = "POST" && isset($_POST['create']) or
                    $requestMethod = "POST" && isset($_POST['orderBy']))
                    $controller->$action($_POST);
                elseif($requestMethod = "POST" && isset($_POST['edit']))
                    $controller->$action($_POST, $_POST['id']);
                elseif($requestMethod = "POST" && isset($_POST['id']))
                    $controller->$action($_POST['id']);
                else
                    $controller->$action();
            } else {
                Route::ErrorPage(404);
            }
        } else{
            Route::ErrorPage(405);

        }

    }
    static function ErrorPage($num_error){
        if($num_error == 404) echo "404";
        if($num_error == 405) echo "405";
    }
}