<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Server-Side Scripting Assignment</title>
        <link rel="stylesheet" type="text/css" href="css/style.css?v=3.4.2">
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
                header('Location: index.php');
            }
        ?>

        <div class="container">
            <div class="row centered-form">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default ml-3 p-3">
                        <div class="panel-heading">
                            <h1 class="panel-title">Insert a Property</h1>
                        </div>
                            <div class="panel-body">
                            <form enctype="multipart/form-data" action="enterProperty.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="Property Title" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="price" placeholder="Price Per Night" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select name="capacity" class="form-control">
                                                <option value="select">Select Number of People</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <?php
                                            
                                            require_once('databaseConn.php');
                                            
                                            $query2 = "SELECT locationId, location FROM tbl_location";
                                            $result2 = mysqli_query($connection, $query2)
                                                or die("Error in query: ". mysqli_error($connection));
                                            echo "<select name='location' class='form-control   '>";
                                            while ($row = mysqli_fetch_array($result2)) {
                                                echo "<option value='" . $row['0'] . "'>" . $row['1'] . "</option>";
                                            }
                                            echo "</select>";
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                            <input name="userfile" type="file"><br/><br/>
                                        </div>
                                    </div>
                                    
                                </div>
                                <input type="submit" name="Submit" value="Add" class="btn btn-info btn-block">
                            <?php
                                if(isset($_POST['Submit']))
                                {
                                    $upfile = $_FILES['userfile']['name'];
                                    $title = $_POST['title'];
                                    $price = $_POST['price'];
                                    $capacity= $_POST['capacity'];
                                    $location = $_POST['location'];
                                    $userId = $_SESSION['userId'];

                                    require_once('databaseConn.php');
                                    
                                    
                                    $query = "INSERT INTO tbl_property (title, capacity, pricePerNight, locationId, image, userId)
                                        VALUES ('$title', '$capacity', '$price', '$location', '$upfile', '$userId')";

                                    $result = mysqli_query($connection, $query)
                                        or die("Error in query: ". mysqli_error($connection));

                                    if(move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
                                    {
                                        echo "File uploaded successfully";
                                    }
                                    else
                                    {
                                        echo "Problem: Could not move file to destination directory";
                                    }
                                }
                            ?>
                            </form>
                        </div>
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