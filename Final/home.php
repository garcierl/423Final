<?php
require_once ('pages/database.php');

$sql = "SELECT * FROM 423Final";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        $msg = "success";
    } else{
        $msg = 'error reading';
    }
   
}

mysqli_stmt_close($stmt);
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <a href="pages/contact.html">Contact</a>
        <a href="pages/about.html">About</a>
    </nav>

    <h1>Welcome to Indy Dining</h1>
    <p>Find locally owned resturants easily.</p>

    <div class="content">
        <?php 
        
        while($row = mysqli_fetch_array($result)) {
            echo '<div class="resrow"><a href="pages/resturant.php?id=' .$row['Resturant'] .'">' .$row['Name'] .'</a></div>';
        }

        ?>
    </div>

    <a href="pages/create.php">New Restaurant</a>

    <footer>
        Indy Dining &copy; 2022 all rights reserved.
    </footer>
</body>
</html>