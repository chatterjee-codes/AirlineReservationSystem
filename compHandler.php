<?php
    
    $compname = $_GET['companyname'];
    $link = mysqli_connect("localhost","root","","ars");
    $qry="select companyid from companymaster where companyname = '$compname'";
    $rs = mysqli_query($link,$qry );
    if($row = mysqli_fetch_array($rs))
    echo $row[0];
    
    
?>