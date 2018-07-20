<?php
include 'inc/connect.php';

$id = $_GET['id'];

$sql = "DELETE 
        FROM tasks 
        WHERE id=" .$id;
        


if ($conn->query($sql) === TRUE) {
   echo 'The task has been Completed!';
}else{
  echo 'There was an error'. $conn->error;
}
  $conn->close();

echo '<a href="index.php"> Back to Tasks Page</a>'; 
header('Location: index.php');
die();
?>

