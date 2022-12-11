<?php 
require_once ('database.php');

if(isset($_POST['Name']) && !empty(trim($_POST['Name']))) {
    $Name = addslashes(strip_tags(trim($_POST['Name'])));
    $FoodType = addslashes(strip_tags(trim($_POST['FoodType'])));
    $Address = addslashes(strip_tags(trim($_POST['Address'])));
    $PhoneNumber = addslashes(strip_tags(trim($_POST['PhoneNumber'])));
    $Pricing = addslashes(strip_tags(trim($_POST['Pricing'])));

    $sql = "INSERT INTO 423Final (Name, FoodType, Address, PhoneNumber, Pricing) VALUES (?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssss", $Name, $FoodType, $Address, $PhoneNumber, $Pricing);

        if(mysqli_stmt_execute($stmt)){
            header("Location: https://in-info-web4.informatics.iupui.edu/~garcierl/Final/pages/resturant.php?id=" .mysqli_insert_id($link));
        } else{
            $msg = "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}



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
        <a href="../home.html">Home</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
    </nav>

    <h1>Create a Resturant</h1>

    <div class="content">
        <form method="post">
            <input type="text" placeholder="Name" name="Name">
            <input type="text" placeholder="Food Type" name="FoodType">
            <input type="text" placeholder="Phone Number" name="PhoneNumber">
            <input type="text" placeholder="Address" name="Address">
            <input type="text" placeholder="Pricing" name="Pricing">

            <input type="submit" value="Create Resturant">
        </form>
    </div>

    

    <footer>
        Indy Dining &copy; 2022 all rights reserved.
    </footer>
</body>
</html>