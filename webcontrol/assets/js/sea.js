$(document).ready(function(){
    
   
    $(document).on("click","#deleted",function() {
      var id = $(this).attr("intid"); 
      addDelete('depDelete', 'staffs', id);
    });

    
  
  
    $(document).on("click","#deletex",function() {
      var id = $(this).attr("intid"); 
      addDelete('examDelete', 'examinations', id);
    });
  
  
    $(document).on("change", "#depart", function(){
      var option = $(this).find('option:selected');
      // var selected =$(this).attr("select")
      var value= option.val();
      // var text = option.text();
      // alert(value);
      if(value !=""){
        $.ajax({
          url:"category-search",
          method:"POST",
          data:{searchSub:1,id:value},
          success:function(data){
             $("#departs").html(data);
          }
  
      });
      }else{
        $("#departs").html('<option value="">Choose Examination</option>');
      }
  
    })





$(document).on("click","#readDel",function() {
  var id = $(this).attr("rid");
  var img ='';
  var name ="Delete this Report?";
  var textSuccess ="Deleted successfully?";
  var text ="You want to delete this report? if yes, press OK";
  var textOff ="Account has been deleted successfully";
  addDelete('readDel', 'reports', id, name, text, textOff, textSuccess, img);
  });



  //confirm
  $(document).on("click","#testApprove",function() {    
    var tid = $(this).attr("tid");
    var img ='';
    var name ="Approve this comment?";
    var textSuccess ="Approved successfully?";
    var text ="if yes, press OK";
    var textOff ="Comment has been approved successfully";
    addDelete('approveTest', 'comments', tid, name, text, textOff, textSuccess, img);
    });


    //confirm Delete
  $(document).on("click","#readApp",function() {    
    var tid = $(this).attr("tid");
    var img ='';
    var name ="Delete this comment?";
    var textSuccess ="Delete successfully?";
    var text ="if yes, press OK";
    var textOff ="Comment has been delete successfully";
    addDelete('approveDel', 'comments', tid, name, text, textOff, textSuccess, img);
    });

    $(document).on("click","#deletebank",function() {    
      var tid = $(this).attr("bid");
      var img = $(this).attr("img"); 
      var name ="Delete this Blog?";
      var textSuccess ="Delete successfully?";
      var text ="You want to delete this blog? if yes, press OK";
      addDelete('bankDel', 'blog', tid, name, text, textSuccess,img);
      
      });

  
//Update Testimony
$(document).on("click","#readTest",function() {
  $('.updateMe').modal('show');
  var text = $(this).attr("text");
  var tid = $(this).attr("tid");
  var name = $(this).attr("dname");
  $("#textid").val(tid);
  $("#uptext").val(text);
  $("#dnames").text(name);
  

});


  
  

  $(document).on("click","#deleted",function() {
  var id = $(this).attr("intid"); //console.log(id);
  var img ='';
  var name ="Delete this staff account?";
  var textSuccess ="Deleted successfully?";
  var text ="You want to delete this account? if yes, press OK";
  var textOff ="Account has been deleted successfully";
  addDelete('depDelete', 'staffs', id, name, text, textOff, textSuccess, img);
  });
  
  
  
    $(document).on("click","#bans",function() {
      var id = $(this).attr("intid"); //console.log(id);    
      var name ="Ban this user?";
      var textSuccess ="Banned successfully?";
      var text ="You want to ban this account? if yes, press OK";
      updateData('Ban', 'Staffs', id, name, text, textSuccess);
    });

    $(document).on("click","#unbans",function() {
      var id = $(this).attr("intid"); //console.log(id);    
      var name ="Unban this user?";
      var textSuccess ="Active successfully?";
      var text ="You want to unban this account? if yes, press OK";
      updateData('unBan', 'Staffs', id, name, text, textSuccess);
    });







  
    //define a function to use and update anything you want to update on this application
    function updateData(dataPost, linkBack, dataId, dataName, dataText, dataSuccess){
      var dataId = dataId;
      var dataPost = dataPost;
      var datanames = dataName;
      var datatext = dataText;
      var datasuccess = dataSuccess;
      swal({
          title: datanames,
          text: datatext,
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: 'ajax-process',
                  type: 'POST',
                  data: {dataPost:dataPost,id:dataId}
              })
              .done(function(){
                  swal(datasuccess, { icon: 'success', title: 'Successful!', });
                  setInterval(function(){
                      window.location.assign(linkBack);
                  },2000)
              })
              .fail(function(){
                  swal('Oops!, Something went wrong!', { icon: 'error', title: 'Fail!',});
              });
  
          }
        });
    }
 

    //define a function to use and delete anything you want to delete on this application
    function addDelete(dataPost, linkBack, dataId, dataName, dataText, dataSuccess, dataImg){
      var dataId = dataId;
      var dataPost = dataPost;
      var datanames = dataName;
      var datatext = dataText;
      var datasuccess = dataSuccess;
       var img = dataImg;
      swal({
          title: datanames,
          text: datatext,
          icon: 'warning',
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: 'ajax-process',
                  type: 'POST',
                  data: {dataPost:dataPost,id:dataId,img:img}
              })
              .done(function(){
                  swal(datasuccess, { icon: 'success', title: 'Successful!', });
                  setInterval(function(){
                      window.location.assign(linkBack);
                  },2000)
              })
              .fail(function(){
                  swal('Oops!, Something went wrong!', { icon: 'error', title: 'Fail!',});
              });
  
          }
        });
    }



  })


  
  