<?php
$link = mysqli_connect("localhost","root","","ars");
?>
<!-- echo flight details here -->
<html lang="en">
<head>
  <title>Admin: Cancel Flight</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	<div class="container">
  <h2 class="jumbotron" align="center">Flight Cancellation</h2>  
<form method = "post">  
  <div class="table-responsive">   
  <a href="adminControl.php" style="color: azure;">&lt;&lt;Back to HomePage</a>            
  <table class="table">
    
      <tr>
        <th>Select Flight Number</th>
        <td>
			
		<div class="col-sm-6">
			<select id="sel" name="fno">
			<option>Select Flight-no.</option>
			<?php
			$rs = mysqli_query($link, "select flightno from flightmaster");
    
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
        <th>Delete Flight</th>
        <td>
			
		<div class="col-sm-4">
			<button type="submit" name="delete" class="btn btn-danger">Delete</button>
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
if(isset($_POST['delete']))
{
    $fno = $_POST['fno'];
    mysqli_query($link, "delete from flightmaster where flightno = $fno");
    echo "Flight deleted successfully";
}

?>

