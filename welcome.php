<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('location:login.php');
    exit();
} 

$name = $_SESSION['name'];

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Your HTML head content here -->
</head>
<body>
    <!-- Your HTML body content here -->
    <p>Welcome, <?php echo $name; ?>!</p>
    
    <form method="post" action="">
        <button class="btn btn-info" style="border: 1px solid success; border-radius: 10px;" name="logout">
            Logout
        </button>
    </form>
</body>
</html>
