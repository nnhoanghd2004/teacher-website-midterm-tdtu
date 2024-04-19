<?php 

require_once('../configs/db.class.php');
header('Content-Type: application/json; charset=utf-8');

class Job {
    

    function getAllJobs() {
        try {
            $db = new DB();
            $query = "select * from jobs";
            $data = $db->query_select($query);

            return array (
                "status" => "201",
                "messenge" => "Get all jobs success",
                "code"  => "",
                "data" => $data,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get all jobs error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function getJobById($id) {
        try {
            $db = new DB();
            $query = "select * from jobs where jobId = $id;";
            $data = $db->query_select($query);

            return array (
                "status" => "200",
                "messenge" => "Get job by id success",
                "code"  => "",
                "data" => $data[0],
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Get job by id error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function createJob($title, $desc) {
        try {
            $db = new DB();
            $query = "INSERT INTO jobs (jobTitle, jobDesc) 
            VALUES ('$title', '$desc');";
            $data = $db->query_execute($query);

            return array (
                "status" => "201",
                "messenge" => "Create job success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Create job error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function updateJob($id, $title, $desc) {
        try {
            $db = new DB();
            $query = "UPDATE jobs
                SET jobTitle = '$title',
                    jobDesc = '$desc'
                WHERE jobID = $id;";
            $data = $db->query_execute($query);
            
            return array (
                "status" => "202",
                "messenge" => "Update job success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Update job error",
                "code"  => "",
                "data" => null,
            );
        }
    }


    function deleteJob($id) {
        try {
            $db = new DB();
            $query = "DELETE FROM jobs WHERE jobID = $id;";
            $data = $db->query_execute($query);

            return array (
                "status" => "202",
                "messenge" => "Delete job success",
                "code"  => "",
                "data" => null,
            );
        } catch (\Throwable $th) {
            return array (
                "status" => "400",
                "messenge" => "Delete job error",
                "code"  => "",
                "data" => null,
            );
        }
    }
}
?>