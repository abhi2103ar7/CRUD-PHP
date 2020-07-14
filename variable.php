<?php
session_start();
//database connectivity
$connection=mysqli_connect("localhost","root","","crud");

if(isset($_POST['save'])){
    $name=$_REQUEST['name'];
    $location=$_REQUEST['location'];

    if(!$connection){
        die("Connection failed: ".mysqli_connect_error());
    }
    else{
        $query="INSERT INTO data (name,location) VALUES ('{$name}','{$location}')";       
    }
    if(mysqli_query($connection,$query)){
        $_SESSION['display']="display";
        header("location:index.php");
    }
    else{
        echo "Error";
    }
}
?>