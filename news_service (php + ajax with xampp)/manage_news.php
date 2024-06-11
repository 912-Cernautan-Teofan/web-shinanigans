<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Retrieve user's news
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM news WHERE user_id = $user_id ORDER BY date DESC";
$result = $conn->query($sql);
?>

<?php
$title = "Manage Your News";
include 'templates/header.php';
?>
<h2>Manage Your News</h2>

<?php if ($result->num_rows > 0): ?>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <h3><?php echo $row['title']; ?></h3>
                <p><strong>Producer:</strong> <?php echo $row['producer']; ?></p>
                <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
                <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                <p><?php echo $row['text']; ?></p>
                <a href="edit_news.php?id=<?php echo $row['id']; ?>">Update</a>
                <a href="delete_news.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this news?')">Delete</a>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>No news found.</p>
<?php endif; ?>

<?php include 'templates/footer.php'; ?>
