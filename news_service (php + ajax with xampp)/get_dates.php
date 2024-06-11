<?php
include 'db.php';

// Query to get unique dates from the news table
$sql = "SELECT DISTINCT DATE(date) as date FROM news ORDER BY date DESC";
$result = $conn->query($sql);

$dates = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['date'];
    }
}

echo json_encode($dates);
?>
