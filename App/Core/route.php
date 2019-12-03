<?php
class Route{

    /**
     *  Start method is the begging of app and
     *  the processor of the app.
     *  This should be overwriten in methods and classes.
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

        //Get Controller name: UserController
        $model_name = ucfirst($controller_name);
        $controller_name = ucfirst($controller_name).'Controller';

        //Path to Model File
        $model_file = $model_name.'.php';
        $model_path = "App/Models/".$model_file;

        if(file_exists($model_path))
        {
            include "App/Models/".$model_file;
        }

        //Path to Controller File
        $controller_file = $controller_name.'.php';
        $controller_path = "App/Controllers/".$controller_file;

        //Processing the app
        if(file_exists($controller_path)) {
            include "App/Controllers/" . $controller_file;

            $dbConnection = (new Database())->getConnection();

            //Creating Controllers
            $controller = new $controller_name($dbConnection);
            $action = $action_name;

            //Routing
            if (method_exists($controller, $action)) {

                if($_POST) {
                    switch ($_POST) {
                        case (isset($_POST['update'])):
                            {
                                if (isset($_POST['id']))
                                    $controller->$action($_POST, $_POST['id']);
                            }
                            break;
                        case (isset($_POST['orderBy'])): $controller->$action($_POST); break;
                        case (isset($_POST['create'])): $controller->$action($_POST); break;
                        case (isset($_POST['Import'])): $controller->$action($_FILES); break;
                        case (isset($_POST['search'])): $controller->$action($_POST); break;
                        case (isset($_POST['id'])):
                            {
                                if (isset($_POST['id']))
                                    $controller->$action($_POST['id']);
                            }
                            break;
                        default:
                            $controller->$action();
                            break;
                    }
                }
                else $controller->$action();
            } else Route::ErrorPage(404);
        }
        else{
            Route::ErrorPage(405);
        }
    }

    /**
     *  ErrorPage.
     * @param $num_error
     */
    static function ErrorPage($num_error){
        if($num_error == 404) echo "404";
        if($num_error == 405) echo "405";
    }
}