<?php
include 'inc/connect.php';

// STORE SUBMITTED FORM VALUES AS VARIABLES
    $id = $_POST['taskId'];
      $taskTitle = $_POST['taskTitle'];
      $taskText = $_POST['taskText'];
       $taskTimeStamp = $_POST['timestamp'];
      $taskStatus = $_POST['taskStatus'];



// SQL UPDATE STATEMENT

$sql = "UPDATE tasks
SET taskTitle = '$taskTitle', taskText = '$taskText', timestamp = '$taskTimeStamp', taskStatus = '$taskStatus'
WHERE id='$id'";



// CHECK THE CONNECTION AND UPDATE
if ($conn->query($sql) === TRUE) {
    echo 'Task Successfully Updated';
} else {
    
    echo 'Uh oh There has been a problem!'. $conn->error;
}
$conn->close();
echo '<a href="index.php">Listings</a>';
header('Location: index.php');
die();