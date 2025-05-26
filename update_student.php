<?php
$xml = simplexml_load_file("students.xml");
$id = $_GET['id'];

foreach($xml->student as $student) {
    if ($student['id'] == $id) {
        $currentStudent = $student;
        break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentStudent->name = $_POST["name"];
    $currentStudent->age = $_POST["age"];
    $currentStudent->gender = $_POST["gender"];
    $currentStudent->location = $_POST["location"];
    $xml->asXML("students.xml");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System - Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Student Management System</h1>
    <h2>Update Student</h2>
    <form method="POST" class="form">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $currentStudent->name; ?>" required />
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" value="<?php echo $currentStudent->age; ?>" required />
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <select name="gender" required>
                <option value="Male" <?php echo ($currentStudent->gender == "Male") ? "selected" : ""; ?>>Male</option>
                <option value="Female" <?php echo ($currentStudent->gender == "Female") ? "selected" : ""; ?>>Female</option>
                <option value="Other" <?php echo ($currentStudent->gender == "Other") ? "selected" : ""; ?>>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" value="<?php echo $currentStudent->location; ?>" required />
        </div>

        <div class="form-actions">
            <input type="submit" value="Update" class="btn" />
            <a href="index.php" class="btn">Back to List</a>
        </div>
    </form>
</div>
</body>
</html>
