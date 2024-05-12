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

function handleCreateCourse($title, $desc, $content) {
    $course = new Course();
    return $course->createCourse($title, $desc, $content);
}

function handleUpdateCourse($id, $title, $desc, $content) {
    $course = new Course();
    return $course->updateCourse($id, $title, $desc, $content);
}

function handleDeleteCourse($id) {
    $course = new Course();
    return $course->deleteCourse($id);
}
?>