<?php

require_once('../controllers/notification.controller.php');

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(handleGetNotificationById($_GET['id']));
        } else {
            echo json_encode(handleGetAllNotifications());
        }
        break;
    case 'POST':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $title = $data->title;
        $desc = $data->desc;

        echo json_encode(handleCreateNotification($title, $desc));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;

        echo json_encode(handleUpdateNotification($id, $title, $desc));
        break;
    case 'DELETE':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;

        echo json_encode(handleDeleteNotification($id));
        break;
    default:
        
        break;
}

?>