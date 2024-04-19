<?php

require_once('../controllers/job.controller.php');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(handleGetJobById($_GET['id']));
        } else {
            echo json_encode(handleGetAllJobs());
        }
        break;
    case 'POST':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $title = $data->title;
        $desc = $data->desc;

        echo json_encode(handleCreateJob($title, $desc));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;

        echo json_encode(handleUpdateJob($id, $title, $desc));
        break;
    case 'DELETE':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;

        echo json_encode(handleDeleteJob($id));
        break;
    default:
        
        break;
}

?>