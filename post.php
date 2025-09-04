
<?php
require 'config.php';
?>

<h2>All Blog Posts</h2>
<?php
$stmt = $pdo->query("SELECT posts.*, user.username FROM posts JOIN user ON posts.user_id = user.id ORDER BY created_at DESC");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
    echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
    echo "<small>By " . htmlspecialchars($row["username"]) . " on " . $row["created_at"] . "</small><hr>";
}

if (isset($_SESSION["user_id"])) {
    echo "<a href='dashboard.php'>Go to Dashboard</a>";
} else {
    echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
}
?>
