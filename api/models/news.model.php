<?php 

require_once('../configs/db.class.php');
header('Content-Type: application/json; charset=utf-8');

class News {
    

    function getAllNews() {
        try {
            $db = new DB();
            $query = "select * from news";
            $data = $db->query_select($query);

            return array (
                "status" => "201",
                "messenge" => "Get all news success",
                "code"  => "",
                "data" => $data,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get all news error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function getNewsById($id) {
        try {
            $db = new DB();
            $query = "select * from news where newsId = $id;";
            $data = $db->query_select($query);

            return array (
                "status" => "200",
                "messenge" => "Get news by id success",
                "code"  => "",
                "data" => $data[0],
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get news by id error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function createNews($title, $desc) {
        try {
            $db = new DB();
            $query = "INSERT INTO news (newsTitle, newsDesc) 
            VALUES ('$title', '$desc');";
            $data = $db->query_execute($query);

            return array (
                "status" => "201",
                "messenge" => "Create news success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Create news error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function updateNews($id, $title, $desc) {
        try {
            $db = new DB();
            $query = "UPDATE news
                SET newsTitle = '$title',
                    newsDesc = '$desc'
                WHERE newsID = $id;";
            $data = $db->query_execute($query);
            
            return array (
                "status" => "202",
                "messenge" => "Update news success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Update news error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function deleteNews($id) {
        try {
            $db = new DB();
            $query = "DELETE FROM news WHERE newsID = $id;";
            $data = $db->query_execute($query);

            return array (
                "status" => "202",
                "messenge" => "Delete news success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Delete news error",
                "code"  => "",
                "data" => null,
            );
        }
    }
}
?>