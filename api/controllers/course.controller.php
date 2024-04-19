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

function handleCreateCourse($title, $desc, $price) {
    $course = new Course();
    return $course->createCourse($title, $desc, $price);
}

function handleUpdateCourse($id, $title, $desc, $price) {
    $course = new Course();
    return $course->updateCourse($id, $title, $desc, $price);
}

function handleDeleteCourse($id) {
    $course = new Course();
    return $course->deleteCourse($id);
}
?>