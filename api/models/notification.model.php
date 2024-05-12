<?php

require_once('../configs/db.class.php');
header('Content-Type: application/json; charset=utf-8');

class Notification
{


    function getAllNotifications()
    {
        try {
            $db = new DB();
            $query = "select * from notifications";
            $data = $db->query_select($query);

            return array(
                "status" => "201",
                "messenge" => "Get all notifications success",
                "code"  => "",
                "data" => $data,
            );
        } catch (\Throwable $th) {
            return array(
                "status" => "400",
                "messenge" => "Get all notifications error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function getNotificationById($id)
    {
        try {
            $db = new DB();
            $query = "select * from notifications where notificationId = $id;";
            $data = $db->query_select($query);

            return array(
                "status" => "200",
                "messenge" => "Get notification by id success",
                "code"  => "",
                "data" => $data[0],
            );
        } catch (\Throwable $th) {
            return array(
                "status" => "400",
                "messenge" => "Get notification by id error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function createNotification($title, $desc, $content)
    {
        try {
            $title = str_replace("'", "\'", $title);
            $desc = str_replace("'", "\'", $desc);
            $content = str_replace("'", "\'", $content);

            $db = new DB();
            $query = "INSERT INTO notifications (notificationTitle, notificationDesc, notificationContent) 
            VALUES ('$title', '$desc', '$content');";
            $db->query_execute($query);

            return array(
                "status" => "201",
                "messenge" => "Create notification success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array(
                "status" => "400",
                "messenge" => "Create notification error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function updateNotification($id, $title, $desc, $content)
    {
        try {
            $title = str_replace("'", "\'", $title);
            $desc = str_replace("'", "\'", $desc);
            $content = str_replace("'", "\'", $content);

            $db = new DB();
            $query = "UPDATE notifications
                SET notificationTitle = '$title',
                    notificationDesc = '$desc',
                    notificationContent = '$content'
                WHERE notificationID = $id;";
            $db->query_execute($query);

            return array(
                "status" => "202",
                "messenge" => "Update notification success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array(
                "status" => "400",
                "messenge" => "Update notification error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function deleteNotification($id)
    {
        try {
            $db = new DB();
            $query = "DELETE FROM notifications WHERE notificationID = $id;";
            $db->query_execute($query);

            return array(
                "status" => "202",
                "messenge" => "Delete notification success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array(
                "status" => "400",
                "messenge" => "Delete notification error",
                "code"  => "",
                "data" => null,
            );
        }
    }
}
