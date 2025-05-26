<?php
$xml = simplexml_load_file("students.xml");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Student Management System</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
        <?php foreach($xml->student as $student): ?>
        <tr>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->age; ?></td>
            <td><?php echo $student->gender; ?></td>
            <td><?php echo $student->location; ?></td>
            <td>
                <div class="action-buttons">
                    <a href="update_student.php?id=<?php echo $student['id']; ?>" class="btn">Update</a>
                    <a href="delete_student.php?id=<?php echo $student['id']; ?>" class="btn" onclick="return confirm('Delete this student?')">Delete</a>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <a href="add_student.php" class="btn">Add Student</a>
    </div>
</div>
</body>
</html>
