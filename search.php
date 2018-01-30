<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'kitkat';
$dbName = 'leanin';
//connect with the database

$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM circles WHERE address LIKE '%".$searchTerm."%' ORDER BY address ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['address'];
}
//return json data
echo json_encode($data);
?>