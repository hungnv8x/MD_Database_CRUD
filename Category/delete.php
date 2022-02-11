<?php
require_once '../database/databaseconnect.php';

if (isset($conn)) {
    $stmt = $conn->prepare("delete from category where id='" . $_REQUEST['id'] . "'");
    $stmt->execute();
    header('location:displaycategory.php');
}