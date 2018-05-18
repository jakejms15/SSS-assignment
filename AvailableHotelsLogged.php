<form action="insertReservation.php" method="post">
<?php 
    if(isset($_POST['Submit']))
    {
        $location = $_POST['location'];
        $checkIn = date('Y-m-d', strtotime($_POST['checkIn']));
        $checkOut = date('Y-m-d', strtotime($_POST['checkOut']));
        $numOfGuests = $_POST['numOfGuests'];
        require_once('databaseConn.php');
            
        $query = "SELECT * FROM tbl_property p LEFT JOIN tbl_reservation r
                        ON p.propertyId = r.propertyId
                        WHERE p.propertyId IN
                        (SELECT propertyId FROM tbl_property p JOIN tbl_location l 
                        ON p.locationId = l.locationId
                        WHERE l.location = '$location'
                        AND p.capacity >= '$numOfGuests')";
            
            $result = mysqli_query($connection, $query)
                    or die("Error in query: ". mysqli_error($connection));
            while($row = mysqli_fetch_array($result)){  
                if(($checkIn >= $row['date_from'] && $checkIn <= $row['date_to']) || ($checkOut >= $row['date_from'] && $checkOut <= $row['date_to']) || ($checkIn <= $row['date_from'] && $checkOut >= $row['date_to']))
                {
                    continue;
                }
                else
                {
                    echo "<div class='rounded' style='background-color: #404040;'>
                            <img src=$row[image] id='image' height='100%' width='100%'></td><br/><br/>
                            <a id='title'>$row[title] </a><br/>
                            <a id='price'>$$row[pricePerNight]/Night </a><br/><br/>";
                    echo '<a href="insertReservation.php?propertyId='.$row[0].'&price='.$row['pricePerNight'].'&checkIn='.$checkIn.'&checkOut='.$checkOut.'class="btn btn-success btn-block"">Book Property</a>';
                    
                    echo "</div><br/>";
                    
                    
                }
            
            }
        }
        
    ?>    
</form>