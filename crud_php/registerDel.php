<?php
include_once('connect_db.php');
$id = $_GET["id"];
// sql to delete a record
$sql = "DELETE FROM register WHERE `register`.`id` = $id";

if (mysqli_query($conn, $sql)) {
    echo '<script language="JavaScript">';
    echo 'alert("ลบข้อมูลเรียบร้อยแล้ว"); location.href = "register.php"';
    echo '</script>';
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
?>