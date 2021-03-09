<?php 

	$host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "brunchfinder";  
      
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
		 
		$first_name = $_REQUEST['first_name']; 
		$last_name = $_REQUEST['last_name']; 
		$address = $_REQUEST['comment']; 
		$email = $_REQUEST['email']; 
		
		 
		$sql = "INSERT INTO `venue` (`id`, `Start`, `Stop`, `gender`, `address`, `email`) VALUES (NULL, '$first_name', '$first_name', ' ', '$address ', '')"; 

					
		if(mysqli_query($conn, $sql)){ 
			header("Location:dashboard.php"); 
            exit;
		} else{ 
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn); 
		} 
		
			mysqli_close($conn); 
		?> 
	 
