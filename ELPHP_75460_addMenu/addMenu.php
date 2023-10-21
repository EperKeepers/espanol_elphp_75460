<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">ESPAÑOL CIRILO POS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Manage <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Menu</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="page-header" style="margin-top: 20px">
            <h1>Create Menu</h1>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <form action="" method="post">
            <div class="form-group">
                <label for="menuName" class="font-weight-bold" style="font-size: 20px">Menu Name</label>
                <input type="text" class="form-control" id="menuName" placeholder="Enter menu name" name="menu">
            </div>
            <div class="form-group">
                <label for="menuDescription" class="font-weight-bold" style="font-size: 20px">Menu Description</label>
                <input type="text" class="form-control" id="menuDescription" placeholder="Enter menu description"
                    name="menuDescription">
            </div>
            <button type="submit" class="btn btn-primary" style="margin-right: 5px;" name="insert">Submit</button>
            <button type="submit" class="btn btn-primary" style="margin-right: 5px;" name="update">Update</button>
            <button type="submit" class="btn btn-primary"
                style="background-color: red; color: white; border: 1px solid red;" name="delete">Delete</button>
        </form>
    </div>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "elphp_espanol";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $menuName = $_POST['menu'];
        $menuDescription = $_POST['menuDescription'];

        // Insert operation
        if (isset($_POST['insert'])) {
            $sql = "INSERT INTO add_menu_table (menu_name, menu_description) VALUES ('$menuName', '$menuDescription')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New record created successfully');</script>";
            } else {
                echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }
        }


        // Delete operation
        if (isset($_POST['delete'])) {
            echo '<script language="javascript">';
            echo 'var r = confirm("Are you sure you want to delete this record?");';
            echo 'if (r == true) {';
            echo '  window.location.href = "addMenu.php?delete=' . urlencode($_POST['menu']) . '";';
            echo '} else {';
            echo '  alert("Deletion canceled");';
            echo '}';
            echo '</script>';
        }

        // Modify operation
        if (isset($_POST['update'])) {
            $menuToUpdate = $_POST['menu'];
            $newDescription = $_POST['menuDescription'];

            $update_sql = "UPDATE add_menu_table SET menu_description='$newDescription' WHERE menu_name='$menuToUpdate'";

            if ($conn->query($update_sql) === TRUE) {
                echo "<script>alert('Record updated successfully');</script>";
            } else {
                echo "<script>alert('Error: " . $update_sql . "<br>" . $conn->error . "');</script>";
            }
        }
    }

    // Perform the delete operation if confirmed
    if (isset($_GET['delete'])) {
        $menuToDelete = urldecode($_GET['delete']);

        $delete_sql = "DELETE FROM add_menu_table WHERE menu_name='$menuToDelete'";

        if ($conn->query($delete_sql) === TRUE) {
            echo "<script>alert('Record deleted successfully');</script>";
        } else {
            echo "<script>alert('Error: " . $delete_sql . "<br>" . $conn->error . "');</script>";
        }
    }

    // Close the connection
    $conn->close();
    ?>


</body>

</html>