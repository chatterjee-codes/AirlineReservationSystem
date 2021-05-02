<?php
    session_start();
    $link = mysqli_connect("localhost","root","","ars") or die("Connection failed");

?>
<html lang="en">
<head>
  <title>Admin login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	

<div class="container">
  <h2 class="jumbotron" align="center">Admin Login</h2>  
<form method = "post">  
  <div class="table-responsive">          
  <table class="table">
    
      <tr>
        <th>Username</th>
        <td>
			
		<div class="col-sm-8">
			<input type="text" class="form-control" name="aname" placeholder="enter username" autofocus="">
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Password</th>
        <td>
		
			
		<div class="col-sm-8">
			<input type="password" class="form-control" name="apass" placeholder="enter password">
		</div>
		
		</td>
      </tr>
	 
	  
	  <tr>
			<td colspan = "2">
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="alogin" class="btn btn-default">Sign in</button>
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
    if(isset($_POST['alogin']))
    {
        $aname = $_POST['aname'];
        $apass = $_POST['apass'];
        $qry = "select adminid from admindetails where adminname='$aname' and password = '$apass'";
        $rs = mysqli_query($link,$qry);
        if($row = mysqli_fetch_array($rs))
        {
            $_SESSION['adminid'] = $row[0];
            header("location:adminControl.php");
        }
        else
        {
            echo"<script> alert('invalid username or password');</script>";
        }   
    }
    
?>
