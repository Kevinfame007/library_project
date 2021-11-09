<?php
session_start();

if(isset($_GET["Type"]))
{
  if($_GET["Type"] == "Set")
  {
    $_SESSION["Page"] = $_GET["Page"];
  }
  if($_GET["Type"] == "Get")
  {
    if($_SESSION["Page"] == "home")
    {
      echo "p:home";
    }
    else if($_SESSION["Page"] == "findbook")
    {
      echo "p:findbook";
    }
    else if($_SESSION["Page"] == "addbook")
    {
      echo "p:addbook";
    }
    else if($_SESSION["Page"] == "sum")
    {
      echo "p:sum";
    }
    else if($_SESSION["Page"] == "borrow")
    {
      echo "p:borrow";
    }
    else if($_SESSION["Page"] == "addlib")
    {
      echo "p:addlib";
    }
  }
}

?>
