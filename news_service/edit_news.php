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
        // News item found, pre-fill the form with its details
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $text = $row['text'];
        $producer = $row['producer'];
        $category = $row['category'];
    } else {
        // News item not found or does not belong to the current user
        // Redirect to manage_news.php with an error message
        header("Location: manage_news.php?error=News%20not%20found%20or%20does%20not%20belong%20to%20you");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $news_id = $_POST['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];
    $producer = $_POST['producer'];
    $category = $_POST['category'];

    // Update the news item in the database
    $sql = "UPDATE news SET title = '$title', text = '$text', producer = '$producer', category = '$category' WHERE id = $news_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to manage_news.php with a success message
        header("Location: manage_news.php?success=News%20updated%20successfully");
        exit();
    } else {
        // Redirect to manage_news.php with an error message
        header("Location: manage_news.php?error=Error%20updating%20news");
        exit();
    }
}


include 'templates/header.php';
?>

<h2>Edit News</h2>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $news_id; ?>">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="<?php echo $title; ?>"><br>
    <label for="text">Text:</label><br>
    <textarea id="text" name="text"><?php echo $text; ?></textarea><br>
    <label for="producer">Producer:</label><br>
    <input type="text" id="producer" name="producer" value="<?php echo $producer; ?>"><br>
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" value="<?php echo $category; ?>"><br><br>
    <input type="submit" value="Update News">
</form>

<?php include 'templates/footer.php'; ?>
