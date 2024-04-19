<?php
require_once("../models/News.model.php");

function handleGetAllNews() {
    $new = new News();
    return $new->getAllNews();
}

function handleGetNewsById($id) {
    $new = new News();
    return $new->getNewsById($id);
}

function handleCreateNews($title, $desc) {
    $new = new News();
    return $new->createNews($title, $desc);
}

function handleUpdateNews($id, $title, $desc) {
    $new = new News();
    return $new->updateNews($id, $title, $desc);
}

function handleDeleteNews($id) {
    $new = new News();
    return $new->deleteNews($id);
}
?>