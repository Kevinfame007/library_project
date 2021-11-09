var list = ["main_load","frm_manage","frm_findbook","frm_addbook","frm_sum","frm_borrow","frm_addlibra"];
function setShow(Index)
{
  for(var i = 0;i<list.length;i++)
  {
    if(list[i].search(Index) != -1)
      document.getElementById(list[i]).style.display = "block";
    else
      document.getElementById(list[i]).style.display = "none";
  }
}
var SetPage = setInterval(function(){
  var firstCheck = false;
  $.get("process_page.php",{Type: "Get"},function(data,status){
    if(data.search("p:home") != -1)
    {
      setShow("frm_manage");
    }
    else if(data.search("p:findbook") != -1)
    {
      setShow("frm_findbook");
    }
    else if(data.search("p:addbook") != -1)
    {
      setShow("frm_addbook");
    }
    else if(data.search("p:sum") != -1)
    {
      setShow("frm_sum");
    }
    else if(data.search("p:borrow") != -1)
    {
      setShow("frm_borrow");
    }
    else if(data.search("p:addlib") != -1)
    {
      setShow("frm_addlibra");
    }
    else {
      if(firstCheck == false)
      {
        setShow("frm_manage");
        firstCheck = true;
      }
    }
  });
}, 300);
function Logout()
{
  $.get("logout.php", function(data, status){
    if(data.search("Logout_Success") != -1)
    {
      clearInterval(SetPage);
      setShow("main_load");
      $("#p_logout_success").modal();
    }
    else {
      $("#p_logout_error").modal();
    }
  });
}
$(document).ready(function(){
  $("#insert_book").click(function(){
    var form = $('#fileUploadForm')[0];
    var data = new FormData(form);
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: "process_insertbook.php",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function (data) {
          if(data.search("ERROR") != -1)
          {
            $("#p_upload_error").modal();
          }
          else {
            $("#p_upload_success").modal();
          }
        },
        error: function (e) {
            $("#p_upload_error_unknown").modal();
        }
    });
  });

  $("#submit_returned").click(function(){
    $.get("return_process.php",{value: $("#value_return_1").val()},function(data,status){
      if(data.search("SUCCESS") != -1)
      {
        $("#p_returned_success").modal();
      }
      else {
        $("#p_returned_error").modal();
      }
    });
  });

  $("#submit_borrow").click(function(){
    $.get("borrow_process.php",{value: $("#value_borrow_1").val(),value1: $("#value_borrow_2").val()},function(data,status){
      if(data.search("SUCCESS") != -1)
      {
        $("#p_borrow_success").modal();
      }
      else {
        $("#p_borrow_error").modal();
      }
    });
  });

  $("#frm_home_findbook,#frm_addbook_findbook,#frm_sum_findbook,#frm_borrow_findbook,#frm_addlibra_search").click(function(){
    $.get("process_page.php",{Type: "Set",Page: "findbook"},function(data,status){
      setShow("frm_findbook");
    });
  });
  $("#frm_addbook_Home,#frm_findbook_Home,#frm_sum_Home,#frm_borrow_Home,#frm_addlibra_home").click(function(){
    $.get("process_page.php",{Type: "Set",Page: "home"},function(data,status){
      setShow("frm_manage");
    });
  });
  $("#frm_home_addbook,#frm_findbook_addbook,#frm_sum_addbook,#frm_borrow_addbook,#frm_addlibra_addbook").click(function(){
    $.get("process_page.php",{Type: "Set",Page: "addbook"},function(data,status){
      setShow("frm_addbook");
    });
  });

  $("#frm_home_sum,#frm_findbook_sum,#frm_addbook_sum,#frm_borrow_sum,#frm_addlibra_sum").click(function(){
    $.get("process_page.php",{Type: "Set",Page: "sum"},function(data,status){
      setShow("frm_sum");
    });
  });

  $("#frm_home_borrow,#frm_findbook_borrow,#frm_addbook_borrow,#frm_sum_Borrow,#frm_addlibra_borrow").click(function(){
    $.get("process_page.php",{Type: "Set",Page: "borrow"},function(data,status){
      setShow("frm_borrow");
    });
  });

  $("#frm_home_addlib").click(function(){
    $.get("process_page.php",{Type: "Set",Page: "addlib"},function(data,status){
      setShow("frm_addlibra");
    });
  })

  $("#insert_lib").click(function(){
    $.get("insertlib_process.php",{NameLib: $("#name_lib").val(),LastnameLib: $("#lastname_lib").val(),User: $("#user_lib").val(),Pass: $("#pass_lib").val()},function(data,status){
      alert(data);
    });
  });

  $("#List_day,#List_year,#List_month").click(function(){
    $.get("list_process.php",{Type:$("#value_list").val()},function(data,status){
      //alert(data);
      document.getElementById("content_list").innerHTML = null;
      var ar_data = data.split("|");
      for(var i = 0;i<ar_data.length - 1;i++)
      {
        var ar_ndata = ar_data[i].split("?");
        $("#table_list").find('tbody')
        .append($('<tr>')
        );
        for(var j = 0;j<ar_ndata.length;j++)
        {
            $("#table_list").find('tbody')
                .append($('<td>')
                    .text(ar_ndata[j])
            );
        }
      }
    });
  });
  $.get("process_borrow.php",{key: "book"},function(data,status){
    var ar_data = data.split("|");
    for(var i = 0;i<ar_data.length;i++)
    {
        $("#auto_GBOOK").find('a')
        .append($('<button>')
          .attr('class','dropdown-item')
          .attr('type','button')
          .attr('onClick',"document.getElementById('text_GBOOK').innerHTML='"+ar_data[i]+"';document.getElementById('value_borrow_2').value='"+ar_data[i]+"'")
          .text(ar_data[i])
        );
    }
  });

  $.get("process_borrow.php",{key: "person"},function(data,status){
    var ar_data = data.split("|");
    for(var i = 0;i<ar_data.length;i++)
    {
      var getName = ar_data[i].split(" ");
        $("#auto_Person_borrow").find('a')
        .append($('<button>')
          .attr('class','dropdown-item')
          .attr('type','button')
          .attr('onClick',"document.getElementById('text_Person_borrow').innerHTML='"+ar_data[i]+"';document.getElementById('value_borrow_1').value='"+getName[0]+"'")
          .text(ar_data[i])
        );
    }
    for(var i = 0;i<ar_data.length - 1;i++)
    {
        var getName = ar_data[i].split(" ");
        $("#auto_Person_return").find('a')
        .append($('<button>')
          .attr('class','dropdown-item')
          .attr('type','button')
          .attr('onClick',"document.getElementById('text_Person_return').innerHTML='"+ar_data[i]+"';document.getElementById('value_return_1').value='"+getName[0]+"'")
          .text(ar_data[i])
        );
    }
  });

  $("#find_book_v").keyup(function(){
    document.getElementById("result_findbook").innerHTML = null;
    document.getElementById("content_findbook").innerHTML = null;

    $.get("process_findbook.php",{Key: $("#find_book_v").val()},function(data,status){
      var ar_data = data.split("|");
      for(var i = 0;i<ar_data.length;i++)
      {
        var ar_ndata = ar_data[i].split("?");
        $("#table_findbook").find('tbody')
        .append($('<tr>')
        );
        for(var j = 0;j<ar_ndata.length;j++)
        {
          if(j == 3)
            $("#table_findbook").find('tbody')
                .append($('<td>')
                    .append($('<img>')
                        .attr('src', ar_ndata[j])
                        .attr('width','100px')
                        .attr('height','150px')
                        .text('Image cell')
                    )
            );
          else
            $("#table_findbook").find('tbody')
                .append($('<td>')
                    .text(ar_ndata[j])
            );
        }
      }
    });
  });
});
