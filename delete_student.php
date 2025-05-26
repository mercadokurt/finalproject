<?php
$xml = simplexml_load_file("students.xml");
$id = $_GET['id'];

$index = 0;
foreach($xml->student as $student) {
    if ($student['id'] == $id) {
        unset($xml->student[$index]);
        break;
    }
    $index++;
}

$xml->asXML("students.xml");
header("Location: index.php");
exit();
