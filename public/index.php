<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database App</title>
</head>
<body>

<?php include "templates/header.php"; ?>

<h2>Choose a task.</h2>

 <ul>
    <li>
        <a href="create.php">
        <strong>Create</strong>
        </a>  - add a user
    </li>

    <li>
        <a href="read.php">
        <strong>Read</strong>
        </a> - find a user
    </li>

    <li>
        <a href="update.php">
        <strong>Update</strong>
        </a> - edit a user
    </li>

    <li>
        <a href="delete.php">
        <strong>Delete</strong>
        </a> - Delete a user
    </li>
 </ul>

<?php include "templates/footer.php"; ?>
    
</body>
</html>