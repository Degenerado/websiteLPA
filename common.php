<!--establish the connection to database, and start the session-->
<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
// Start the session

// Establish the connection to the database
$con = mysqli_connect("localhost", "root", "", "websiteLPA") or die(mysqli_connect_error());


?>


