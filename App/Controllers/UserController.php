<?php


class UserController extends Controller
{
    public function index()
    {
        $this->view->generate('index_view.php', 'template_view.php');
    }

    public function edit($id = null)
    {
        $this->view->generate('edit_view.php', 'template_view.php');
    }

    public function update($request, $id){
        /*
         * Store data and return index_view
         */
        $this->view->generate('index_view.php', 'template_view.php');
    }

    public function create()
    {
        $this->view->generate('create_view.php', 'template_view.php');
    }

    public function delete($id = null)
    {
        echo "Delete user $id";
    }
}