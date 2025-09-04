<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
echo "<h2>Welcome, " . $_SESSION['username'] . "</h2>";
echo "<a href='create.php'>Create Post</a> | <a href='logout.php'>Logout</a><br><br>";

// Show only user's posts
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM posts WHERE user_id=$user_id ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
    echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Delete?\")'>Delete</a><hr>";
}
?>
