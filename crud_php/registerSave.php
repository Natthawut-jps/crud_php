<?php
include_once('connect_db.php');

$email = $_POST["email"];
$pass_word = md5($_POST["pass_word"]);
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$check_me = $_POST["check_me"];

if (isset($_POST['save'])) {

    $sql = "INSERT INTO `register` (`id`, `email`, `pass_word`, `address1`, `address2`, `city`, 
`state`, `zip`, `check_me`, `date_time`) VALUES 
(NULL, '$email', '$pass_word', '$address1', '$address2', '$city', '$state', '$zip', '$check_me', 
current_timestamp());";

    if (mysqli_query($conn, $sql)) {
        echo '<script language="JavaScript">';
        echo 'alert("บันทึกข้อมูลเรียบร้อยแล้ว"); location.href = "register.php"';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} elseif (isset($_POST['update'])) {
    $id = $_GET["id"];
    $sql = "UPDATE `register` SET 
    `email` = '$email', 
    `pass_word` = '$pass_word', 
    `address1` = '$address1', 
    `address2` = '$address2', 
    `city` = '$city', 
    `state` = '$state', 
    `zip` = '$zip', 
    `check_me` = '$check_me' 
    WHERE `register`.`id` = '$id';";
    mysqli_query($conn, $sql);
    echo '<script language="JavaScript">';
    echo 'alert("อัแเดทข้อมูลเรียบร้อยแล้ว"); location.href = "register.php"';
    echo '</script>';
}
