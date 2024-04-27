<?php
    
    $hostname = "localhost";
    $username = "root";
    $dbname = "survey" ; 
    $password = "";
    $con=mysqli_connect($hostname,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql="SELECT * FROM `basic_info` WHERE 1";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    else{
        echo '<div><table>';
        echo '<tr><td>NAME</td><td>ID</td><td>GENDER</td><td>BIRTH DAY</td><td>TIMESTAMP</td></tr>';
        while($row = mysqli_fetch_array($result)){
            $name = $row['name'];
            $id = $row['id'];
            $gender = $row['gender'];
            $birth = $row['birth'];
            $timestamp = $row['timestamp'];

            echo "<tr>";
            echo "<td>" . $name ."</td><td>" . $id . "</td><td>". $gender . "</td><td>" . $birth . "</td><td>" . $timestamp . "</td>";
            echo "<tr/>";
        }
        echo '</table></div>';
    }
?>