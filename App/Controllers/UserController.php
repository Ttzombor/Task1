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

        $this->view->redirectToMain();
    }

    public function create()
    {

        $this->view->generate('create_view.php', 'template_view.php');
    }

    public function store($request)
    {
        $this->model->create($request);

        //print_r($this->model->create($request));

        $this->view->redirectToMain();
    }

    public function delete($id)
    {
        $this->model->delete($id);

        $this->view->redirectToMain();
    }

    public function orderBy($request){
        $data = $this->model->orderBy($request);
        //print_r($data);
        $this->view->generate('index_view.php', 'template_view.php', $data);
    }

    public function filemanager(){
        $this->view->generate('filemanager_view.php', 'template_view.php');
    }

    public function import($request){

        $this->model->saveFile($request);

        $this->view->redirectToMain();
    }
    public function export(){

        $this->model->exportFile();

        //$this->view->redirectToMain();
    }
    public function search($request){
        $data = $this->model->find($request);

        $this->view->generate('index_view.php', 'template_view.php', $data);
    }
}