<?php

include 'inc/connect.php';



// Check if form has been submited and process
if(isset($_POST['insert-entry'])){
    
//STORE FROM INPUT
 
    $taskTitle = $_POST['taskTitle'];
  $taskText = $_POST['taskText'];
  $taskTimeStamp = $_POST['timestamp'];
  $taskStatus = $_POST['taskStatus'];
 
    
   
  
    $sql = "INSERT INTO tasks ( taskTitle, taskText, timestamp, taskStatus) 
  VALUES ('$taskTitle', '$taskText', '$taskTimeStamp', '$taskStatus')";
    
  
   if($conn->query($sql) === TRUE){
    header('Location: index.php');
  }else{
    echo 'Error:'. $sql .'<br>'. $conn->error;
  }
  
  $conn->close();
}


include  'inc/header.php';
?>

<h2 class="page-heading">New Task</h2>



<div class="row">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="stacked-form">
        
      <div class="col-xs-12">
            <input type="text" id="taskTitle" name="taskTitle" placeholder="Task Title" required>
        </div>
      <div class="col-xs-12">
            <input type="text" id="taskText" name="taskText" placeholder="Task Description">
        </div>
       
      <div class="col-xs-12">
            <input type="text" id="timestamp" name="timestamp" placeholder="Time Stamp">
        </div>
      <div class="col-xs-12">
            
         <select name="taskStatus" id="taskStatus">
    <option value="0" selected="selected">Select Status</option>
    <option value="Active">Active</option>
    <option value="In progress">In progress</option>
    <option value="finishing">Finishing</option>
    <option value="Completed">Completed</option>
  </select>
      
        </div>
        <div class="col-xs-12">
           <input type="submit" name="insert-entry" value="Add"> 
        </div>
    </form>      
</div>
 <p>
      <a class="button-light-blue" href="index.php">Listings</a>
    </p>


<?php

include  'inc/footer.php';
?>