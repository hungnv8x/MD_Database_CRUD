<?php
require_once '../database/databaseconnect.php';
if (isset($conn)) {
    $stmt = $conn->prepare('select * from category');
}
$stmt ->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="create.php">Add</a>
<form action="">
    <table border="1px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt ->fetch()){ ?>
        <tr>
            <td><?php echo $row->id ?></td>
            <td><?php echo $row->name ?></td>
            <td><a href="edit.php?id=<?php echo $row->id ?>">Edit</a></td>
            <td><a href="delete.php?id=<?php echo $row->id ?>">Delete</a></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</form>
</body>
</html>
