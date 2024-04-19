<?php

require_once('../controllers/document.controller.php');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(handleGetDocumentById($_GET['id']));
        } else {
            echo json_encode(handleGetAllDocuments());
        }
        break;
    case 'POST':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $title = $data->title;
        $desc = $data->desc;
        $link = $data->link;

        echo json_encode(handleCreateDocument($title, $desc, $link));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;
        $link = $data->link;

        echo json_encode(handleUpdateDocument($id, $title, $desc, $link));
        break;
    case 'DELETE':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;

        echo json_encode(handleDeleteDocument($id));
        break;
    default:
        
        break;
}

?>