<?php
session_start();

include_once("functionsAndObjets.php");

$base = new Base();
$id = $_GET["id"];

$course = new Course($base);

$reqs = $course->allCoursesOfChauffeur($id);

$jsonData = json_encode($reqs);

header('Content-Type: application/json');
echo $jsonData;
