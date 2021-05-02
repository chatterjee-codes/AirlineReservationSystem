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
    $rs = @mysqli_query($link, "select f.sourceid, f.destinationid, f.departuretime, f.arrivaltime, fr.fare, c.classname,cd.pnrno,f.flightno
                                from flightmaster f, flightfaremap fr, classmaster c, customerdetails cd where
                                f.flightno = fr.flightno and fr.classid=c.classid and fr.classid=cd.classid and f.flightno=cd.flightno and cd.pnrno=$pnrno");
    $row = @mysqli_fetch_array($rs);
    
    
}
?>
<!-- echo flight details here -->
<html lang="en">
<head>
  <title>Booked Flights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	<div class="container">
  <h2 class="jumbotron" align="center">Fare Details</h2>  
<form method = "post">  
  <div class="table-responsive">   
  <a href="userHomePage.php" style="color: blue;font-size: 18px;">&lt;&lt;Back to HomePage</a><br /><br /><br /><br />        
  <table class="table">
        <tr>
        <th>Enter PNR no.</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="pnr" value="<?php 
            if(isset($row) && $pnrno == $row[6] && $row[7]!=null){echo $row[6];} 
            
            else if(isset($_POST['sbt']))
                echo "Invalid PNR number";
            
            ?>"  />
		</div>
        <button class="btn btn-primary"type="submit" name="sbt" >Submit</button>
		
		</td>
        
      </tr>
      <tr>
        <th>Source</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="src" value="<?php
                if(isset($row))
                {
                    $rs1 = mysqli_query($link, "select city from aerodrummaster where aerodrumid=$row[0]");
                    $rows = mysqli_fetch_array($rs1);
                    echo $rows[0];
                }
            
            ?>" disabled />
		</div>
		
		</td>
      </tr>
	  <tr>
        <th>Destination</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="dest" value="<?php
                if(isset($row))
                {
                    $rs2 = mysqli_query($link, "select city from aerodrummaster where aerodrumid=$row[1]");
                    $rowd = mysqli_fetch_array($rs2);
                    echo $rowd[0];
                }
            
            ?>" disabled />
		</div>
		
		</td>
      </tr>
	  
	  
	   <tr>
        <th>Fare Price</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="fprice" value="<?php if(isset($row)){echo "Rs.",$row[4];} ?>" disabled />
		</div>
		
		</td>
      </tr>
	   <tr>
        <th>Class</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="class" value="<?php if(isset($row)){echo $row[5];} ?>" disabled />
		</div>
		
		</td>
      </tr>
	  
	   <tr>
        <th>Status</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" value="<?php if(isset($row) && $pnrno == $row[6]&& $row[7]!=null){echo "Confirmed";}?>" disabled />
		</div>
		
		</td>
      </tr>
	   </table>
  </div>
</div>
</form>

</body>
</html>


