<?php
abstract class Controller {

    public $model;
    public $view;

    /**
     * Controller constructor.
     * Creating View.
     */
    function __construct()
    {
        $this->view = new View();
    }


}