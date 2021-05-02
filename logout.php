
<?php
    session_start();
    if(isset($_SESSION['emailid']))
    {
        unset($_SESSION['emailid']);
        setcookie("classid","",time()-86400);
        header("location:customerlogin.php");
    }
    else
        {
            header("location:customerlogin.php");
        }

?>