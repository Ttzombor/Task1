<?php

class View{

    //Template view you can choose;
    public $template_view = "template_view.php";

    /**
     *  Generating the Main view for user by
     *  adding $content_view in 'App/View/template_view.php
     *  using @include 'App/Views/'.$content_view;
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    function generate($content_view, $template_view, $data = null){
        if(!$data && is_array($data)){
            extract(($data));
        }

        include 'App/Views/'.$template_view;
    }

    /**
     *  Simple Redirection to the main view without routing :(
     */
    function redirectToMain(){
        header('Location:/');
    }
}