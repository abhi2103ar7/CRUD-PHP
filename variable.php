<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    session_start();
    //database connectivity
    $connection=mysqli_connect("localhost","root","","crud");

    //Displaying all data
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

    //Editing section
    if(isset($_GET['edit'])){
        $edit=$_GET['edit'];
        echo '
        <div class="container">
            <div class="row row-header mt-5">
                <div class="col-12 col-sm-6 offset-3">
                    <form action="variable.php" method="get">
                        <div class="form-group">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter the name">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Enter the location"><br>
                            <input type="hidden" name="id" value="'.$edit.'">
                        <div>
                        <button type="submit" name="editted" class="btn btn-primary">Save</button><br>    
                    </form>
                </div>
            </div>
        </div>
        ';        
        
    }
    if(isset($_GET['editted'])){
        $id=$_GET['id'];
        $name=$_REQUEST['name'];
        $location=$_REQUEST['location'];
        if(!$connection){
            die("Connection failed: ".mysqli_connect_error());
        }
        else{
            $query= "UPDATE `data` SET `Name`='{$name}', `Location`='{$location}' WHERE `Id`={$id} ";                
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
</body>
</html>