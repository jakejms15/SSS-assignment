<?php    
    session_start();   
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

        $result2 = mysqli_query($conection, $query2)
            or die("Error in query: ". mysqli_error($connection));

        $row = mysqli_fetch_row($result2);
        $count = $row[0];

        if($password != $confPassword)
        {
            echo "Passwords do not match!<br/>";
        }

        if($count > 0)
        {
            echo "Email already in use. Please choose another email!";
        }
        else
        {
            $query = "INSERT INTO tbl_users (name, surname, email, password)
                    VALUES ('$fName', '$lName','$email', '$password')";
            $result = mysqli_query($connection, $query)
                 or die("Error in query: ". mysqli_error($connection));
            //echo "Registration Successful!";
            header('Location: login.php');
        }


    }

?>