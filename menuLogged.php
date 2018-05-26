<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 mb-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">            
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enterProperty.php">Add a Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="updateProperty.php">Update a Property</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            <span class="nav-text" style="color: white;">
                <?php 
                require_once('databaseConn.php');
                $userId = $_SESSION['userId'];

                $query = "SELECT name FROM tbl_users WHERE userId = '$userId'";
                $result = mysqli_query($connection, $query)
                    or die("Error in query: ". mysqli_error($connection));
                while($row = mysqli_fetch_array($result)){  
                    echo $row['name'];
                }?>
            </span>
        </div>
    </div>
</nav>