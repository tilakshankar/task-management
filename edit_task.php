<?php include 'includes/header.php'; ?>
<?php include 'includes/db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM tasks WHERE id=$id");
    $task = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE tasks SET task_name=?, description=?, due_date=?, status=? WHERE id=?");
    $stmt->bind_param("ssssi", $task_name, $description, $due_date, $status, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
    <label>Task Name:</label>
    <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required>
    <label>Description:</label>
    <textarea name="description" required><?php echo $task['description']; ?></textarea>
    <label>Due Date:</label>
    <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>">
    <label>Status:</label>
    <select name="status">
        <option <?php echo ($task['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
        <option <?php echo ($task['status'] == 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
        <option <?php echo ($task['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
    </select>
    <input type="submit" value="Update Task">
</form>

<?php include 'includes/footer.php'; ?>
