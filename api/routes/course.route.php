<?php

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
        $price = $data->price;

        echo json_encode(handleCreateCourse($title, $desc, $price));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;
        $price = $data->price;
        
        echo json_encode(handleUpdateCourse($id, $title, $desc, $price));
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