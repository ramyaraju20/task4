<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

// Ensure only owner can edit
$result = $conn->query("SELECT * FROM posts WHERE id=$id AND user_id=$user_id");
if ($result->num_rows == 0) {
    die("You are not allowed to edit this post.");
}
$post = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);

    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id AND user_id=$user_id";
    if ($conn->query($sql)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<form method="POST">
    Title: <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br>
    Content: <textarea name="content" required><?php echo htmlspecialchars($post['content']); ?></textarea><br>
    <button type="submit">Update</button>
</form>
