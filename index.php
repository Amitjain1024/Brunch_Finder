<?php

// Starting the session, to use and 
// store data in session variable 
session_start(); 

// If the session variable is empty, this 
// means the user is yet to login 
// User will be sent to 'login.php' page 
// to allow the user to login 
if (!isset($_SESSION['username'])) { 
	$_SESSION['msg'] = "You have to log in first"; 
	header('location: login.php'); 
} 

// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 
if (isset($_GET['logout'])) { 
	session_destroy(); 
	unset($_SESSION['username']); 
	header("location: login.php"); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
	<title>Homepage</title> 
	<link rel="stylesheet" type="text/css"
					href="styles.css"> 
					<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> 
<body> 
	<div class="header"> 
		<h3>DASHBOARD</h3> 
	</div> 
	<div class="content"> 

		<!-- Creating notification when the 
				user logs in -->
		
		<!-- Accessible only to the users that 
				have logged in already -->
		<?php if (isset($_SESSION['success'])) : ?> 
			<div class="error success" > 
				<h3> 
					<?php
						echo $_SESSION['success']; 
						unset($_SESSION['success']); 
					?> 
				</h3> 
			</div> 
		<?php endif ?> 

		<!-- information of the user logged in -->
		<!-- welcome message for the logged in user -->
		<?php if (isset($_SESSION['username'])) : ?> 
			<p> 
				Welcome 
				<strong> 
					<?php echo $_SESSION['username']; ?> 
				</strong> 


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Brunch Finder</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="addv.php">ADD Venue</a></li>
        <li><a href="event.php">ADD Event</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
   
     
      <h4>Your Venue</h4>
      
      

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "brunchfinder");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 #$username = $_REQUEST["user"];
// Attempt select query execution
$sql = "SELECT * FROM venue LEFT JOIN register ON venue.id =register.id ORDER BY venue.start";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table style='background-color:yellow'>";
            echo "<tr>";
                  echo "<th>Start</th><th>/</th>";
                echo "<th>End</th><th>/</th>";
                echo "<th>Description</th><td>/</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                      echo "<td>" . $row[1] . "</td><td>/</td>";
                echo "<td>" . $row[2] . "</td><td>/</td>";
                echo "<td>" . $row[3] . "</td><td>/</td>";
                echo "<td>" . $row[4] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

echo " <h1>Event</h1>";

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

$sql = "SELECT id, eventname, Description,venue FROM addevent";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div style='background-color:lightgreen'>id: " . $row["id"]. " - Name: " . $row["eventname"]. " " . $row["Description"]. " mob" . $row["venue"]."</div>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>

			 
			
				<a href="index.php?logout='1'" style="color: red;"> 
					Click here to Logout 
				</a> 
			 
		<?php endif ?> 
	 
</div>
</body> 
</html> 
