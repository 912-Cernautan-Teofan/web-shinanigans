<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['id']; // Store user ID in session
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that username.";
    }
}

$title = "Login";
include 'templates/header_no_nav.php';
if (isset($error)) {
    echo "<p>$error</p>";
}
include 'templates/login_form.php';
?>
<p><a href="index.php">Back</a></p>
<?php include 'templates/footer.php'; ?>
