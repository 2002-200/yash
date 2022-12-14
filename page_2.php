<?php
session_start(); //second session starts
?>

<?php
$insert = false;
if(isset($_POST['location'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    
    $location= $_POST['location'];
    $age= $_POST['age'];
    $university= $_POST['university'];
    $sql = "INSERT INTO `form`.`talrn` (`location`, `age`, `university`, `dt`) VALUES ($location, $age, $university, current_timestamp());";

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

        <form action="page_3.php" method="post">
            <label for="Add">Location : </label>
            <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter your full address"></textarea>
            <label for="age">Age : <span>*</span></label>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <label for="university">University : <span>*</span></label>
            <input type="text" name="university" id="university" placeholder="Enter your university name" required>
            <input type="reset" value="Reset">
            <input type="submit" value="Next">
        </form>


    </div>
</body>
</html>