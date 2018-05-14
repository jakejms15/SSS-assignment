<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Server-Side Scripting Assignment</title>
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
<table>
    <?php 
        require_once('databaseConn.php');
        $queryCount = "SELECT * FROM tbl_property ORDER by propertyId DESC LIMIT 1";
        $resultCount = mysqli_query($connection, $queryCount)
            or die("Error in query: ". mysqli_error($connection));
        $row = mysqli_fetch_row($resultCount);
        $count = $row[0];

        for($i = 1; $i <= $count; $i++){

            
            $query = "SELECT image, title, pricePerNight FROM tbl_property WHERE propertyId = '$i'";
            $result = mysqli_query($connection, $query)
                    or die("Error in query: ". mysqli_error($connection));
            while($row = mysqli_fetch_array($result)){  

            echo "<tr>
                    <td><img src=$row[image] width='200px' height='200px'></td>
                </tr>
                <tr>
                    <td style='color: blue; font-family: fantasy;'>$row[1] </td>
                </tr>
                <tr>
                    <td style='color: blue; font-family: fantasy;'>$$row[2]/Night </td>
                </tr>
                <tr>
                    <td class=><input type='submit' value='Book Property' class='btn btn-success btn-block'></td>
                </tr>";
            }
        }
    ?>       
</table>                 
 <!-- javascript files -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>