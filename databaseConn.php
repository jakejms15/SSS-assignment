<?php
    $connection = mysqli_connect("localhost", "root", "", "jakesalerno_4.2c", "3306");
        if (mysqli_connect_errno())
        {
            echo "Error: Could not connect to database. Please try again
            later";
            exit;
        } 
?>