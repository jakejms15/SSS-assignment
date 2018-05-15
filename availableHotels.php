<table>
    <?php 
    if(isset($_POST['Submit']))
    {
        $location = $_POST['location'];
        $checkIn = date('Y-m-d', strtotime($_POST['checkIn']));
        $checkOut = date('Y-m-d', strtotime($_POST['checkOut']));
        $numOfGuests = $_POST['numOfGuests'];
        require_once('databaseConn.php');

            $query = "SELECT *
            FROM tbl_property p JOIN tbl_location l JOIN tbl_reservation r 
            WHERE l.locationId = p.locationId AND r.propertyId = p.propertyId
            AND l.location = '$location' AND r.date_from >= '$checkIn' AND r.date_to <= '$checkOut' AND p.capacity >= '$numOfGuests'";
            
            $result = mysqli_query($connection, $query)
                    or die("Error in query: ". mysqli_error($connection));
            while($row = mysqli_fetch_array($result)){  
                echo $row['location'];
            echo "<tr>
                    <td><img src=$row[image] width='200px' height='200px'></td>
                </tr>
                <tr>
                    <td style='color: blue; font-family: fantasy;'>$row[title] </td>
                </tr>
                <tr>
                    <td style='color: blue; font-family: fantasy;'>$$row[pricePerNight]/Night </td>
                </tr>
                <tr>
                    <td class=><input type='submit' value='Book Property' class='btn btn-success btn-block'></td>
                </tr>";
            }
        }
        
    ?>       
</table>     