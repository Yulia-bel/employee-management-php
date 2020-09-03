<?php

class Employee extends Controller {
    
    function __construct(){
        parent::__construct();
        $this->view->employees = [];
        //echo "employee controller";
    }

    public function show() {
        $employees = $this->model->getEmployee();
        $this->view->employees = $employees;
        $this->view->render('dashboard');
    }

    public function insert() {
        $newEmployee = $_POST['newEmployee'];
        $this->model->insertEmployee($newEmployee);
    }

    public function delete() {
        parse_str(file_get_contents("php://input"), $_DELETE);
        $deleteId = $_DELETE['deleteId'];
        $this->model->deleteEmployee($deleteId);
    }

    public function details($id) {
        $employee = $this->model->getById($id);
        $this->view->employee = $employee;
        $this->view->render('employee/employee');
    }

    public function update() {
        $nEmployee = $_POST;
        $this->model->updateEmployee($nEmployee['id'], $nEmployee);
    }
}
