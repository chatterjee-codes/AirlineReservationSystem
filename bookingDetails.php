<?php

session_start();
$link = mysqli_connect("localhost","root","","ars");
if(isset($_SESSION['emailid']))
{
    $rs = mysqli_query($link, "select customername, passportid, flightno, pnrno from customerdetails where emailid='$_SESSION[emailid]' and pnrno!=0");
    $row = mysqli_fetch_array($rs);
    
    
}
?>
<html lang="en">
<head>
  <title>Booking Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	

<div class="container">
  <h2 class="jumbotron" align="center">Ticket Booked Sucessfully</h2>  
<form method = "post">  
  <div class="table-responsive">  
 <a href="userHomePage.php" style="color: blue;font-size:18px;" >&lt;&lt;Back to HomePage</a><br /><br /><br /><br />                  
  <table class="table">
    
      <tr>
        <th>Customer Name</th>
        <td>
			
		<div class="col-sm-8">
			<input type="text" class="form-control" value="<?php if(isset($row))echo $row[0]; ?>" disabled />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Passport-ID</th>
        <td>
		
			
		<div class="col-sm-8">
			<input type="text" class="form-control" value="<?php if(isset($row))echo $row[1]; ?>" disabled />
		</div>
		
		</td>
      </tr>
	  <tr>
        <th>Flight No</th>
        <td>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="<?php if(isset($row))echo $row[2]; ?>"  disabled />
		</div>
		</td>
      </tr>
	  
	  <tr>
        <th>PNR no</th>
        <td>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="<?php if(isset($row))echo $row[3]; ?>"  disabled />
			
		</div>
		</td>
      </tr>
      <td colspan="2">
		<div class="col-sm-8">
			<p>**Note this PNR no. for further queries</p>
			
		</div>
		</td>
      </tr>
	  
	  
      
    
  </table>
  </div>
</div>
</form>

</body>
</html>
<?php
    
?>
