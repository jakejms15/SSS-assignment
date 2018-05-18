<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome to Cupping's</title>
        <!-- charset meta tag -->
        <meta charset="utf-8">
        <!-- Responsive meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS (CDN) -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        
        <!-- font awesome -->
        <script src="https://use.fontawesome.com/4f7c6bbdcb.js"></script>
    </head> 
    
    <body>
        

        <div class="container">
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
                                echo '<a class="btn btn-success btn-block" href="insertReservation.php?propertyId='.$row[0].'&price='.$row['pricePerNight'].'&checkIn='.$checkIn.'&checkOut='.$checkOut.' ">Book Property</a>';

                                echo "</div><br/>";


                            }

                        }
                    }

                ?>    
        </div>
  <!-- javascript files -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>