<?php
// Include the database connection file
include('../includes/db.php');

// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_id = $_POST['login_id'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT * FROM admin_access WHERE agent_login_id = :login_id LIMIT 1");
    $stmt->bindParam(':login_id', $login_id);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        if (password_verify($password, $admin['agent_password'])) {
            $_SESSION['admin'] = $admin['agent_name'];
            $_SESSION['agent_id'] = $admin['agent_id'];
            $_SESSION['agent_login_id'] = $admin['agent_login_id'];
            $_SESSION['agent_market'] = $admin['agent_market'];
            $_SESSION['agent_leader'] = $admin['agent_leader'];
            
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid login ID or password!";
        }
    } else {
        $error = "Invalid login ID or password!";
    }
}
?>

<?php include('../includes/header.php'); ?>
<div class="login-container">
    <div class="login-box">
        <!-- Add a logo -->
        <div class="logo-container">
            <img src="/assets/img/logo.png" alt="Ken Group Logo" class="logo">
        </div>

        <h2 class="text-center mb-4">Admin Login</h2>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="login_id" class="form-label">Login ID</label>
                <input type="text" id="login_id" name="login_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
        <?php if (isset($error)) echo "<p class='text-danger mt-3 text-center'>$error</p>"; ?>
    </div>
</div>
<?php include('../includes/footer.php'); ?>