<?php session_start() ?>
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
                include 'menu.php';
            }
        ?>
        <div class="container">
            <h1 id="heading">BEST CITY APARTMENT DEALS</h1><br/><br/>
            <div id="border"></div>
            <h3 id="heading2">More than 350,000 apartments and holiday homes worldwide</h3><br/><br/>
           
            <form action="availableHotels.php" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="location" class="form-control" placeholder="Berlin, Paris, London..." required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input placeholder="Check-in" class="textbox-n form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="checkIn" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input placeholder="Check-out" class="textbox-n form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="checkOut" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select  class="form-control" name="numOfGuests">
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="submit" name="Submit" class="btn btn-success btn-block">
                        </div>
                    </div>

                </div>

                
            </form>
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