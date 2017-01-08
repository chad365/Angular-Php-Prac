<?php

include 'dbconnect.php';

$data = json_decode(file_get_contents('php://input'));
$studentId = $data->studentId;

$query = 'DELETE FROM students WHERE studentId ='.$studentId;
$conn->query($query);