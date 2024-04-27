<?php
    
    $hostname = "localhost";
    $username = "root";
    $dbname = "survey" ; 
    $password = "";
    $con=mysqli_connect($hostname,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);

    //INSERT INTO `basic_info`(`name`, `id`, `gender`, `birth`, `timestamp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    $sql="INSERT INTO  `basic_info`(`name`, `id`, `gender`, `birth`)  VALUES ('$name', '$id', '$gender','$dob')";
        if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
        }
?>