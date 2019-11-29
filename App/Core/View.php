<?php

class View{

    //Template view you can choose;
    public $template_view;

    function generate($content_view,$template_view, $data){
        if(!$data && is_array($data)){
            extract(($data));
        }

        include 'App/Views/'.$template_view;
    }
}