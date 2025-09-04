
<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM posts WHERE id=$id AND user_id=$user_id";
$conn->query($sql);

header("Location: dashboard.php");
exit;
