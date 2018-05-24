<?php
    session_start();
    $userId = $_GET['userId'];
    require_once('databaseConn.php');


    $query = "DELETE FROM tbl_reservation WHERE userId = '$userId'";
    $result = mysqli_query($connection, $query)
                or die("Error in query: ". mysqli_error($connection));

    $query2 = "DELETE FROM tbl_property WHERE userId = '$userId'";
    $result2 = mysqli_query($connection, $query2)
                or die("Error in query: ". mysqli_error($connection));

    $query3 = "DELETE FROM tbl_users WHERE userId = '$userId'";
    $result3 = mysqli_query($connection, $query3)
                or die("Error in query: ". mysqli_error($connection));

    header('Location: index.php');
?>       