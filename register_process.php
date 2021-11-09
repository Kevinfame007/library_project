<?php
session_start();
require_once("connect.php");

if(!empty($_GET["user_reg"]) && !empty($_GET["pass_reg"]) && !empty($_GET["Name_reg"]) && !empty($_GET["LastName_reg"]) && !empty($_GET["Address_reg"]) && !empty($_GET["Tel_reg"])
&& isset($_GET["user_reg"]) && isset($_GET["pass_reg"]) && isset($_GET["Name_reg"]) && isset($_GET["LastName_reg"]) && isset($_GET["Address_reg"]) && isset($_GET["Tel_reg"])
)
{
  $sql = "SELECT * FROM member WHERE Username = '".$_GET["user_reg"]."'";
  $qry = $conn->query($sql);
  $row = $qry->fetch_assoc();
  if(!$row)
  {
    $sql = "INSERT INTO member VALUES(null,'".$_GET["Name_reg"]."','".$_GET["LastName_reg"]."','".$_GET["Address_reg"]."','".$_GET["Tel_reg"]."','".$_GET["user_reg"]."','".$_GET["pass_reg"]."')";
    $qry = $conn->query($sql);
    if($qry)
    {
      echo "OK";
    }
    else {
      echo "ERROR";
    }
  }
  else {
    echo "ERROR_MATCH";
  }
}
else {
  header("location: index.php");
}
?>
