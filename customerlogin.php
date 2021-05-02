<?php
    session_start();
    $link = mysqli_connect("localhost","root","","ars") or die("Connection failed");

?>
<html lang="en">
<head>
  <title>Customer login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="bg.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class = "container">
	
	

<div class="container">
  <h2 class="jumbotron" align="center">Login to Book your Flight</h2>  
<form method = "post">  
  <div class="table-responsive">          
  <table class="table">
    
      <tr>
        <th>Email-id</th>
        
        <td>
			
		<div class="col-sm-8">
		
	
   
    <input type="text" class="form-control" name="cname" placeholder="enter email" autofocus="" required="" />
		</div>
		
		</td>
      </tr>
	  
	  <tr>
        <th>Password</th>
        <td>
		
			
		<div class="col-sm-8">
			<input type="password" class="form-control" name="cpass" placeholder="enter contact no." required="" />
		</div>
		
		</td>
      </tr>
	 
	  
	  <tr>
			<td colspan = "2">
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="clogin" class="btn btn-default">Sign in</button>
				</div>
			</div>
			</td>
	  </tr>
      
    
  </table>
  </div>
  <a href="signUp.php" style="color: black;"><u>Don't have an account? Signup now.</u></a><br /><br /><a href="adminLogin.php"style="color: black;"><u>Login as Admin</u></a>
</div>
</form>

</body>
</html>
<?php
    if(isset($_POST['clogin']))
    {
        $email = $_POST['cname'];
        $no = $_POST['cpass'];
        $qry = "select emailid from customerdetails where emailid='$email' and contactno = '$no'";
        $rs = mysqli_query($link,$qry);
        if($row = mysqli_fetch_array($rs))
        {
            $_SESSION['emailid'] = $row[0];
            header("location:userHomePage.php");
        }
        else
        {
            echo"<script> alert('invalid username or password');</script>";
        }   
    }
    
?>
