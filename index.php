<!DOCTYPE html>   
<html>   
    <head>   
      <title>Geolocation API</title> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
     </head>   
    <body style="background-color:#ffffe0" onload="getlocation()"  >  
<div class="container">
    <div class="row">
<div class="col-xs-14">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><B>Brunch Finder</B></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home Page</a></li>
        </ul>
         <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info navbar-btn " data-toggle="modal" data-target="#myModal">Search</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Search Your Resturents</h4>
        </div>
        <div class="modal-body">
          <p> <div class="widget_wrap" style="width:500px;height:797px;display:inline-block;"><iframe src="https://www.zomato.com/widgets/res_search_widget.php?city_id=39&theme=red" style="position:relative;width:100%;height:100%;" border="0" frameborder="0"></iframe></div>         </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
   
</div> <span>  
       <ul class="nav navbar-nav navbar-right">
      <li><a href="Registerd.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
    </ul>
  </div></span>
</nav>
</div>
  </div>
     </div>
     <!-- location -->
       <div class="row">
       	<div class="col-xs-4">
       		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="food.jpg" alt="food" height="600px" width="500px">
      <div class="carousel-caption">
        <h3>Rajisthani</h3>
        <p>so much tastey!</p>
      </div>
    </div>

    <div class="item">
      <img src="https://images.pexels.com/photos/3807397/pexels-photo-3807397.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="fo" height="680px" width="600px">
      <div class="carousel-caption">
        <h3>South Indian</h3>
        <p>Thank you,god!</p>
      </div>
    </div>

    <div class="item">
      <img src="https://image.shutterstock.com/image-photo/breakfast-brunch-table-filled-all-600w-1170504556.jpg" alt="f" height="680px" width="600px">
      <div class="carousel-caption">
        <h3>North Indian</h3>
        <p>We love the Desi food!</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       	</div>


  <div class="col-xs-7" style="background-color:#f8c471" >
       <h3 style="color:brown ">Your Location on Map</h3>   
       
</div>
        <br>  
        <div id="demo" style="width: 803px; height:500px;  "></div></div>   
         
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyCHdhuFfZLlQUtoZz9F8CjltA5EkNkb4E4&libraries=places"async></script>   
          
        <script type="text/javascript">   
        function getlocation(){   
            if(navigator.geolocation){   
                navigator.geolocation.getCurrentPosition(showPos, showErr);   
            }  
            else{  
                alert("Sorry! your Browser does not support Geolocation API")  
            }  
        }   
        //Showing Current Poistion on Google Map  
        function showPos(position){   
            latt = position.coords.latitude;   
            long = position.coords.longitude;   
            var lattlong = new google.maps.LatLng(latt, long);   
            var myOptions = {   
                center: lattlong,   
                zoom: 14,   
                mapTypeControl: true,
                navigationControlOptions: {style:google.maps.NavigationControlStyle.LARGE}   
            }   
            var maps = new google.maps.Map(document.getElementById("demo"), myOptions);   
            var marker = new google.maps.Marker({position:lattlong, map:maps,animation:google.maps.Animation.BOUNCE,title:"Check Naerby Restaurent!"}); 

           
    const infowindow = new google.maps.InfoWindow({
      content:"<a href='index1.html'><h5>Check Nearby Restaurents!</h5></a>"
    });
  
  infowindow.open(maps,marker);  
        }   
  
        //Handling Error and Rejection  
             function showErr(error) {  
              switch(error.code){  
              case error.PERMISSION_DENIED:  
             alert("User denied the request for Geolocation API.");  
              break;  
             case error.POSITION_UNAVAILABLE:  
             alert("USer location information is unavailable.");  
            break;  
            case error.TIMEOUT:  
            alert("The request to get user location timed out.");  
            break;  
           case error.UNKNOWN_ERROR:  
            alert("An unknown error occurred.");  
            break;  
           }  
        }        </script>   
    </body>   
</html>       
