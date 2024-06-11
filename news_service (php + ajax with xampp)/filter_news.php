<?php
include 'db.php';

$date = $_GET['date'];
$category = $_GET['category'];

$sql = "SELECT * FROM news WHERE 1=1";
if ($date !== 'any') {
    $sql .= " AND DATE(date) = '$date'";
}
if ($category !== 'any') {
    $sql .= " AND category = '$category'";
}
$sql .= " ORDER BY date DESC";

$result = $conn->query($sql);
$newsItems = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newsItems[] = $row;
    }
}

echo json_encode($newsItems);
?>
