<?php 
require_once ('database.php');

if(isset($_POST['id']) && !empty(trim($_POST['id']))) {
    $id = addslashes(strip_tags(trim($_POST['id'])));
    $Name = addslashes(strip_tags(trim($_POST['Name'])));
    $FoodType = addslashes(strip_tags(trim($_POST['FoodType'])));
    $Address = addslashes(strip_tags(trim($_POST['Address'])));
    $PhoneNumber = addslashes(strip_tags(trim($_POST['PhoneNumber'])));
    $Pricing = addslashes(strip_tags(trim($_POST['Pricing'])));

    $sql = "UPDATE 423Final SET Name=?, FoodType=?, Address=?, PhoneNumber=?, Pricing=? WHERE Resturant=?";

    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssss", $Name, $FoodType, $Address, $PhoneNumber, $Pricing, $id);

        if(mysqli_stmt_execute($stmt)){
            header("Location: https://in-info-web4.informatics.iupui.edu/~garcierl/Final/pages/resturant.php?id=" .$id);
        } else{
            $msg = "Oops! Something went wrong. Please try again later.";
        }
    }
}
else {
    $id = addslashes(strip_tags(trim($_GET['id'])));
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
        <a href="../home.html">Home</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
    </nav>

    <h1>Edit this Resturant</h1>

    <div class="content">
        <form method="post">
            <input type="hidden" name="id" value="<?=$row ['Resturant'] ?>">
            <input type="text" placeholder="Name" name="Name" value="<?=$row ['Name'] ?>">
            <input type="text" placeholder="Food Type" name="FoodType" value="<?=$row ['FoodType'] ?>">
            <input type="text" placeholder="Phone Number" name="PhoneNumber" value="<?=$row ['PhoneNumber'] ?>">
            <input type="text" placeholder="Address" name="Address" value="<?=$row ['Address'] ?>">
            <input type="text" placeholder="Pricing" name="Pricing" value="<?=$row ['Pricing'] ?>">

            <input type="submit" value="Edit Resturant">
        </form>

            <a></a>
    </div>

    

    <footer>
        Indy Dining &copy; 2022 all rights reserved.
    </footer>
</body>
</html>