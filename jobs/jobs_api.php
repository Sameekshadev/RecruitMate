
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../phplogin/connection.php';

$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if (!$result) {
    die("Query error: " . $conn->error);
}

$jobs = [];
while ($row = $result->fetch_assoc()) {
    $jobs[] = $row;
}

header('Content-Type: application/json');
echo json_encode($jobs);
