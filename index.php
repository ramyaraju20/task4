<?php
include 'config.php';

$result = $conn->query("SELECT posts.*, user.username FROM posts 
                        JOIN user ON posts.user_id=user.id 
                        ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    echo "<small>By " . htmlspecialchars($row['username']) . " at " . $row['created_at'] . "</small><hr>";
}
echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
?>
