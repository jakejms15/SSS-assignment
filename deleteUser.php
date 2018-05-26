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
                        <form action="updateProperty.php" method="post">
                        <table>
                            <?php
                                $userId = $_SESSION['userId'];
                                require_once('databaseConn.php');

                                $query = "SELECT * FROM tbl_users";

                                    $result = mysqli_query($connection, $query)
                                            or die("Error in query: ". mysqli_error($connection));
                                    while($row = mysqli_fetch_array($result)){  
                                        echo "<div class='rounded' style='background-color: #404040;'>
                                        <br/><a id='userId'>User ID: $row[userId]</a><br/>
                                        <a id='name'>Name: $row[name] $row[surname] </a><br/>
                                        <a id='email'>Email: $row[email]</a><br/><br/>";
                                        echo '<a class="btn btn-success btn-block" href="deleteUserFinal.php?userId='.$row['userId'].'">Delete User</a>';

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
<?php        
    include 'footer.php';
?>