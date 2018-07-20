<?php
include 'inc/connect.php';
include  'inc/header.php';




$editId = $_GET['id'];
// SQL Statement 
$sql = "SELECT * FROM tasks WHERE id='$editId' LIMIT 1";
$result = $conn->query($sql);

if($result->num_rows > 0){
  
  // Display Results
  while($row = $result->fetch_assoc()){
  $id = $row['id'];
    $taskTitle = $row['taskTitle'];
    $taskText = $row['taskText'];
     $taskStatus =$row["taskStatus"];
    $taskTimeStamp = $row['timestamp'];
   
  }
} else {
   echo 'No result was found';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>SQL Insert</title>
  </head>
  <body>
    
    <!--HTML FORM HERE -->
    <form method="POST" action="update.php">
      <p>
        
      <p>
        <label for="taskTitle">Task Title</label><br>
        <input type="text" name="taskTitle" id="taskTitle" value="<?php echo $taskTitle; ?>">
      </p>
      <p>
        <label for="taskText">Task Description</label><br>
        <input type="text" name="taskText" id="taskText" value="<?php echo $taskText; ?>">
      </p>
      <p>
        <label for="timestamp">Time Stamp</label><br>
        <input type="text" name="timestamp" id="timestamp" value="<?php echo $taskTimeStamp; ?>">
      </p>
      
    <p>
     <select name="taskStatus" id="taskStatus">
    <option value="0" selected="selected">Select Status</option>
    <option value="Active"
    <?php 
       if($row["taskStatus"]=='Active')
       {
         echo "selected";
       }
          ?>  
    >Active</option>
    <option value="In progress"
    <?php        
        if($row["taskStatus"]=='In progress')
       {
         echo "selected";
       }    
            
          ?>  
            >In progress</option>
    <option value="finishing"
            <?php        
        if($row["taskStatus"]=='finishing')
       {
         echo "selected";
       }    
            
          ?>  
            
            
            >Finishing</option>
       
    <option value="Completed"
            
            <?php        
        if($row["taskStatus"]=='Completed')
       {
         echo "selected";
       }    
            
          ?>  
            
            >Completed</option>
  </select>
      </p>
      <p>
        <input type="hidden" name="taskId" value="<?php echo $id; ?>">
        <input type="submit" value="Submit" name="insert-entry">
      </p>
      
    </form>


<?php
include  'inc/footer.php';
?>