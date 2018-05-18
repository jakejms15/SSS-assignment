<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Server-Side Scripting Assignment</title>
        <link rel="stylesheet" type="text/css" href="css/style2.css?v=3.4.2">
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
        <?php 
            if (isset($_SESSION['userId'])) 
            {                
                include 'menuLogged.php';
            }
            else
            {
                include 'menu.php';
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php 
                            if (isset($_SESSION['userId'])) 
                                    {                
                                        include 'AvailableHotelsLogged.php';
                                    }
                                    else
                                    {
                                        if(isset($_POST['Submit']))
                                        {
                        ?>
                        
                        <form action="register.php" method="post">
                        <table>
                            <?php
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
                                                    <a id='price'>$$row[pricePerNight]/Night </a><br/><br/>
                                                    <input type='submit' href='register.php' value='Register' class='btn btn-success btn-block'>
                                                </div><br/>";
                                        }

                                    }
                                }

                            ?>       
                        </table>  
                            
                </form>
<?php
            }
?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>