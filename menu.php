<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="navbar-brand" href="#">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a id="Go2Manage" onClick="go2Manage(this)" class="nav-link" href="#">หน้าแรก</a>
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
