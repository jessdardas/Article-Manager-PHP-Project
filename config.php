
<?php
$servername ="localhost";   // your database host
$username ="yr_db_user";    // your database username
$password ="yr_db_pass";    // your database password
$database = 'yr_db';        // your database name
try{$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //echo "Connected successfully";
    }
    catch(PDOException $e){
    echo"Connection failed: ". $e->getMessage();
    }?>
