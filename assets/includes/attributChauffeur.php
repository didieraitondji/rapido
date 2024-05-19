<?php
session_start();

include_once("functionsAndObjets.php");

$base = new Base();
$id1 = $_GET["id1"];
$id2 = $_GET["id2"];
$d = $_GET["d"];

$course = new Course($base);

$reqs = $course->attributChauffeur($id1, $id2, $d);

header('Content-Type: application/json');
echo $reqs;
