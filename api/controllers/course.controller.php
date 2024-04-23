<?php
require_once("../models/course.model.php");

function handleGetAllCourses() {
    $course = new Course();
    return $course->getAllCourses();
}

function handleGetCourseById($id) {
    $course = new Course();
    return $course->getCourseById($id);
}

function handleCreateCourse($title, $desc) {
    $course = new Course();
    return $course->createCourse($title, $desc);
}

function handleUpdateCourse($id, $title, $desc) {
    $course = new Course();
    return $course->updateCourse($id, $title, $desc);
}

function handleDeleteCourse($id) {
    $course = new Course();
    return $course->deleteCourse($id);
}
?>