<?php
require_once("../models/job.model.php");

function handleGetAllJobs() {
    $job = new Job();
    return $job->getAllJobs();
}

function handleGetJobById($id) {
    $job = new Job();
    return $job->getJobById($id);
}

function handleCreateJob($title, $desc) {
    $job = new Job();
    return $job->createJob($title, $desc);
}

function handleUpdateJob($id, $title, $desc) {
    $job = new Job();
    return $job->updateJob($id, $title, $desc);
}

function handleDeleteJob($id) {
    $job = new Job();
    return $job->deleteJob($id);
}
?>