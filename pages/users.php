<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include('../includes/db.php');
include('../includes/header.php');
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center mb-4">User Management</h2>
            <a href="add_user.php" class="btn btn-primary mb-3">Add New User</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $conn->query("SELECT * FROM users");
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>
                                    <a href='edit_user.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_user.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
