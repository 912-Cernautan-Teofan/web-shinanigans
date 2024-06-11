<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/scripts.js" defer></script>
</head>
<body>
    <header>
        <h1>Teo.inc Digital News Service</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_news.php">Add News</a></li>
                    <li><a href="manage_news.php">Manage Your News</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        <?php else: ?>
            <nav>
                <ul>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        <?php endif; ?>
        <h1>Latest News</h1>
        <div id="filter-container">
            <select id="date-filter">
                <option value="any">Any Date</option>
            </select>
            <select id="category-filter">
                <option value="any">Any Category</option>
            </select>
            <button id="filter-btn">Filter</button>
        </div>
        <div id="filter-info"></div>
    </header>
