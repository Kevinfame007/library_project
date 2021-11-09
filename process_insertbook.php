<?php
session_start();
require_once("connect.php");
if(!empty($_POST["Name_Book"]) && !empty($_POST["Author_Book"]) && !empty($_FILES["Picture_Book"]) && !empty($_POST["qty_Book"]) && !empty($_POST["Publisher"])
&& isset($_POST["Name_Book"]) && isset($_POST["Author_Book"]) && isset($_FILES["Picture_Book"]) && isset($_POST["qty_Book"]) && isset($_POST["Publisher"]))
{
  $sql = "INSERT INTO book VALUES(null,'".$_POST["Name_Book"]."','".$_POST["Author_Book"]."','null','".$_POST["qty_Book"]."','".$_POST["Publisher"]."')";
  $qty = $conn->query($sql);
  if($qty)
  {
    $last_id = mysqli_insert_id($conn);
    $path = $_FILES['Picture_Book']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $rename = "image/" . $last_id.".".$ext;
    copy($_FILES['Picture_Book']['tmp_name'],$rename);
    $sql = "UPDATE book SET Picture = '".$rename."' WHERE id_Book = '".$last_id."'";
    $qty = $conn->query($sql);
    //echo $_FILES["Picture_Book"]["tmp_name"];
  }
}
else {
  echo "ERROR";
}
?>
