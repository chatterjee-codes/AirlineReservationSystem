<?php
$link = mysqli_connect("localhost","root","","ars");

    session_start();
    if(!isset($_SESSION['emailid']))
    {
        header("location:customerLogin.php");
    }


if(isset($_POST['sbt']))
{
    $pnrno = $_POST['pnr'];
    $rs = @mysqli_query($link, "select f.departuretime, f.arrivaltime,f.flightno, f.flightname, cd.pnrno 
                                from flightmaster f,classmaster c,customerdetails cd where
                                c.classid=cd.classid and f.flightno=cd.flightno and cd.pnrno=$pnrno");
    $row = @mysqli_fetch_array($rs);
}
?>
<!-- echo flight details here -->
<html lang="en">
<head>
  <title>Flight Status</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	<div class="container">
  <h2 class="jumbotron" align="center">Flight Status</h2>  
<form method = "post">  
  <div class="table-responsive">
  <a href="userHomePage.php" style="color: blue;font-size: 18px;">&lt;&lt;Back to HomePage</a><br /><br /><br /><br />          
  <table class="table">
    <tr>
        <th>Enter PNR no.</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="pnr" value="<?php 
            if(isset($row)&& $pnrno==$row[4]){echo $row[4];} 
            else if(isset($_POST['sbt'])) 
                echo "Invalid PNR number" ?>" required="" />
		</div>
        <button class="btn btn-primary"type="submit" name="sbt" >Submit</button>
		
		</td>
        
      </tr>
      <tr>
        <th>Flight Number</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="fno" value="<?php if(isset($row)){echo $row[2];} ?>" disabled />
		</div>
		
		</td>
      </tr>
	  <tr>
        <th>Flight Name</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="fname" value="<?php if(isset($row)){echo $row[3];} ?>" disabled />
		</div>
		
		</td>
      </tr>
      <tr>
        <th>Departure Time</th>
        <td>
        
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="deptime" value="<?php if(isset($row)){echo $row[0];} ?>" disabled />
		</div>
		
		</td>
      </tr>
	  <tr>
        <th>Arrival Time</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="arrtime" value="<?php if(isset($row)){echo $row[1];} ?>" disabled />
		</div>
		
		</td>
      </tr>
	  
	   
      <tr>
        <th>Flight Duration</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="fdur" value="<?php 
            if(isset($row))
            {
                echo abs((strtotime($row[0])-strtotime($row[1]))/60),"&nbsp;Mins";
            } 
            ?>" disabled />
		</div>
		
		</td>
      </tr>
	   
	   
  </table>
  </div>
</div>
</form>

</body>
</html>

