<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
$result = $conn->query("SELECT * FROM tasks");
echo "<table>";
echo "<tr><th>Task Name</th><th>Description</th><th>Due Date</th><th>Status</th><th>Actions</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['task_name']}</td>
            <td>{$row['description']}</td>
            <td>{$row['due_date']}</td>
            <td>{$row['status']}</td>
            <td><a href='edit_task.php?id={$row['id']}'>Edit</a> | <a href='delete_task.php?id={$row['id']}'>Delete</a></td>
          </tr>";
}
echo "</table>";
$conn->close();
?>

<?php include 'includes/footer.php'; ?>
