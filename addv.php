<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial;
  color:Black;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #111;
}

.right {
  right: 0;
  background-color: white;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 150px;
  border-radius: 50%;
}
</style>
</head>
<body>

<div class="split left">
      <img src="addvm.jpg" alt="add" height="900px" width="1000px">
    
      
</div>

<div class="split right" style="background-color:cyan  ">
<div class="centered">
  <?php


// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A");
?>
 <h1>Add Venue</h1> 

		<form action="addvenue.php" method="post"> 
			
			<p> 
				<label for="firstName">Start:</label> 
				<input type="text" name="first_name" id="firstName" required> 
			</p> 


			
			<p> 
				<label for="lastName">End:</label> 
				<input type="text" name="last_name" id="lastName" required> 
			</p> 


			<p> 
				<label for="comment"> Description:</label> 
				                
                <textarea name="comment" id="comment" rows="5" type="Description" placeholder="Enter text..."></textarea>
			 
</p>
			
			 <p>
				<label for="emailAddress"> Enter Address:</label> 
				<input type="Address" name="email" id="emailAddress"> 
			 </p>

			
			<input type="submit" value="Submit" style="color:red;background-color:lightgrey"> 
		</form>    
    
   </div>
    
  </div>

     
</body>
</html> 
