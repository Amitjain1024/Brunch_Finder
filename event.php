<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "brunchfinder";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["email"]; 
	$password = $_POST["venue"]; 
	$cpassword = $_POST["e"];
	$mob = $_POST["m"];
  $time = $_POST["appt"];
$sql = "INSERT INTO addevent (eventname, venue, Description,mobno,timest)
VALUES ('$username', '$password', '$cpassword','$mob','$time')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("/Project" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "/Project" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }









}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row" style="background-color:orange">
  <div class="col-xs-12">Brunch finder</div>
  </div>
    <div class="row">
    <div class="col-xs-3 col-md-6" style="background-color:lightyellow;">
     <img class="img-responsive" src="https://images.unsplash.com/photo-1567123498814-e333c1aaa793?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="Chania" width="700" height="1100">
    </div>
    <div class="col-xs-9 col-md-6" style="background-color:#ffffe0;">
      <form action="event.php" method="post" enctype="multipart/form-data">
        <h2>Add Event</h2>

<div class="form-group">
             <span class="glyphicon glyphicon-glass"></span><input type="text" class="form-control" id="email" placeholder="Event Name" name="email" required>
        <p> <span class="glyphicon glyphicon-download-alt"></span><select name="venue" id="ven" class="form-control" placeholder="addvenue">
  <option value="pizza hut">pizza hut</option>
  <option value="dosa plaza">dosa plaza</option>
  <option value="dominos">dominos</option>
  <option value="hotel maan">hotel maan</option>
</select></p>
    <p>
   <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Event Type
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">Celebration</a></li>
      <li><a href="#">Party</a></li>
      <li><a href="#">Dinner</a></li>
    </ul>
  </div></p>
  <span class="glyphicon glyphicon-cutlery"></span><input type="Description" class="form-control" id="email" placeholder="Description" name="e">

<span class="glyphicon glyphicon-download-alt"></span>
        <label for="fileSelect">Choose file:</label>
        <input type="file" class="form-control" name="photo" id="fileSelect">
               <p><strong>Note:</strong>max size of 5 MB</p>
        <span class="glyphicon glyphicon-phone-alt"></span><input type="number" class="form-control" placeholder="Mobile no." name="m" required>

        <span class="glyphicon glyphicon-time"></span> <label for="app">Select Start and End time:</label>
  <input type="time" id="appt" name="appt">
  <input type="time" id="app" name="app"><br>
   <button type="submit" class="btn btn-success" value="Submit">GO</button></div>
    </form>
    </div>
  </div>
</body>
</html>


 