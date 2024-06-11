<?php
include 'db.php';

// Query to get unique categories from the news table
$sql = "SELECT DISTINCT category FROM news ORDER BY category ASC";
$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
    }
}

echo json_encode($categories);
?>
