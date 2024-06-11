<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "Registration successful!";
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$title = "Register";
include 'templates/header_no_nav.php';
if (isset($error)) {
    echo "<p>$error</p>";
}
if (isset($message)) {
    echo "<p>$message</p>";
}
include 'templates/register_form.php';
?>
<p><a href="index.php">Back</a></p>
<?php include 'templates/footer.php'; ?>
