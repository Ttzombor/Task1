<?php


class UserController extends Controller
{

    /**
     * UserController constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->model = new User($db);
        $this->view = new View();
    }

    /**
     * Index method of creating view
     */
    public function index()
    {
        $data = $this->model->getAll();

        $this->view->generate('index_view.php', 'template_view.php', $data);
    }

    /**
     * Editing model within $id
     * @param $id
     */
    public function edit($id)
    {
        $data = $this->model->getById($id);

        $this->view->generate('edit_view.php', 'template_view.php', $data);
    }

    /**
     * Getting $id of model and updating that model
     * @param $request
     * @param $id
     */
    public function update($request, $id){

        $this->model->update($request, $id);

        $this->view->redirectToMain();
    }

    /**
     *  Generating Create_View.php
     */
    public function create()
    {
        $this->view->generate('create_view.php', 'template_view.php');
    }

    /**
     *  Storing the model after Creating itself
     * @param $request
     */
    public function store($request)
    {
        $this->model->create($request);

        $this->view->redirectToMain();
    }

    /**
     * Deleting model by $id
     * @param $id
     */
    public function delete($id)
    {
        $this->model->delete($id);

        $this->view->redirectToMain();
    }

    /**
     * Ordering data by :param ASC
     * @param $request
     */
    public function orderBy($request){
        $data = $this->model->orderBy($request);
        //print_r($data);
        $this->view->generate('index_view.php', 'template_view.php', $data);
    }

    /**
     *  Redirection to filemanager_view.php to
     *  Import data from CSV or Excel files
     */
    public function filemanager(){
        $this->view->generate('filemanager_view.php', 'template_view.php');
    }

    /**
     *  Importing data with $request = $_FILE
     * @param $request
     */
    public function import($request){

        $this->model->saveFile($request);

        $this->view->redirectToMain();
    }

    /**
     *  Exporting file type of MVC of Database
     */
    public function export(){

        $this->model->exportFile();
    }

    /**
     *  Searching for a some value in a Database
     * @param $request
     */
    public function search($request){

        $data = $this->model->find($request);

        $this->view->generate('index_view.php', 'template_view.php', $data);
    }
}