<?php 

require_once('../configs/db.class.php');
header('Content-Type: application/json; charset=utf-8');


// Your PHP code to process requests...


class Course {
    

    function getAllCourses() {
        try {
            $db = new DB();
            $query = "select * from courses";
            $data = $db->query_select($query);

            return array (
                "status" => "201",
                "messenge" => "Get all courses success",
                "code"  => "",
                "data" => $data,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get all courses error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function getCourseById($id) {
        try {
            $db = new DB();
            $query = "select * from courses where courseId = $id;";
            $data = $db->query_select($query);

            return array (
                "status" => "200",
                "messenge" => "Get course by id success",
                "code"  => "",
                "data" => $data[0],
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get course by id error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function createCourse($title, $desc) {
        try {
            $db = new DB();
            $query = "INSERT INTO courses (courseTitle, courseDesc) 
            VALUES ('$title', '$desc');";
            $data = $db->query_execute($query);

            return array (
                "status" => "201",
                "messenge" => "Create course success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Create course error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function updateCourse($id, $title, $desc) {
        try {
            $db = new DB();
            $query = "UPDATE courses
                SET courseTitle = '$title',
                    courseDesc = '$desc'
                WHERE courseID = $id;";
            $data = $db->query_execute($query);
            
            return array (
                "status" => "202",
                "messenge" => "Update course success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Update course error",
                "code"  => "",
                "data" => [
                    "id" => $id,
                    "title" => $title,
                    "desc" => $desc,
                ],
            );
        }
    }


    function deleteCourse($id) {
        try {
            $db = new DB();
            $query = "DELETE FROM courses WHERE courseID = $id;";
            $data = $db->query_execute($query);

            return array (
                "status" => "202",
                "messenge" => "Delete course success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Delete course error",
                "code"  => "",
                "data" => null,
            );
        }
    }
}
?>