<?php

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf']))die();

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $user = [
            "id" => $_POST['id'],
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "location" => $_POST['location'],
            "dateCreated" =>  $_POST['dateCreated']
        ];

        $sql = "UPDATE users
                SET id = :id,
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email,
                    age = :age,
                    location = :location,
                    dateCreated = :dateCreated
                WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->execute($user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessate();
    }
} else {
    echo "Something went wrong.";
    exit;
}

?>

<?php include "templates/header.php"; ?>

    <?php if (isset($_POST['submit']) && $statement) : ?>
        <blockquote><?php echo escape($_POST['firstname']); ?> successfully updated.</blockquote>
<?php endif; ?>

    <h2 class="edit-single">Edit a user</h2>

    <form method="post" class="update-form">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
        <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
            <input type="text" 
                name="<?php echo $key; ?>" 
                id="<?php echo $key; ?>" 
                value="<?php echo escape($value); ?>" 
            <?php echo ($key === 'id' ? 'readonly' : null); ?>>
        <?php endforeach; ?>
        <input type="submit" name="submit" value="Submit" class="submit">
    </form>

<?php include "templates/footer.php"; ?>