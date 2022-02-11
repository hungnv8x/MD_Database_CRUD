<?php
require_once '../database/databaseconnect.php';
if (isset($conn)) {
    $stmt = $conn->prepare('select * from category where id ='.$_REQUEST['id']);
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
<form action="" method="post">
    <?php while ($row = $stmt->fetch()) { ?>
    <input type="text" name="id" disabled value="<?php echo $row->id ?>">
    <input type="text" name="name" value="<?php echo $row->name?>">
    <?php } ?>
    <button>Update</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($conn)) {
        $stmt = $conn->prepare("update category set name ='".$_REQUEST['name']."'where id='".$_REQUEST['id']."'");
        $stmt->execute();
        header('location:displaycategory.php');
    }
}
?>
