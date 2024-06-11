<?php
include 'db.php';
session_start();
$title = "Home";
include 'templates/header.php';
?>

<p>Welcome to the News Service! Here you can read the latest news.</p>

<div id="news-container">
    <?php
    // Retrieve news data
    $sql = "SELECT * FROM news ORDER BY date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="news-item">
                <h3><?php echo $row['title']; ?></h3>
                <p><strong>Producer:</strong> <?php echo $row['producer']; ?></p>
                <p><strong>Date:</strong> <?php echo $row['date']; ?></p>
                <p><?php echo $row['text']; ?></p>
                <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
            </div>
            <?php
        }
    } else {
        echo "<p>No news available.</p>";
    }
    ?>
</div>

<?php include 'templates/footer.php'; ?>
    