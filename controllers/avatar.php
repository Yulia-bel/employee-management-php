<?php


class Avatar extends Controller {
    
    function __construct(){
        parent::__construct();
    }

    public function avatars() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $tmp = json_decode(file_get_contents("php://input"), true);
        
            $results = $this->model->callAPI($tmp['request']['url']);
        
            $images = array();
            foreach ($results as $key => $value) {
                array_push($images, $value->photo);
            }
            echo json_encode($images);
            die();
        }

    }
}
    

/*require '../models/avatarsManager.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $tmp = json_decode(file_get_contents("php://input"), true);

    $results = CallAPI($tmp['request']['url']);

    $images = array();
    foreach ($results as $key => $value) {
        array_push($images, $value->photo);
    }
    echo json_encode($images);
    die();
}*/