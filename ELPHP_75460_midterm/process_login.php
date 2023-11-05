<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>User Login</h1>
    <form method="post" action="process_login.php">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="text" name="password" id="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>


<?php
$sampleEmail = "uc@gmail.com";
$samplePassword = "ucban123";

//In this variable declaration will be used to store a filter type, specifically for email validation
$emailFilter = FILTER_VALIDATE_EMAIL;

// And this block code here checks if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailAddress = $_POST["email"];
    $password = $_POST["password"];

    // and here this will be to validate the email format using the custom filter
    if (!filter_var($emailAddress, $emailFilter)) {
        echo "LOGIN FAILED: Invalid email format.";
    } else {
        if ($emailAddress === $sampleEmail && $password === $samplePassword) {
            echo "Success Login.";
        } else {
            echo "LOGIN FAILED: Incorrect email or password.";
        }
    }
}
?>
