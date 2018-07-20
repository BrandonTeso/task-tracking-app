<?php
include 'inc/connect.php';
include  'inc/header.php';





?>
<link rel="stylesheet" type="text/css" href="app.css" />

<h2 class="page-heading">All Tasks</h2>

<?php


// SQL STATEMENT TO SELECT ALL TASKS THAT ARE ACTIVE 
$sql = "SELECT * FROM tasks";


// EXECUTE THE QUERY
$result = $conn->query($sql);

if($result->num_rows > 0){
    // While loop to display results
    while($row = $result->fetch_assoc()){


// OUTPUT RESULTS HERE MUST LIST ALL TASKS THAT ARE ACTIVE
      
      $taskTitle = $row['taskTitle'];
      $taskText = $row['taskText'];
       $taskTimeStamp = $row['timestamp'];
      $taskStatus = $row['taskStatus'];
      $taskId = $row['id'];
    
      echo '<div class="apple">';
      echo '<div class="row">';
      
      
        
      echo '<div class="col-xs-5">';
      echo $taskTitle;
        echo '</div>';
      echo '<div class="col-xs-3">';
          echo $taskStatus;
        echo '</div>';
      echo '<div class="col-xs-4">';
       echo '<a class="edit" href="edit.php?id='. $taskId .'">Edit Task</a>';
        echo '<a class="delete" href="delete.php?id='.$taskId .'"> Delete Task  &nbsp;	</a>';
      
   
      
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
} else {
  echo '0 Results Found ';
}
$conn->close();
echo '<br>';
echo '<a class="add" href="new.php">Add Task</a>';
?>


<?php
include  'inc/footer.php';
?>