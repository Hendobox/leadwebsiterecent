$(document).ready(function(){
    

    $(document).on("click","#merge", function(){
        var depoid = $(this).attr("depoid");
        var withid = $(this).attr("withid");
        // console.log(depoid, withid);
        mergeData('merge-to-depositor', depoid, withid, 'withdrawal');       

    })

    $(document).on("click","#merged", function(){
        var depoid = $(this).attr("depoid");
        var withid = $(this).attr("withid");
        // console.log(depoid, withid);
        mergeData('depositor-to-withdrawal', depoid, withid, 'depositor');       

    })




    function mergeData(dataLink, dataId, dataWith, dataBack){
        var depoid = dataId;
        var withid = dataWith;
        var linkData = dataLink;
        var backData = dataBack;
        swal({
            title: 'Are you sure?',
            text: 'Once merge, you will not be able to revert it!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: 'ajax-process',
                    type: 'POST',
                    data: {dataPost:'Merged',depoid:depoid, withid:withid, databack:dataBack}
                })
                .done(function(response){
                    swal('Account merged!', { icon: 'success', title: 'Successful!', });
                    setInterval(function(){
                        window.location.assign(linkData);
                    },2000)
                })
                .fail(function(){
                    swal('Oops!, Something went wrong!', { icon: 'error', title: 'Fail!',});
                });
    
            }

          });
    }


//define a function to use and delete anything you want to delete on this application
function addDelete(dataPost, linkBack, dataId){

    var dataId = dataId;
    var dataPost = dataPost;
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover this file!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: 'ajax-process.php',
                type: 'POST',
                data: {dataPost:dataPost,id:dataId}
            })
            .done(function(response){
                swal('Your file has been deleted!', { icon: 'success', title: 'Successful!', });
                setInterval(function(){
                    window.location.assign(linkBack);
                },2000)
            })
            .fail(function(){
                swal('Oops!, Something went wrong!', { icon: 'error', title: 'Fail!',});
            });

        } else {
        swal('Your file is safe!');
        }
      });
  }






})