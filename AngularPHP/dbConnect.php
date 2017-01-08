<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$dbName = 'students';
$dbUser = 'root';
$dbPassword = '';
$conn = new mysqli($host,$dbUser,$dbPassword,$dbName) or die('Unable to connect');

