<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Server-Side Scripting Assignment</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <?php include 'menu.php' ?>

        <div class="container">
            <div class="row centered-form">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default ml-3 p-3">
                        <div class="panel-heading">
                            <h1 class="panel-title">Register</h1>
                        </div>
                            <div class="panel-body">
                            <form action="register.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="fName" class="form-control" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="lName" class="form-control" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                             <input type="password" class="form-control" name="confPassword" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="submit" name="Submit" value="Register" class="btn btn-info btn-block">
                                
                            </form>
                                <?php    
                                    if(isset($_POST['Submit']))
                                    {
                                        $fName = $_POST['fName'];
                                        $lName = $_POST['lName'];
                                        $email = $_POST['email'];
                                        $password = $_POST['password'];
                                        $confPassword = $_POST['confPassword'];

                                        require_once('databaseConn.php');

                                        $query2 = "SELECT count(*) FROM tbl_users
                                                   WHERE email = '$email'";

                                        $result2 = mysqli_query($connection, $query2)
                                            or die("Error in query: ". mysqli_error($connection));

                                        $row = mysqli_fetch_row($result2);
                                        $count = $row[0];

                                        if($password != $confPassword)
                                        {
                                            echo "Passwords do not match!<br/>";
                                        }

                                        else if($count > 0)
                                        {
                                            echo "Email already in use. Please choose another email!";
                                        }
                                        else if(strlen($password) < 6)
                                        {
                                            echo "Password must be made up of atleast 6 characters!";
                                        }
                                        else if((strlen($password) >= 6) && ($password = $confPassword))
                                        {
                                            $query = "INSERT INTO tbl_users (name, surname, email, password)
                                                    VALUES ('$fName', '$lName','$email', '$password')";
                                            $result = mysqli_query($connection, $query)
                                                 or die("Error in query: ". mysqli_error($connection));
                                            header('Location: login.php');
                                        }


                                    }

                                ?>
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
<?php        
    include 'footer.php';
?>