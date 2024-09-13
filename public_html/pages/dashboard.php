<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
include('../includes/header.php');
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <h2 class="text-center">Welcome, <?php echo $_SESSION['user']; ?>!</h2>
            <p class="text-center">This is your dashboard. You can manage users or logout from here.</p>
            <div class="d-grid gap-2 mt-4">
                <a href="users.php" class="btn btn-primary btn-lg">Manage Users</a>
                <a href="login.php" class="btn btn-secondary btn-lg">Logout</a>
            </div>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
