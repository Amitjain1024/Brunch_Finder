<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

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
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-xs-2 sidenav">
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-xs-7 text-left"> 
      <h1>Your Venue</h1><br>
      
      

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
        echo "<table style='background-color:lightyellow'>";
            echo "<tr>";
                  echo "<th>Start</th><th> </th>";
                echo "<th>End</th> <th> </th>";
                echo "<th>Description</th><td> </th>";
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

$sql = "SELECT id, eventname, Description FROM addevent";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div style='background-color:lightgreen'>id: " . $row["id"]. " - Name: " . $row["eventname"]. " " . $row["Description"]. "<br></div>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>

      <h3>          </h3>
      <p>            </p>

    </div>
    <div class="col-xs-3 sidenav">
     <div id="res_widget" class="widget_wrap" style="width:315px;height:320px;"><div style="z-index:2;display:block;margin:0px;padding:0px;box-sizing:border-box;text-align:center; position:relative; font-size: 12px;"><a href="https://www.zomato.com//$str?utm_source=referral-widget-18872621&utm_medium=restaurant_information_badge&utm_campaign=widget-business" target="_newtab" style="text-decoration: none;color : #252525; font-size:12px; font-family: 'Avenir Next', 'Helvetica Neue', Helvetica, Segoe UI, Arial, sans-serif; background: url(https://b.zmtcdn.com/images/widgets/zlogo_20.png) #fff left center no-repeat; display:block; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; text-align:left; line-height: 20px; padding:0 8px 0 28px; position:absolute; top:20px; left:10px;" id="zomatoRestaurantWidget_btn">Bookmark us on Zomato</a></div><iframe id="res_widget_frame" src="https://www.zomato.com/widgets/restaurant_widget_reviews_frame.php?show_menu=1&show_reviews=0&res_id=18872621&height=615&language_id=1" style="display:block;width:100%;height:100%;" border="0" frameborder="0"></iframe></div>
      </div>
    </div>
  </div> 
    </div>


</body>
</html>
