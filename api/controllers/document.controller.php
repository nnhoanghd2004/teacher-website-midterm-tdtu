<?php
require_once("../models/document.model.php");

function handleGetAllDocuments() {
    $document = new Document();
    return $document->getAllDocuments();
}

function handleGetDocumentById($id) {
    $document = new Document();
    return $document->getDocumentById($id);
}

function handleCreateDocument($title, $desc, $link) {
    $document = new Document();
    return $document->createDocument($title, $desc, $link);
}

function handleUpdateDocument($id, $title, $desc, $link) {
    $document = new Document();
    return $document->updateDocument($id, $title, $desc, $link);
}

function handleDeleteDocument($id) {
    $document = new Document();
    return $document->deleteDocument($id);
}
?>