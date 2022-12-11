<?php
require_once ('database.php');

$id = ($_GET['id']) ? $_GET['id'] : 1;
$sql = "SELECT * FROM 423Final WHERE Resturant = ?";

if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $id);

    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        } else{
            $msg = 'error reading';
        }

    } else{
        $msg = "Oops! Something went wrong. Please try again later.";
    }
}
else {
    $msg = 'failed here';
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
    <title>Resturant</title>
</head>
<body>
    
<nav>
        <a href="../home.php">Home</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
    </nav>
    <?= $msg ?> 
    <div class="resturants">
        <h1><?=$row ['Name'] ?></h1>     

        <p><?=$row ['FoodType']?></p>
        <p><?=$row ['Address']?></p>
        <p><?=$row ['PhoneNumber']?></p>
        <p><?=$row ['Pricing']?></p>
    </div>


    <a href="edit.php?id=<?=$row['Resturant']?>">Edit</a>
    <a href="delete.php?id=<?=$row['Resturant']?>">Delete</a>

    <footer>
        Indy Dining &copy; 2022 all rights reserved.
    </footer>

</body>
</html>