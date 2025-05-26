<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file("students.xml");
    $newStudent = $xml->addChild("student");
    $newStudent->addAttribute("id", uniqid());
    $newStudent->addChild("name", $_POST["name"]);
    $newStudent->addChild("age", $_POST["age"]);
    $newStudent->addChild("gender", $_POST["gender"]);
    $newStudent->addChild("location", $_POST["location"]);
    $xml->asXML("students.xml");
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System - Add</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Student Management System</h1>
    <h2>Add New Student</h2>
    <form method="POST" class="form">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required />
        </div>

        <div class="form-group">
            <label>Age:</label>
            <input type="number" name="age" required />
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <select name="gender" required>
                <option value="" disabled selected>Select gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" required />
        </div>

        <div class="form-actions">
            <input type="submit" value="Add" class="btn" />
            <a href="index.php" class="btn">Back to List</a>
        </div>
    </form>
</div>
</body>
</html>
