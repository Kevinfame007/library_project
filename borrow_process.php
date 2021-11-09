<?php
session_start();
require_once("connect.php");
if(!empty($_GET["value"]) && isset($_GET["value"]) && !empty($_GET["value1"]) && isset($_GET["value1"]))
{
  $sql = "SELECT * FROM member WHERE Name_Member = '".$_GET["value"]."'";
  $qry = $conn->query($sql);
  $row = $qry->fetch_assoc();
  $sql = "UPDATE list SET isReturn = 1 WHERE id_Member = '".$row["id_Member"]."'";
  $qry = $conn->query($sql);

  $idMember = $row["id_Member"];
  $idLib = $_SESSION["id_Lib"];

  $sql = "SELECT * FROM book WHERE Name_Book ='".$_GET["value1"]."'";
  $qry = $conn->query($sql);
  $row = $qry->fetch_assoc();

  $idBook = $row["id_Book"];

  $sql = "INSERT INTO list VALUES(null,'".$idMember."','".$idBook."','".$idLib."',NOW(),NOW(),0)";
  $qry = $conn->query($sql);
  if($qry)
  {
    echo "SUCCESS";
  }
  else {
    echo "ERROR";
  }
}
else {
  echo "ERROR";
}
?>
