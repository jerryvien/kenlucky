<?php
include('../includes/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid login credentials!";
    }
}
?>

<?php include('../includes/header.php'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h2 class="text-center mb-4">Login</h2>
            <form method="POST" action="login.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
            <?php if (isset($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>
        </div>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
