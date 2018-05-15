<?php session_start(); ?>
<table class="form-control">
    <?php
        require_once('databaseConn.php');
        $queryCount = "SELECT * FROM tbl_property ORDER by propertyId DESC LIMIT 1";
        $resultCount = mysqli_query($connection, $queryCount)
            or die("Error in query: ". mysqli_error($connection));
        $row = mysqli_fetch_row($resultCount);
        $count = $row[0];

        for($i = 1; $i <= $count; $i++){

            $query = "SELECT title, pricePerNight, image FROM tbl_property WHERE propertyId = '$i'";
            $result = mysqli_query($connection, $query)
                    or die("Error in query: ". mysqli_error($connection));
            while($row = mysqli_fetch_array($result)){  

            echo "<tr>
                    <td><img src=$row[image] width='200px' height='200px'></td>
                </tr>
                <tr>
                    <td style='color: blue; font-family: fantasy;'>$row[0] </td>
                </tr>
                <tr>
                    <td style='color: blue; font-family: fantasy;'>$$row[1]/Night </td>
                </tr>
                <tr>
                    <td class=><input type='submit' value='Book Property' class='btn btn-success btn-block'></td>
                </tr>";
            }
        }
    ?>       
</table>                 
