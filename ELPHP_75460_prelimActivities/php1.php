<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $month = "05";
    $day = "21";
    $year = "2001";

    echo "$month/$day/$year" . "<br>" . ((int)$day % 2 === 0 ? "even" : "odd");

    ?>
    
</body>
</html>