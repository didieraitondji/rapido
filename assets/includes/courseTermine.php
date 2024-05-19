<?php
session_start();

include_once("functionsAndObjets.php");

$base = new Base();
$id1 = $_GET["id1"];
$id2 = $_GET["id2"];

$course = new Course($base);

$reqs = $course->marqueCourseTermine($id1, $id2);

$jsonData = json_encode($reqs);

header('Content-Type: application/json');
echo $jsonData;
