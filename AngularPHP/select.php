<?php

include 'dbconnect.php';

$query = 'SELECT * FROM students';
$rs = $conn->query($query);

while($row=$rs->fetch_assoc()){
	$data[]=$row;
}

print json_encode($data);