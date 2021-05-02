<?php
$link = mysqli_connect("localhost","root","","ars");

    session_start();
    if(!isset($_SESSION['emailid']))
    {
        header("location:customerLogin.php");
    }


?>
<html lang="en">
<head>
  <title>Flight Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    input :: -webkit-calendar-picker-indicator {
  display: none;
  } 
    .jumbotron{
        min-height: 30px;
        }
  </style>
</head>
<body class = "container">
	
	<div class="jumbotron">
		<h2 align="center">Search Flights</h2>							
	</div>
	
	<div class = "container-fluid">
	<a href="userHomePage.php" style="color: blue;font-size: 18px;" >&lt;&lt;Back to HomePage</a><br /><br /><br /><br />
		<form class="form-horizontal" method = "post">
	<div class="form-group">
			<label class="control-label col-sm-2" for="source">Enter Source:</label>
		<div class="col-sm-3">
            <input type="text" name="src"  class="form-control"  list="sel1"  placeholder="Select Source" required="" />
            
			<datalist id="sel1">
			
			<?php
			 
    
    $rs2 = mysqli_query($link, "select city from aerodrummaster");
    
    while($row2=@mysqli_fetch_array($rs2))
    {
        echo "<option>$row2[0]</option>";
    }
   
    
    
			?>	
			</datalist>
		</div>
	</div>
  <div class="form-group">
			<label class="control-label col-sm-2" for="source">Enter Destination:</label>
		<div class="col-sm-3">
			<input type="text" name="dest" class="form-control" list="sel2" placeholder="Select Destination" required="" />
            
			<datalist id="sel2">
			
			<?php
			 
    
    $rs = mysqli_query($link, "select city from aerodrummaster");
    
    while($row=@mysqli_fetch_array($rs))
    {
        echo "<option>$row[0]</option>";
    }
    
    
			?>	
			</datalist>
		</div>
	</div>
  <div class="form-group">
			<label class="control-label col-sm-2" for="source">Date of Journey:</label>
		<div class="col-sm-3">
			<input type="date" class="form-control" name="dat" id="d" required=""/>
		</div>
	</div>
	<div class="form-group">
			<label class="control-label col-sm-2" for="source">Select Class:</label>
		<div class="radio">
			<label><input type="radio" name="class" value="1"  />First Class</label>
			<label><input type="radio" name="class" value="2" />Business</label>
			<label><input type="radio" name="class" value="3"/>Economic</label>
		</div>
	</div>
  
	<div class="form-group"> 
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="search" class="btn btn-primary">Search &nbsp; <span class="glyphicon glyphicon-search"></span></button>
		</div>
	</div>
    
  
</form>
	</div>
    
</body>
</html>
<?php
    
    if(isset($_POST['search']))
    {
        
    $new_date = date('Y-m-d', strtotime($_POST['dat']));
    $dayid = date('w', strtotime($new_date));
    $src = $_POST['src'];
    $dest = $_POST['dest'];
    $classid = @$_POST['class'];
    @setcookie('classid',$_POST['class'], time() + 86400);
    $srcidtemp = mysqli_query($link,"select aerodrumid from aerodrummaster where city='$src'");
    $srcid = mysqli_fetch_array($srcidtemp);
    $destidtemp = mysqli_query($link,"select aerodrumid from aerodrummaster where city='$dest'");
    $destid = mysqli_fetch_array($destidtemp);
    
    
    $rs = mysqli_query($link,"select  f.flightname,cm.companyname,f.arrivaltime,f.departuretime, fr.fare,f.flightno from companymaster cm, flightmaster f, flightfaremap fr, aerodrummaster a,flightdaymap d, classmaster c where f.flightno=fr.flightno and fr.classid=c.classid and d.flightno=f.flightno and f.sourceid=a.aerodrumid and f.sourceid=a.aerodrumid and f.companyid=cm.companyid and f.sourceid=$srcid[0] and f.destinationid=$destid[0] and d.dayid=$dayid and c.classid=$classid");
    $rs1 = mysqli_query($link,"select  f.flightno,f.flightname,cm.companyname,f.arrivaltime,f.departuretime, fr.fare from companymaster cm, flightmaster f, flightfaremap fr, aerodrummaster a,flightdaymap d, classmaster c where f.flightno=fr.flightno and fr.classid=c.classid and d.flightno=f.flightno and f.sourceid=a.aerodrumid and f.sourceid=a.aerodrumid and f.companyid=cm.companyid and f.sourceid=$srcid[0] and f.destinationid=$destid[0] and d.dayid=$dayid and c.classid=$classid"); 
  $row0 = @mysqli_fetch_array($rs);
    if(!$row0)
        echo "No flights available";
    else
    {
        echo "<div class=table-responsive>";       
  echo "<table class=table>";
  echo "<tr><th>Flight No.</th><th>Flight Name</th><th>Company</th><th>Arival Time</th><th>Departure Time</th><th>Fare</th></tr>";
        while($row = @mysqli_fetch_array($rs1))
    {
        
        echo "<tr>
        <td>
		<div class='col-sm-6'>
			$row[0]
		</div>
		</td>
        <td>
		<div class='col-sm-8'>
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
			$row[3] <br/> $src
		</div>
		</td>
        <td>
		<div class='col-sm-6'>
			$row[4] <br/> $dest
		</div>
		</td>
        <td>
		<div class='col-sm-8'>
			Rs.$row[5] 
		</div>
		</td>
        <td>
		<div class='col-sm-6'>
            <form method='post'>
		     <a href='userDetails.php?fno=$row[0]'>Book</a>
             </form>
		</div>
		</td>
        
      </tr>
      ";
       
        
    }
    }
        
     
    echo "</div>";       
  echo "</table>";
  
     
    }
    //if(isset($_POST['book']))
//        {
//            
//          // setcookie('flightno',$row0[5], time() + 86400);
//            
//            header('location:userDetails.php');
//            
//        }
        
        
        
    
    
?>


