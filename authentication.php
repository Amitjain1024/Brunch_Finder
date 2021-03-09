<?php   

session_start();    
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
      setcookie ("username",$_POST['username'],time()+ 3600);

      setcookie ("password",$_POST['password'],time()+ 3600);
$username = $_COOKIE['username'];
$password = $_COOKIE['password'];

        $sql = "select * from register where username = '$username' and password = '$password'"; 

 
              
            

        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: dashboard.php"); 
            exit; 
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  