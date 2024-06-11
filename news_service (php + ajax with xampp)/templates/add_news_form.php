<h1>Add News</h1>
<form method="post" action="add_news.php" id="newsForm">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br>

    <label for="text">Text:</label>
    <textarea id="text" name="text" required></textarea><br>

    <label for="producer">Producer:</label>
    <input type="text" id="producer" name="producer" required><br>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" required><br>

    <button type="submit">Add News</button>
    <button type="button" id="backButton">Back</button>
</form>
