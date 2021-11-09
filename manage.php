<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    .main_Content{
      float:left;
      margin-left:60px;
      width:100px;
      height:150px;
      cursor:pointer;
      margin-top:50px;
    }
    </style>
    <script src="js/my_Script.js"></script>
  </head>
  <body>

    <div id="frm_addlibra" style="display:none;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
        <div class="container">
          <a class="navbar-brand" href="#">ห้องสมุด</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a id="frm_addlibra_home" class="nav-link" href="#">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active disabled" href="#">[>]เพิ่มบรรณารักษ์</a>
              </li>
              <li class="nav-item">
                <a id="frm_addlibra_borrow" class="nav-link" href="#">ยืม-คืนหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_addlibra_search" class="nav-link" href="#">ค้นหาหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_addlibra_addbook" class="nav-link" href="#">เพิ่มหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_addlibra_sum" class="nav-link" href="#">รายงานสรุปยอด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onClick="Logout();" href="#">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1 class="font-weight-light">เพิ่มบรรณารักษ์</h1>
            <p class="lead">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">ชื่อบรรณารักษ์</span>
                </div>
                <input type="text" class="form-control" id="name_lib" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">นามสกุลบรรณารักษ์</span>
                </div>
                <input type="text" class="form-control" id="lastname_lib" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">ชื่อผู้ใช้(Username)</span>
                </div>
                <input type="text" class="form-control" id="user_lib"  placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">รหัสผ่าน(Password)</span>
                </div>
                <input type="password" class="form-control" id="pass_lib"  placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              <button type="button" id="insert_lib" class="btn btn-primary btn-lg btn-block">เพิ่มบรรณารักษ์</button>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="frm_borrow" style="display:none;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
        <div class="container">
          <a class="navbar-brand" href="#">ห้องสมุด</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a id="frm_borrow_Home" class="nav-link" href="#">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a id="" class="nav-link" href="#">เพิ่มบรรณารักษ์</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active disabled" href="#">[>]ยืม-คืนหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_borrow_findbook" class="nav-link" href="#">ค้นหาหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_borrow_addbook" class="nav-link" href="#">เพิ่มหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_borrow_sum" class="nav-link" href="#">รายงานสรุปยอด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onClick="Logout();" href="#">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1 class="font-weight-light">ยืม-คืนหนังสือ</h1>
            <p class="lead">
              <div class="btn-group" style="width:100%;">
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <font id="text_Set">เลือก ยืม หรือ คืน</font>
                </button>
                <div style="width:100%" class="dropdown-menu dropdown-menu-right">
                  <a>
                    <button class="dropdown-item" type="button" onclick="document.getElementById('text_Set').innerHTML='ยืมหนังสือ';document.getElementById('frm_borrow_set').style.display='block';document.getElementById('frm_return_set').style.display='none'">ยืมหนังสือ</button>
                    <button class="dropdown-item" type="button" onclick="document.getElementById('text_Set').innerHTML='คืนหนังสือ';document.getElementById('frm_borrow_set').style.display='none';document.getElementById('frm_return_set').style.display='block'">คืนหนังสือ</button>
                  </a>
                </div>
              </div>
              <div id="frm_borrow_set" style="display:none;">
                <br>

                <div class="btn-group" style="width:100%;">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a id="Select_book">
                      <font id="text_GBOOK">เลือกหนังสือ</font>
                    </a>
                  </button>
                  <div>
                  </div>
                  <div id="auto_GBOOK" style="width:100%" class="dropdown-menu dropdown-menu-right">
                    <a>
                    </a>
                  </div>
                </div>

                <br>
                <br>
                <div class="btn-group" style="width:100%;">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <font id="text_Person_borrow">เลือกผู้เช่า</font>
                  </button>
                  <input type="hidden" id="value_borrow_1">
                  <input type="hidden" id="value_borrow_2">
                  <div id="auto_Person_borrow" style="width:100%" class="dropdown-menu dropdown-menu-right">
                    <a>
                    </a>
                  </div>
                </div>
                <br><br>
                <button type="button" class="btn btn-danger" id="submit_borrow" style="width:100%;">ตกลงยืม</button>
              </div>

              <div id="frm_return_set" style="display:none;">
                <br>
                <div class="btn-group" style="width:100%;">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <font id="text_Person_return">เลือกผู้เช่า</font>
                  </button>
                  <input type="hidden" id="value_return_1">
                  <div id="auto_Person_return" style="width:100%" class="dropdown-menu dropdown-menu-right">
                    <a>
                    </a>
                  </div>
                </div>
                <br><br>
                <button type="button" class="btn btn-danger" id="submit_returned" style="width:100%;">ตกลงคืน</button>
              </div>


            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="frm_sum" style="display:none;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
        <div class="container">
          <a class="navbar-brand" href="#">ห้องสมุด</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a id="frm_sum_Home" class="nav-link" href="#">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a id="" class="nav-link" href="#">เพิ่มบรรณารักษ์</a>
              </li>
              <li class="nav-item">
                <a id="frm_sum_Borrow" class="nav-link" href="#">ยืม-คืนหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_sum_findbook" class="nav-link" href="#">ค้นหาหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_sum_addbook" class="nav-link" href="#">เพิ่มหนังสือ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active disabled" href="#">[>]รายงานสรุปยอด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onClick="Logout();" href="#">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1 class="font-weight-light">สรุปยอด รายวัน-รายเดือน-รายปี</h1>
            <p class="lead">
              <div class="btn-group" style="width:100%;">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                  กรุณาเลือก วัน - เดือน - ปี
                </button>
                <div style="width:100%;" class="dropdown-menu dropdown-menu-lg-right">
                  <input type="hidden" id="value_list" value="NULL">
                  <button class="dropdown-item" id="List_day" onClick="document.getElementById('value_list').value='day'" type="button">ข้อมูลรายวัน</button>
                  <button class="dropdown-item" id="List_month" onClick="document.getElementById('value_list').value='month'" type="button">ข้อมูลรายเดือน</button>
                  <button class="dropdown-item" id="List_year" onClick="document.getElementById('value_list').value='year'" type="button">ข้อมูลรายปี</button>
                </div>
              </div>
              <br>
              <br>
              <table class="table" id="table_list">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ชื่อผู้ยืม</th>
                    <th scope="col">ชื่อหนังสือ</th>
                    <th scope="col">ชื่อบรรณารักษ์</th>
                    <th scope="col">วันที่ยืม</th>
                    <th scope="col">วันที่ต้องคืน</th>
                    <th scope="col">สถานะ</th>
                  </tr>
                </thead>
                <tbody id="content_list">

                </tbody>
              </table>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="frm_addbook" style="display:none;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
        <div class="container">
          <a class="navbar-brand" href="#">ห้องสมุด</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a id="frm_addbook_Home" class="nav-link" href="#">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a id="" class="nav-link" href="#">เพิ่มบรรณารักษ์</a>
              </li>
              <li class="nav-item">
                <a id="frm_addbook_borrow" class="nav-link" href="#">ยืม-คืนหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_addbook_findbook" class="nav-link" href="#">ค้นหาหนังสือ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active disabled" href="#">[>]เพิ่มหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_addbook_sum" class="nav-link" href="#">รายงานสรุปยอด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onClick="Logout();" href="#">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <form method="POST" enctype="multipart/form-data" id="fileUploadForm">
        <div class="container">
          <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
              <h1 class="font-weight-light">เพิ่มหนังสือ</h1>
              <p class="lead">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">ชื่อหนังสือ</span>
                  </div>
                  <input type="text" class="form-control" name="Name_Book" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">ชื่อผู้แต่ง</span>
                  </div>
                  <input type="text" class="form-control" name="Author_Book" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">รูปภาพ</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="Picture_Book_v" onchange="document.getElementById('Picture_Book').innerHTML = $('#Picture_Book_v').val()" name="Picture_Book" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" id="Picture_Book" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">จำนวน</span>
                  </div>
                  <input type="number" class="form-control" name="qty_Book" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">สำนักพิมพ์</span>
                  </div>
                  <input type="text" class="form-control" name="Publisher" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <button type="button" id="insert_book" class="btn btn-primary btn-lg btn-block">เพิ่มหนังสือ</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div id="frm_findbook" style="display:none;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
        <div class="container">
          <a class="navbar-brand" href="#">ห้องสมุด</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a id="frm_findbook_Home" class="nav-link" href="#">หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a id="" class="nav-link" href="#">เพิ่มบรรณารักษ์</a>
              </li>
              <li class="nav-item">
                <a id="frm_findbook_borrow" class="nav-link" href="#">ยืม-คืนหนังสือ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active disabled" href="#">[>]ค้นหาหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_findbook_addbook" class="nav-link" href="#">เพิ่มหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_findbook_sum" class="nav-link" href="#">รายงานสรุปยอด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onClick="Logout();" href="#">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1 class="font-weight-light">ค้นหาหนังสือ</h1>
            <p class="lead">
              <div class="input-group input-group-lg">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-lg">กรอกชื่อ หรือ ผู้เขียนหนังสือ</span>
                </div>
                <input type="text" class="form-control" id="find_book_v" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
              </div>
            </p>
            <p class="lead" id="result_findbook">
              <table class="table" id="table_findbook">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">รหัสหนังสือ</th>
                    <th scope="col">ชื่อหนังสือ</th>
                    <th scope="col">ชื่อผู้แต่ง</th>
                    <th scope="col">รูปหนังสือ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">สำนักพิมพ์</th>
                  </tr>
                </thead>
                <tbody id="content_findbook">

                </tbody>
              </table>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="frm_manage" style="display:none;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mb-5 shadow">
        <div class="container">
          <a class="navbar-brand" href="#">ห้องสมุด</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link active disabled" href="#">[>]หน้าแรก</a>
              </li>
              <li class="nav-item">
                <a id="frm_home_addlib" class="nav-link" href="#">เพิ่มบรรณารักษ์</a>
              </li>
              <li class="nav-item">
                <a id="frm_home_borrow" class="nav-link" href="#">ยืม-คืนหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_home_findbook" class="nav-link" href="#">ค้นหาหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_home_addbook" class="nav-link" href="#">เพิ่มหนังสือ</a>
              </li>
              <li class="nav-item">
                <a id="frm_home_sum" class="nav-link" href="#">รายงานสรุปยอด</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onClick="Logout();" href="#">ออกจากระบบ</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="card border-0 shadow my-5">
          <div class="card-body p-5">
            <h1 class="font-weight-light">หนังสือใหม่</h1>
            <p class="lead">
              <?php
              require_once("connect.php");
              $sql = "SELECT * FROM book";
              $qry = $conn->query($sql);
              $n = 0;
              while($row = $qry->fetch_assoc())
              {

                  echo "<div class=\"main_Content\"><img src=\"".$row["Picture"]."\" width=\"100px\" height=\"150px\"></div>";
                
                $n++;
              }
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_logout_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              เกิดข้อผิดพลาด
            </div>
          </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_returned_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              คืนหนังสือเรียบร้อย
            </div>
          </div>
          <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_returned_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              ไม่สามารถคืนหนังสือได้
            </div>
          </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_logout_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              ออกจากระบบเรียบร้อย
            </div>
          </div>
          <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_upload_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              เกิดข้อผิดพลาด กรุณาใส่ให้ครบทุกช่อง
            </div>
          </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_upload_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              เพิ่มหนังสือเข้าสู่ฐานข้อมูลแล้ว
            </div>
          </div>
          <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_borrow_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-success" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              ยืมหนังสือแล้ว
            </div>
          </div>
          <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_borrow_error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              ยืมหนังสือไม่ได้
            </div>
          </div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="p_upload_error_unknown" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding:20px">
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              เกิดข้อผิดพลาดที่ไม่รู้จัก
            </div>
          </div>
          <button type="button" class="btn btn-success" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </body>
</html>
