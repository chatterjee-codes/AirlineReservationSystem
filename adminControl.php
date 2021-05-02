<?php
    session_start();
    if(!isset($_SESSION['adminid']))
    {
        header("location:adminLogin.php");
    }
?>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	

<div class="container">
  <h2 class="jumbotron" align="center">Welcome Admin</h2> 
  <a href="logoutadmin.php"><button class="btn btn-danger btn-xs" >Logout </button></a> <br /><br />

  <div class="table-responsive">          
  <table class="table">
    
      <tr>
        <th>Add Flight</th>
        <td colspan = "2">
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="add" class="btn btn-primary" onclick="nxtpage0();">Add</button>
				</div>
			</div>
			</td>
      </tr>
	  
	  <tr>
        <th>Delete Flight</th>
       <td colspan = "2">
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="cancel" class="btn btn-danger" onclick="nxtpage1();">Delete</button>
				</div>
			</div>
			</td>
      </tr>
	 
	  
      
    
  </table>
  </div>
</div>

<script type="text/javascript">
    function nxtpage0()
    {
        location.href = "addFlight.php";
    }
    function nxtpage1()
    {
        location.href = "cancelFlight.php";
    }
</script>
</body>
</html>

