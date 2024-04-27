<?php
    
    $hostname = "localhost";
    $username = "root";
    $dbname = "survey" ; 
    $password = "";
    $con=mysqli_connect($hostname,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
    $money = mysqli_real_escape_string($con, $_POST['money']);
    $income = mysqli_real_escape_string($con, $_POST['income']);
    $habit = mysqli_real_escape_string($con, $_POST['habit']);
    $donationUse = mysqli_real_escape_string($con, $_POST['donationUse']);
    $education = mysqli_real_escape_string($con, $_POST['education']);

// INSERT INTO `answer`(`donation`, `income`, `habit`, `reason`, `education`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    $sql="INSERT INTO  `answer`(`donation`, `income`, `habit`, `reason`, `education`)  VALUES ('$money','$income', '$habit', '$donationUse','$education')";
        if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
        }
?>