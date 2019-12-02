<?php


class UserController extends Controller
{

    public function __construct($db)
    {
        $this->model = new User($db);
        $this->view = new View();
    }

    public function index()
    {
        $data = $this->model->getAll();

        $this->view->generate('index_view.php', 'template_view.php', $data);
    }

    public function edit($id)
    {
        $data = $this->model->getById($id);

        $this->view->generate('edit_view.php', 'template_view.php', $data);
    }

    public function update($request, $id){

        $this->model->update($request, $id);


    }

    public function create($request)
    {
        $this->view->generate('create_view.php', 'template_view.php');
    }

    public function delete($id)
    {
        echo "Delete user".$id;
    }
}