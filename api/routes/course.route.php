<?php
header('Content-Type: application/json');
// Set CORS headers
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
header('Access-Control-Max-Age: 3600');

require_once('../controllers/course.controller.php');

$method = $_SERVER["REQUEST_METHOD"];
switch ($method) {
    
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(handleGetCourseById($_GET['id']));
        } else {
            echo json_encode(handleGetAllCourses());
        }
        break;
    case 'POST':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $title = $data->title;
        $desc = $data->desc;
        
        echo json_encode(handleCreateCourse($title, $desc));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;
        
        echo json_encode(handleUpdateCourse($id, $title, $desc));
        break;
    case 'DELETE':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;

        echo json_encode(handleDeleteCourse($id));
        break;
    default:
        
        break;
}

?>