<?php
    session_start();
    $propertyId = $_GET['propertyId'];
    $date_from = $_GET['checkIn'];
    $date_to = $_GET['checkOut'];
    $price = $_GET['price'];
    $numOfGuests = $_GET['numOfGuests'];
    $totalPrice = $numOfGuests * $price;
    $userId = $_SESSION['userId'];
    require_once('databaseConn.php');
    $queryUserId = "SELECT userId FROM tbl_users WHERE userId = '$userId'";
    
    $query =  "INSERT INTO tbl_reservation (propertyId, date_from, date_to, amountPaid, userId) VALUES ('$propertyId', '$date_from', '$date_to', '$totalPrice', '$userId')";
    $result = mysqli_query($connection, $query)
        or die("Error in query: ". mysqli_error($connection));
    header('Location: index.php');
?>