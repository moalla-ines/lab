<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


$id=mysqli_real_escape_string($con,$_POST['id']);

if(isset($_POST['delete_paper_btn'])){
    $queryEXISTE = "SELECT `existe` FROM `lrsetitmembre` WHERE `id` = $id";
    $query = "UPDATE `lrsetitmembre` SET `existe`='0' WHERE `id` = $id";

// Execute the SELECT query
$result = mysqli_query($con, $queryEXISTE);

// Check if the SELECT query was successful and fetch the result
if ($result !== false && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $existeValue = $row['existe'];

    // Check if 'existe' column has a value of 1 (true)
    if ($existeValue == 1) {
        // Execute the UPDATE query
        if (mysqli_query($con, $query)) {
            // The UPDATE query was successful
            echo 200;
        } else {
            // The UPDATE query failed
            echo "Update query failed: " . mysqli_error($con);
        }
    } else {
        // The 'existe' column value is not 1 (true)
        echo "existe column is not true (1)";
    }
} else {
    // The SELECT query failed or no rows were found
    echo "Select query failed or no rows found: " . mysqli_error($con);
}
}

?>