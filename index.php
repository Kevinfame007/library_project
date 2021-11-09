<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>ห้องสมุด</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  <?php
    if(isset($_SESSION["status"]))
    {
      ?>
      $("#login_success").load("manage.php");
      <?php
    }
    else {
      ?>
      var main_obj = document.getElementById("main_load");
      main_obj.style.display = "block";
      <?php
    }
  ?>

  $("#submit_register").click(function(){
    $.get("register_process.php",{
      user_reg:$("#user_reg").val(),
      pass_reg:$("#pass_reg").val(),
      Name_reg:$("#Name_reg").val(),
      LastName_reg:$("#LastName_reg").val(),
      Address_reg:$("#Address_reg").val(),
      Tel_reg:$("#Tel_reg").val(),},function(data,status){
        if(data.search("OK") != -1)
        {
          $("#p_register_success").modal();
        }
        else if(data.search("ERROR_MATCH" != -1)){
          $("#p_register_error").modal();
        }
    });
  });
  $("#submit_input").click(function(){
    $.get("login_process.php",{ username: $("#user_input").val(), password: $("#pass_input").val() }, function(data, status){

      if(data.search("Login_Success") != -1)
      {
        var ar_data = data.split("|");
        var user_obj = document.getElementById("user_input");
        var pass_obj = document.getElementById("pass_input");
        var main_obj = document.getElementById("main_load");
        document.getElementById("getUsername").innerHTML = ar_data[1];
        user_obj.value = null;
        pass_obj.value = null;
        main_obj.style.display = "none";
        $("#login_success").load("manage.php");
        $("#p_login_success").modal();
      }
      else if(data.search("Login_Already") != -1)
      {
        $("#p_login_error_already").modal();
      }
      else {
        $("#p_login_error").modal();
      }
    });
  });
});
</script>
<style>
@font-face {
  font-family: FCActiveRegular;
  src: url(font/FCActiveRegular.ttf);
}
body, html {
  margin: 0;
  font-family: FCActiveRegular;
  font-size: 18px;
}
body {
  background: url('image/wallpaper2.jpg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;
}
#out_input,#out_register
{
  margin:0 auto;
  width:300px;
}
.title_input
{
  width:90%;
  color:white;
  margin:0 auto;
}
.fix-center
{
  width:100%;
  margin: 0 auto;
  position: absolute;
  top: 40%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
</style>
</head>
<body style="padding:0px;margin:0px;">
<div id="main_load" style="display:none;">

  <div class="fix-center">
    <div class="title_input">
      <center>
        <h1>
          <font color="black">ระบบจัดการห้องสมุด</font>
        </h1>
        <br>
      </center>
    </div>
    <div id="out_input">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" id="user_input" class="form-control" placeholder="ชื่อผู้ใช้" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="password" id="pass_input" class="form-control" placeholder="รหัสผู้ใช้" aria-label="Password" aria-describedby="basic-addon1">
      </div>
      <input type="submit" id="submit_input" class="btn btn-success btn-lg btn-block" value="เข้าสู่ระบบ"><br>
      <input type="submit" id="" class="btn btn-warning btn-lg btn-block" onclick="document.getElementById('out_input').style.display='none';document.getElementById('out_register').style.display='block';" value="สมัครสมาชิก"><br>
    </div>
    <div id="out_register" style="display:none;">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" id="user_reg" class="form-control" placeholder="ชื่อผู้ใช้" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="password" id="pass_reg" class="form-control" placeholder="รหัสผู้ใช้" aria-label="Password" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" id="Name_reg" class="form-control" placeholder="ชื่อ" aria-label="Name" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" id="LastName_reg" class="form-control" placeholder="นามสกุล" aria-label="Lastname" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" id="Address_reg" class="form-control" placeholder="ที่อยู่" aria-label="Address" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
        </div>
        <input type="text" id="Tel_reg" class="form-control" placeholder="เบอร์โทร" aria-label="Tel" aria-describedby="basic-addon1">
      </div>
      <input type="submit" id="submit_register" class="btn btn-warning btn-lg btn-block" value="สมัครสมาชิก"><br>
      <input type="submit" id="submit_input" class="btn btn-outline-warning btn-lg btn-block" onclick="document.getElementById('out_input').style.display='block';document.getElementById('out_register').style.display='none';" value="เป็นสมาชิกอยู่แล้ว ?"><br>
    </div>
  </div>
</div>
<div id="login_success"></div>

<div class="modal fade" id="p_login_error_already" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:20px">
      <div class="modal-body">
        <div class="alert alert-warning" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          เข้าสู่ระบบไม่สำเร็จ เนื่องจากมีผู้เข้าสู่ระบบอยู่
        </div>
      </div>
      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
    </div>
  </div>
</div>

<div class="modal fade" id="p_login_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:20px">
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          เข้าสู่ระบบไม่สำเร็จ กรุณาเช็คชื่อผู้ใช้ และ รหัสผ่าน
        </div>
      </div>
      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
    </div>
  </div>
</div>

<div class="modal fade" id="p_login_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:20px">
      <div class="modal-body">
        <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          เข้าสู่ระบบสำเร็จ <a id="getUsername">NULL</a>
        </div>
      </div>
      <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
    </div>
  </div>
</div>

<div class="modal fade" id="p_register_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:20px">
      <div class="modal-body">
        <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          สมัครสมาชิกเรียบร้อย
        </div>
      </div>
      <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
    </div>
  </div>
</div>

<div class="modal fade" id="p_register_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding:20px">
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          ไม่สามารถสมัครสมาชิกได้ ชื่อผู้ใช้ถูกใช้งานแล้ว
        </div>
      </div>
      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
    </div>
  </div>
</div>
</body>
</html>
