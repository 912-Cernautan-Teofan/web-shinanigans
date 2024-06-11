<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $news_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Check if the news item belongs to the current user
    $sql = "SELECT * FROM news WHERE id = $news_id AND user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // News item found, delete it from the database
        $delete_sql = "DELETE FROM news WHERE id = $news_id";
        if ($conn->query($delete_sql) === TRUE) {
            // Redirect to manage_news.php with a success message
            header("Location: manage_news.php?success=News%20deleted%20successfully");
            exit();
        } else {
            // Redirect to manage_news.php with an error message
            header("Location: manage_news.php?error=Error%20deleting%20news");
            exit();
        }
    } else {
        // News item not found or does not belong to the current user
        // Redirect to manage_news.php with an error message
        header("Location: manage_news.php?error=News%20not%20found%20or%20does%20not%20belong%20to%20you");
        exit();
    }
}
?>
