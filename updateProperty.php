<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Server-Side Scripting Assignment</title>
        <link rel="stylesheet" type="text/css" href="css/style3.css?v=3.4.2">
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
                        <form action="updateProperty.php" method="post">
                        <table>
                            <?php
                                $userId = $_SESSION['userId'];
                                require_once('databaseConn.php');

                                $query = "SELECT propertyId, title, capacity, pricePerNight, location, image FROM tbl_property p INNER JOIN tbl_location l ON p.locationId = l.locationId 
                                WHERE p.userId = '$userId'";

                                    $result = mysqli_query($connection, $query)
                                            or die("Error in query: ". mysqli_error($connection));
                                    while($row = mysqli_fetch_array($result)){  
                                        echo "<div class='rounded' style='background-color: #404040;'>
                                        <img src=$row[image] id='image' height='100%' width='100%'></td><br/><br/>
                                        <a id='title'>Title: $row[title] </a><br/>
                                        <a id='capacity'>Capacity: $row[capacity]</a><br/><br/>
                                        <a id='price'>Price Per Night: $$row[pricePerNight]/Night  </a><br/>
                                        <a id='locationId'>Location: $row[location] </a><br/>";
                                        echo '<a class="btn btn-success btn-block" href="updatePropertyFinal.php?propertyId='.$row['propertyId'].'">Update Property</a>';

                                        echo "</div><br/>";
                                        }


                            ?>       
                        </table>  
                            
                </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>