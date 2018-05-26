<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Server-Side Scripting Assignment</title>
        <link rel="stylesheet" type="text/css" href="css/style3.css">
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
                $email = $_SESSION['email'];
                if($email != 'admin@admin.com')
                {
                    include 'menuLogged.php';
                }
                else if($email = 'admin@admin.com')
                {
                    include 'menuAdmin.php';
                }
            }

            else
            {
                        header('Location: index.php');
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">                        
                        <form action="viewReservation.php" method="post">
                        <table>
        <?php 
                    if (isset($_SESSION['userId'])) 
                    {  
                    require_once('databaseConn.php');

                    $query = "SELECT * FROM tbl_reservation r INNER JOIN tbl_property p
                                    ON r.propertyId = p.propertyId";

                        $result = mysqli_query($connection, $query)
                                or die("Error in query: ". mysqli_error($connection));
                        while($row = mysqli_fetch_array($result)){
                                echo "<div class='rounded' style='background-color: #404040;'>
                                        <br/><img src=$row[image] id='image' height='100%' width='100%'></td><br/><br/>
                                        <a id='dateFrom'>Date From: $row[date_from] </a><br/>
                                        <a id='dateTo'>Date To: $row[date_to] </a><br/>
                                        <a id='amount'>Amount: $$row[amountPaid]/Night </a><br/>
                                        <a id='userId'>User Id: $row[userId]</a><br/><br/>";
                                echo '<a class="btn btn-success btn-block" href="index.php">Go Back</a>';

                                echo "</div><br/>";

                            }
                            

                        }
                        
                ?> 
                
        </table>  
                            
                </form>
            </div>
            </div>
            </div>
        </div>
        <!-- javascript files -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>
<?php        
    include 'footer.php';
?>