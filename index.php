<html>
    <head>
        <title>Welcome to BOOK-my-FLIGHT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="index.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script type="text/javascript">
        function adminLogin()
        {
            window.open("adminLogin.php","Login","width=550,height=400,left=150,top=150");
        }
        function customerLogin()
        {
            location.href = "customerLogin.php";
        }
    </script>
        
    </head>
    <body class="">
        <div id="myCarousel" class="carousel slide container-fluid" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="img1.jpg" alt="image1" width="100%" >
    </div>

    <div class="item">
      <img src="img2.jpg" alt="image2" width="100%">
    </div>

    <div class="item">
      <img src="img3.jpg" alt="image3" width="100%">
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
    <br />
    <br />
    
    
    <div class="responsive" id="div1"> 
		<div class="col-sm-3" id="div2">
			<button type="submit" name="clogin" class="btn btn-default" onclick="customerLogin();">Login as Customer</button>
            <br />
            <a href="signUp.php" style="color: aliceblue;">Dont have an account? Sign up</a>
		</div>
	<div class="col-sm" id="div3">
			<button  name="alogin" class="btn btn-default" onclick="adminLogin();">Login as Admin</button>
		</div>
	</div>
    
    <div id="div4">
        <p>&copy;bookmyFLIGHT 2017</p>
    </div>
    
    
    
    </body>
</html>