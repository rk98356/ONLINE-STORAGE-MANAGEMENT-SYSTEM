$(document).on('dblclick', '.folder', function(){
        var path = $(this).attr('path');
        var form= document.createElement('form');
        form.method= 'post';
        var input= document.createElement('input');
        input.type= 'hidden';
        input.name= 'dir';
        input.value= path;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
      //  $('#upfile').css('display','none');
       // $('#upfolder').css('display','none');
        return false;
    });

    $(document).on('click', '.file', function(){
        var path = $(this).attr('path');
        var dir = $(this).attr('dir');
        var form= document.createElement('form');
        form.method= 'post';
        var input= document.createElement('input');
        input.type= 'hidden';
        input.name= 'file';
        input.value= path;
        form.appendChild(input);
        var input2= document.createElement('input');
        input2.type= 'hidden';
        input2.name= 'dir';
        input2.value= dir;
        form.appendChild(input2);
        document.body.appendChild(form);
        form.submit();
       // $('#upfile').css('display','none');
        //$('#upfolder').css('display','none');
        return false;
    });

    $(document).on('click','.shareto',function(){
        var path =$(this).attr("data-path");
        var type =$(this).attr("data-type");
        //alert(path);
        $(".share_to").modal();
        $("#file_path").val(path);
        $("#folder_path").val(type);
    });

    /*$(document).on('click','#share',function(){
        var nm = $('#browser').val();
        alert(nm);
    });*/

    $(document).on('click','#share',function(){
   // e.preventDefault();
    var file_path = $('#file_path').val();
    var folder_path = $('#folder_path').val();
    var nm = $('#browser').val();
    //alert(file_path);
    //alert(folder_path);
    //alert(nm);  
if(file_path != "" && nm != "" && nm != null)
{   
    if (folder_path=='folder'){
        $.ajax({
            method:'post',
            url:'stor_test.php',
            data:{
                key:'share',
                file_path:file_path,
                folder_path:folder_path,
                nm:nm,
            },
            success:function(data){
                swal({
                      text: data,
                      type: 'success',
                      title: 'Well Done'
                    })
                    .then(willSearch => {
                      if (willSearch) {
                        //window.location.href="uploadtry.php";
                      }
                    })
            }
        });
    }
    else {
        $.ajax({
            method:'post',
            url:'stor_test.php',
            data:{
                key:'share',
                file_path:file_path,
                folder_path:folder_path,
                nm:nm,
            },
            success:function(data){
                swal({
                      text: data,
                      type: 'success',
                      title: 'Well Done'
                    })
                    .then(willSearch => {
                      if (willSearch) {
                        //window.location.href="uploadtry.php";
                      }
                    })
            }
        });
    }

}
});




    $(document).on('click','.back', function(){
    var file_path = $('#file_path').val();
    window.location.href=file_path;
        //window.history.back();
    });

    $(document).on('click', '.move_to_trash', function(){
        var path =$(this).attr("data-path");
        var type =$(this).attr("data-type");
        var trash =$(this).attr("data-trash");
        var element =$(this).attr("data-element");

        $(".trash1").modal();
        $("#delete_path").val(path);
        $("#delete_path").attr('element',element);
        $("#type_path").val(type);
        $("#type_trash").val(trash);

    });

$(document).on('click','.trash_restore',function(){
   // e.preventDefault();
    var trash = $('#type_trash').val();
    var delete_path = $('#delete_path').val();
    var type_path = $('#type_path').val();
    //alert(trash);
if(delete_path != "")
{   
    if (type_path=='folder'){
        $.ajax({
            method:'post',
            url:'stor_test.php',
            data:{
                key:'delete',
                delete_path:delete_path,
                type_path:type_path,
                trash:trash

            },
            success:function(data){
                swal({
                      text: data,
                      type: 'success',
                      title: 'Well Done'
                    })
                    .then(willSearch => {
                      if (willSearch) {
                         $(".trash1").modal('hide');
                         var element = $("#delete_path").attr('element');
                         $('[data-element='+element+']').hide();
                        //window.location.href="uploadtry.php";
                      }
                    })
            }
        });
    }
    else {
        $.ajax({
            method:'post',
            url:'stor_test.php',
            data:{
                key:'delete',
                delete_path:delete_path,
                type_path:type_path,
                trash:trash
            },
            success:function(data){
                swal({
                      text: data,
                      type: 'success',
                      title: 'Well Done'
                    })
                    .then(willSearch => {
                      if (willSearch) {
                        //window.location.href="uploadtry.php";
                        $(".trash1").modal('hide');
                         var element = $("#delete_path").attr('element');
                         $('[data-element='+element+']').hide();
                      }
                    })
            }
        });
    }

}
});