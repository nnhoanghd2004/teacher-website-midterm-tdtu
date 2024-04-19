<?php 

require_once('../configs/db.class.php');
header('Content-Type: application/json; charset=utf-8');

class Document {
    

    function getAllDocuments() {
        try {
            $db = new DB();
            $query = "select * from documents";
            $data = $db->query_select($query);

            return array (
                "status" => "201",
                "messenge" => "Get all documents success",
                "code"  => "",
                "data" => $data,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get all documents error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function getDocumentById($id) {
        try {
            $db = new DB();
            $query = "select * from documents where documentId = $id;";
            $data = $db->query_select($query);

            return array (
                "status" => "200",
                "messenge" => "Get document by id success",
                "code"  => "",
                "data" => $data[0],
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get document by id error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function createDocument($title, $desc, $link) {
        try {
            $db = new DB();
            $query = "INSERT INTO DOCUMENTS (documentTitle, documentDesc, documentLink) 
            VALUES ('$title', '$desc', '$link');";
            $data = $db->query_execute($query);

            return array (
                "status" => "201",
                "messenge" => "Create document success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Create document error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function updateDocument($id, $title, $desc, $link) {
        try {
            $db = new DB();
            $query = "UPDATE documents
            SET documentTitle = '$title',
                documentDesc = '$desc', 
                documentLink = '$link'
            WHERE documentID = $id;
            ";
            $data = $db->query_execute($query);

            return array (
                "status" => "202",
                "messenge" => "Update document success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Update document error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function deleteDocument($id) {
        try {
            $db = new DB();
            $query = "DELETE FROM documents WHERE documentID = $id;";
            $data = $db->query_execute($query);

            return array (
                "status" => "202",
                "messenge" => "Delete document success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Delete document error",
                "code"  => "",
                "data" => null,
            );
        }
    }
}
?>