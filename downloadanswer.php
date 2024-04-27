<?php
    
    $hostname = "localhost";
    $username = "root";
    $dbname = "survey" ; 
    $password = "";
    $con=mysqli_connect($hostname,$username,$password,$dbname);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql="SELECT * FROM `answer` WHERE 1";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    else{
        echo '<div><table>';
        echo '<tr><td>DONATION</td><td>INCOME</td><td>HABIT</td><td>DONATION REASON</td><td>EDUCATION</td><td>TIMESTAMP</td></tr>';
        while($row = mysqli_fetch_array($result)){
            $donation = $row['donation'];
            $income = $row['income'];
            $habit = $row['habit'];
            $reason = $row['reason'];
            $education = $row['education'];
            $timestamp = $row['timestamp'];
            echo "<tr>";
            echo "<td>" . $donation ."</td><td>" . $income . "</td><td>". $habit . "</td><td>" . $reason . "</td><td>" . $education . "</td><td>" . $timestamp . "</td>";
            echo "<tr/>";
        }
        echo '</table></div>';
    }
?>