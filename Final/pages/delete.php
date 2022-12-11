<?php require_once ('database.php');

$id = ($_GET['id']) ? $_GET['id'] : 1;
$sql = "DELETE FROM 423Final WHERE Resturant = ?";

if($stmt = mysqli_prepare($link, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $id);

    if(mysqli_stmt_execute($stmt)){
        header("Location: https://in-info-web4.informatics.iupui.edu/~garcierl/Final/home.html");

    } else{
        $msg = "Oops! Something went wrong. Please try again later.";
    }
}
else {
    $msg = 'failed here';
}

mysqli_stmt_close($stmt);

mysqli_close($link);
echo $msg;
?>