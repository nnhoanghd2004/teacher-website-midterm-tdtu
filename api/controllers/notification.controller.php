<?php
require_once("../models/notification.model.php");

function handleGetAllNotifications() {
    $notification = new Notification();
    return $notification->getAllNotifications();
}

function handleGetNotificationById($id) {
    $notification = new Notification();
    return $notification->getNotificationById($id);
}

function handleCreateNotification($title, $desc) {
    $notification = new Notification();
    return $notification->createNotification($title, $desc);
}

function handleUpdateNotification($id, $title, $desc) {
    $notification = new Notification();
    return $notification->updateNotification($id, $title, $desc);
}

function handleDeleteNotification($id) {
    $notification = new Notification();
    return $notification->deleteNotification($id);
}
?>