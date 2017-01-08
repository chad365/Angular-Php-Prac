<?php

include "dbconnect.php";

$data = json_decode(file_get_contents('php://input'));

$request = strtolower($conn->real_escape_string($data->btnName));
$studentId = $conn->real_escape_string($data->studentId);
$studentName = $conn->real_escape_string($data->studentName);

switch ($request)
{
	case 'insert':
		$query = "INSERT INTO students(studentId,studentName) VALUES ($studentId,'".$studentName."')";
		break;
	case 'update':
		$query = 'UPDATE students SET studentName = "'.$studentName.'" WHERE studentId='.$studentId;
		break;
	default:
		null;
}
$execute = $conn->query($query);