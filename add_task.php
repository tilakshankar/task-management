<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    $stmt = $conn->prepare("INSERT INTO tasks (task_name, description, due_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $task_name, $description, $due_date);

    if ($stmt->execute()) {
        echo "New task added successfully. <a href='dashboard.php'>View Tasks</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<form method="post" action="">
    <label>Task Name:</label>
    <input type="text" name="task_name" required>
    <label>Description:</label>
    <textarea name="description" required></textarea>
    <label>Due Date:</label>
    <input type="date" name="due_date">
    <input type="submit" value="Add Task">
</form>

<?php include 'includes/footer.php'; ?>
