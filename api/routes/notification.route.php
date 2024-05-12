<?php
header('Content-Type: application/json');
// Set CORS headers
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Authorization, Content-Type');
header('Access-Control-Max-Age: 3600');

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
        $content = $data->content;

        echo json_encode(handleCreateNotification($title, $desc, $content));
        break;
    case 'PUT':
        $json = file_get_contents("php://input");
        $data = json_decode($json);

        $id = $data->id;
        $title = $data->title;
        $desc = $data->desc;
        $content = $data->content;

        echo json_encode(handleUpdateNotification($id, $title, $desc, $content));
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
