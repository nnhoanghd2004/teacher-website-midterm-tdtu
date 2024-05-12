<?php
header('Content-Type: application/json');
// Set CORS headers
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
header('Access-Control-Max-Age: 3600');

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
        $content = $data->content;

        echo json_encode(handleCreateJob($title, $desc, $content));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;
        $content = $data->content;

        echo json_encode(handleUpdateJob($id, $title, $desc, $content));
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
