<?php
$link = mysqli_connect("localhost","root","","ars");
?>
<!-- echo flight details here -->
<html lang="en">
<head>
  <title>Admin: Add Flight</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  function displaycomp()
{
                var ajreq = new XMLHttpRequest();
                var value = document.getElementById("sel1").value;
                ajreq.open("GET","compHandler.php?companyname="+value, true);
                ajreq.send(null);
                ajreq.onreadystatechange = function()
                {
                    if(ajreq.readyState == 4)
                    {
                        var id = document.getElementById("compid");
                        id.value = ajreq.responseText;
                    }
                }
                
                
}
 function displaysrc()
{
                var ajreq = new XMLHttpRequest();
                var value = document.getElementById("sel2").value;
                ajreq.open("GET","srcHandler.php?city="+value, true);
                ajreq.send(null);
                ajreq.onreadystatechange = function()
                {
                    if(ajreq.readyState == 4)
                    {
                        var id = document.getElementById("sid");
                        id.value = ajreq.responseText;
                    }
                }
                
                
}
function displaydest()
{
                var ajreq = new XMLHttpRequest();
                var value = document.getElementById("sel3").value;
                ajreq.open("GET","srcHandler.php?city="+value, true);
                ajreq.send(null);
                ajreq.onreadystatechange = function()
                {
                    if(ajreq.readyState == 4)
                    {
                        var id = document.getElementById("did");
                        id.value = ajreq.responseText;
                    }
                }
                
                
}
        
  </script>
  
</head>
<body class = "container">
	
	<div class="container">
  <h2 class="jumbotron" align="center">Add new flights</h2>  
<form method = "post">  
  <div class="table-responsive"> 
  <a href="adminControl.php" style="color: azure;">&lt;&lt;Back to HomePage</a>         
  <table class="table">
    
      <tr>
        <th>Service Provider Company</th>
        <td>
			
		<div class="col-sm-6">
			<select name="comp" id="sel1"  onchange="displaycomp();">
			<option>Select Company</option>
			<?php
    
    $rs = mysqli_query($link, "select companyname from companymaster");
    
    while($row=mysqli_fetch_array($rs))
    {
        echo "<option>$row[0]</option>";
    }
    
    ?>	
			</select>
		</div>
		
		</td>
      </tr>
	  <tr>
        <th>Source</th>
        <td>
			
		<div class="col-sm-6">
			<select id="sel2" onchange="displaysrc();">
			<option>Select source</option>
			<?php
			 
    
    $rs = mysqli_query($link, "select city from aerodrummaster");
    
    while($row=mysqli_fetch_array($rs))
    {
        echo "<option>$row[0]</option>";
    }
    
    
			?>	
			</select>
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Destination</th>
        <td>
			
		<div class="col-sm-6">
			<select id="sel3" onchange="displaydest();">
			<option>Select destination</option>
			<?php
			   
    $rs = mysqli_query($link, "select city from aerodrummaster");
    
    while($row=mysqli_fetch_array($rs))
    {
        echo "<option>$row[0]</option>";
    }
			?>	
			</select>
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Company_ID</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="cid" id="compid"  />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Flight_no</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="fno" />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Flight_name</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="fname"  />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Source_ID</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="srcid" id="sid"  />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Destination_ID</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="destid" id="did"  />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Departure Time</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="deptime" placeholder="hh:mm:ss"  />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Arrival Time</th>
        <td>
			
		<div class="col-sm-6">
			<input type="text" class="form-control" name="arrtime" placeholder="hh:mm:ss"   />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Add Flight</th>
        <td>
			
		<div class="col-sm-4">
			<button type="submit" name="add" class="btn btn-success">Add</button>
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
    if(isset($_POST['add']))
    {
        $fno = $_POST['fno'];
        $fname = $_POST['fname'];
        $cid = $_POST['cid'];
        $srcid = $_POST['srcid'];
        $destid = $_POST['destid'];
        $deptime = $_POST['deptime'];
        $arrtime = $_POST['arrtime'];
         $qry = "insert into flightmaster values('$fno','$fname','$cid','$srcid','$destid','$deptime','$arrtime')";
         mysqli_query($link, $qry) or die(mysql_error());
        
         echo "Flight added";
    }

?>