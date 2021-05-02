<?php
    
    $city = $_GET['city'];
    $link = mysqli_connect("localhost","root","","ars");
    $qry="select aerodrumid from aerodrummaster where city = '$city'"; 
    $rs = mysqli_query($link,$qry );
    if($row = mysqli_fetch_array($rs))
    echo $row[0];
    
    
?>