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
    <div class="container h-100">
        <div class="row row-header row-content align-items-center mt-4">
            <div class="col-4">
                <H3>NAME</H3>
            </div>
            <div class="col-4">
                <H3>LOCATION</H3>
            </div>
            <div class="col-4">
                
            </div>
        </div>
        <?php
            session_start();
            if(isset($_SESSION['display'])){
                $connection=mysqli_connect("localhost","root","","crud");
                $display="SELECT * FROM data ";
                $result=mysqli_query($connection,$display);
                while($row=mysqli_fetch_array($result))
                {
                    echo '<div class="row row-header row-content align-items-center mt-4">
                            <div class="col-4">'.
                                $row['Name'].'
                            </div>
                            <div class="col-4">'.
                                $row['Location'].'
                            </div>
                            <div class="col-4">
                                <form action="variable.php" method="get">
                                    <button type="submit" name="edit" value="'.$row['Id'].'" class="btn btn-success mr-4">EDIT</button>
                                    <button type="submit" name="delete" value="'.$row['Id'].'" class="btn btn-danger">DELETE</button>       
                                </form>
                            </div>
                          </div>';
                }
            }
        ?>
        </div>
    </div>

    <div class="container">
        <div class="row row-header mt-5">
            <div class="col-12 col-sm-6 offset-3">
                <form action="variable.php" method="POST">
                    <div class="form-group">
                        <label class="font-weight-bold">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter the name">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter the location"><br>
                    <div>
                    <button type="submit" name="save" class="btn btn-primary">Save</button><br>    
                </form>
            </div>
        </div>
    </div>
</body>
</html>