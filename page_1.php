<?php
session_start(); // First session starts

?>
<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" .mysqli_connect_error());
    }
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $sql = "INSERT INTO `form`.`talrn` (`name`, `phone`, `email`) VALUES ($name, $phone, $email);";

    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP form</title>
    <link rel="stylesheet" href="talrn.css">
</head>
<body>
    <div class="container">
        <h3>PHP Form</h3>
        
        <form action="page_2.php" method="post">
            <label for="name">Name : <span>*</span></label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <label for="phone">Phone Number:<span>*</span></label>
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
            <label for="email">Email Id: <span>*</span></label>
            <input type="email" name="email" id="email" placeholder="Enter your Email Address" required>
            <input type="reset" value="Reset">
            <input type="submit" value="Next">  
        </form>

    </div>
</body>
</html>