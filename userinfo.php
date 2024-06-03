<?php

$con = mysqli_connect('localhost', 'root', '', 'yc creator data');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Mobile = mysqli_real_escape_string($con, $_POST['Mobile']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Invitation = mysqli_real_escape_string($con, $_POST['Invitation']);
    $Comment = mysqli_real_escape_string($con, $_POST['Comment']);

    // Attempt to insert data
    $query = "INSERT INTO sahildata (Name, Mobile, Email, Invitation, Comment) VALUES ('$Name', '$Mobile', '$Email', '$Invitation', '$Comment')";
    if (mysqli_query($con, $query)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);

?>
