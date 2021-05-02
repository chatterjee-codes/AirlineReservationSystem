<?php
$link = mysqli_connect("localhost","root","","ars");

    session_start();
    if(!isset($_SESSION['emailid']))
    {
        header("location:customerLogin.php");
    }


?>
<!-- Check if pnr no is availabe, if not alert invalid pnr number -->
<html lang="en">
<head>
  <title>Flight Cancellation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	<div class="container">
  <h2 class="jumbotron" align="center">Fillup the details to cancel your flight</h2>  
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
						<button type="submit" name="cancel" class="btn btn-default">Cancel Flight &nbsp;</button>
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
    if(isset($_POST['cancel']))
    {
       $pnrno = $_POST['pnr'];
       $rs = @mysqli_query($link,"select pnrno, flightno from customerdetails where pnrno=$pnrno");
       $row = @mysqli_fetch_array($rs);
       
        
        if($row[0] == $pnrno && $row[1]!=null)
        {  @mysqli_query($link,"delete from customerdetails where pnrno=$pnrno");
                echo "<p style='font-size:18px;'>Your ticket is cancelled. Refund is in process.</p>";
        }
        else
         echo "<p style='font-size:18px;'>Invalid PNR number</p>";
            
            
        
    }
?>
