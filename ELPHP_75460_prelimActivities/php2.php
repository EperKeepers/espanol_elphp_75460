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
    function numberSquareRoot($count) {
        $numberArray = array();

        for ($counter = 1; $counter <= $count; $counter++) {
            $numberArray[] = sqrt($counter);
        }

        return $numberArray;
    }

    foreach (numberSquareRoot(20) as $number) {
        echo $number . '<br>';
    }
?>
</body>
</html>