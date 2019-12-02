<?php

class View{

    //Template view you can choose;
    public $template_view = "template_view.php";

    function generate($content_view,$template_view, $data = null){
        if(!$data && is_array($data)){
            extract(($data));
        }

        include 'App/Views/'.$template_view;
    }

    function redirectToMain(){
        header('Location:/');
    }
}