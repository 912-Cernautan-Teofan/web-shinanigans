<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$error = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $text = trim($_POST['text']);
    $producer = trim($_POST['producer']);
    $category = trim($_POST['category']);
    $user_id = $_SESSION['user_id']; // User ID from session

    // Check if all fields are filled
    if (empty($title) || empty($text) || empty($producer) || empty($category)) {
        $error = "All fields are required!";
    } else {
        $sql = "INSERT INTO news (title, text, producer, category, user_id) VALUES ('$title', '$text', '$producer', '$category', '$user_id')";

        if ($conn->query($sql) === TRUE) {
            $message = "News added successfully!";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$title = "Add News";
include 'templates/header.php';
if (!empty($error)) {
    echo "<p style='color:red;'>$error</p>";
}
if (!empty($message)) {
    echo "<p style='color:green;'>$message</p>";
}
include 'templates/add_news_form.php';
include 'templates/footer.php';
?>
<script src="scripts.js"></script>
