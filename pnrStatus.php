<?php
$link = mysqli_connect("localhost","root","","ars");

    session_start();
    if(!isset($_SESSION['emailid']))
    {
        header("location:customerLogin.php");
    }


?>
<!-- echo flight details here -->
<html lang="en">
<head>
  <title>Check PNR Status</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	<div class="container">
  <h2 class="jumbotron" align="center">Flight Details</h2>  
<form method = "post">  
  <div class="table-responsive">
  <a href="userHomePage.php" style="color: blue;font-size: 18px;">&lt;&lt;Back to HomePage</a><br /><br /><br /><br />          
  <table class="table">
    
      <tr>
        <th>PNR No.</th>
        <td>
			
		<div class="col-sm-8">
			<input type="text" class="form-control" name="pnr" placeholder="enter your pnr number"required="">
		</div>
		
		</td>
      </tr>
	  
	  
	  <tr>
			<td colspan = "2">
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="sbt" class="btn btn-default">View Status &nbsp;</button>
				</div>
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
    if(isset($_POST['sbt']))
    {
        $pnrno = $_POST['pnr'];
        $rs0 = @mysqli_query($link, "select cd.pnrno,f.flightno from flightmaster f, customerdetails cd where f.flightno=cd.flightno and cd.pnrno=$pnrno" );
        $rs = @mysqli_query($link, "select f.flightno, f.flightname, c.classname from flightmaster f, classmaster c, customerdetails cd where cd.classid=c.classid and f.flightno=cd.flightno and cd.pnrno=$pnrno");
        $roww =  @mysqli_fetch_array($rs0);
        if($roww[0] != $pnrno || $roww[1] == null)
            echo "Invalid PNR number";
        else
        {
            while($row = @mysqli_fetch_array($rs))
    {
        
            echo "<div class=table-responsive>";       
    echo "<table class=table>";
  echo "<tr><th>Flight No.</th><th>Flight Name</th><th>Class</th><th>Reservation Status</th></tr>";
        echo "<tr>
        <td>
		<div class='col-sm-6'>
			$row[0]
		</div>
		</td>
        <td>
		<div class='col-sm-6'>
			$row[1]
		</div>
		</td>
        <td>
		<div class='col-sm-6'>
			$row[2]
		</div>
		</td>
        <td>
		<div class='col-sm-6'>
			Confirmed
		</div>
		</td>
       
        
      </tr>
      ";
        echo "</div>";       
        echo "</table>";
        }
        }
        
      }
?>
