<div class="container">
            <div class="row centered-form">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-default ml-3 p-3">
                        <div class="panel-heading">
                            <h1 class="panel-title">Available Properties</h1>
                        </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table class="form-control">
                                                <?php session_start(); 

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
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<