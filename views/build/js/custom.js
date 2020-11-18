var path = window.location.pathname;
var host = window.location.hostname;

$(function() {
    // hashchange jquery function
    $('#nav a[href~="' + location.href + '"]').parents('li').addClass('active highlight');
    $(window).hashchange(function(){
        var hash = $.param.fragment();
        if(hash.search('edit') == 0){
            var post_ID = getUrlVars()['id'];
            var detail = getJSON('http://'+host+path+'/action/get', {id:post_ID});
            // alert(<?= $this->uri->segment(2); ?>);
            $('#modal-edit .modal-body #file').append('<input type="file" name="image" id="image_edit" class="dropify">')
            $('#modal-edit .modal-body #username').val(detail.data['username']);
            $('#modal-edit .modal-body #full_name').val(detail.data['full_name']);
            $('#modal-edit .modal-body #email').val(detail.data['email']);
            $('#modal-edit .modal-body #phone').val(detail.data['phone']);
            $loc = "./upload/avatars/"+detail.data['photo'];
            $('#modal-edit .modal-body #image_edit').attr("data-default-file",$loc);
            $('#image_edit').dropify();
            // $('.dropify-render > img').attr('src' ,imageUrll);
            // $('#modal-form .modal-body #image').dropify();
            $('#modal-edit').modal('show');
            
        }

    });
    getDropify('#image');

    // ambil_karyawan();
});
$(window).trigger('hashchange');
$(window).trigger('dropify');

$('#modal-form').on('hidden.bs.modal', function (e) {

    window.history.pushState(null, null, path); // hapus hash 
    $('#modal-form form').find("input").val("");
    $('#modal-form').hide();
});


$(document).on('click','#hapus',function(eve){
    eve.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({
        title: 'Apa Kamu Yakin?',
        text: "Kamu tidak dapat memulihkannya setelah menghapus !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya Hapus Saja!'
    }).then((result) => {
        if (result.isConfirmed) {
        $.ajax('http://' + host + path + '/delete',{
            dataType:'json',
            type:'POST',
            data : {id:id},
            success: function(data){
            if(data.status == 'success'){
                Swal.fire(
                'Deleted!',
                'File Kamu Sudah Terhapus',
                'success'
                ).then((result)=>{location.reload()})
            }
            }
        });
        
        }
    });

});

$(document).on('click','#submit-karyawan',function(eve){
    eve.preventDefault();
    var action = $('#form-karyawan').attr('class');

    // return console.log(action);
    // datatosend = $('#form-karyawan').serialize();
    // return console.log(datatosend);
    // var data = new FormData(form);
    // return console.log(data);
    // const fileupload = $('#image').prop('files')[0];
    // let formData = new FormData(); 
    // formData.append('fileupload', fileupload);
    // formData.append('form', datatosend);
    var form = $('#form-karyawan')[0];

    var data = new FormData(form);
    // return console.log(data);
        
    $.ajax('http://' + host + path + '/action/'+action,{
        dataType:'json',
        type:'POST',
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        async:false,
        data: data,
        success:function(data){
            alert('sukses');
            // return console.log(data.post);
            if(data.response == 'success'){
                $('#modal-form').modal('hide');
                Swal.fire(
                    'Sukses!',
                    'File Kamu Sudah Tersimpan',
                    'success'
                    ).then((result)=>{location.reload()})
            }
            else if(data.response == 'failed'){
                if(data.error){
                    toastr["error"](data.error);
                }
            }
            console.log(data);
        },
        error:function(e){
            alert('error');
            console.log(e.responseText);
        }
    });
});

// $(document).on('click','#submit-edit',function(eve){
//     eve.preventDefault();
//     var action = $('#form-karyawan').attr('class');
//     // return console.log(action);
//     // datatosend = $('#form-karyawan').serialize();
//     // return console.log(datatosend);
//     // var data = new FormData(form);
//     // return console.log(data);
//     // const fileupload = $('#image').prop('files')[0];
//     // let formData = new FormData(); 
//     // formData.append('fileupload', fileupload);
//     // formData.append('form', datatosend);
//     $nip = $('#nip').val();
//     $name = $('#full_name').val();
//     $email = $('#email').val();
//     $phone = $('#phone').val();
//     var image = $("#image")[0].files[0];
//     var fd = new FormData();

//     fd.append("nip", nip);
//     fd.append("name", name);
//     fd.append("email", email);
//     fd.append("phone", phone);
//     if ($("#image")[0].files.length > 0) {
//         fd.append("image", image);
//     }

//     // return console.log(data);
        
//     $.ajax('http://' + host + path + '/action/'+action,{
//         dataType:'html',
//         type:'POST',
//         processData: false,  // Important!
//         contentType: false,
//         data: fd,
//         success:function(data){
//             alert('sukses');
//             // return console.log(data.post);
//             if(data.response == 'success'){
//                 $('#modal-form').modal('hide');
//                 Swal.fire(
//                     'Sukses!',
//                     'File Kamu Sudah Tersimpan',
//                     'success'
//                     ).then((result)=>{location.reload()})
//             }
//             else if(data.response == 'failed'){
//                 if(data.error){
//                     toastr["error"](data.error);
//                 }
//             }
//             console.log(data);
//         },
//         error:function(e){
//             alert('error');
//             console.log(e.responseText);
//         }
//     });
// });


// function asd() {
//         $.ajax('http://' + host + path + '/action/ambil', {
//         dataType: 'json',
//         type: 'POST',
//         success: function (data) {
//             $.each(data.record,funtion(index,element){
//                 $('table#dynamic-table').find('tbody').append(
//                 '<tr>'+
//                 '<td class="center">'+
//                     '<label class="pos-rel">'+
//                         '<input type="checkbox" class="ace" />'+
//                         '<span class="lbl"></span>'+
//                     '</label>'+
//                 '</td>'+
//                 '<td>'+element.nip+'</td>'+
//                 '<td class="hidden-480">'+element.nama+'</td>'+
//                 '<td>'+element.email+'</td>'+
//                 '<td>'+
//                     '<div class="hidden-sm hidden-xs action-buttons">'+
//                         '<a class="blue" href="#">'+
//                             '<i class="ace-icon fa fa-search-plus bigger-130"></i>'+
//                         '</a>'+

//                         '<a class="green" href="#">'+
//                             '<i class="ace-icon fa fa-pencil bigger-130"></i>'+
//                         '</a>'+

//                         '<a class="red" href="#">'+
//                             '<i class="ace-icon fa fa-trash-o bigger-130"></i>'+
//                         '</a>'+
//                     '</div>'+

//                     '<div class="hidden-md hidden-lg">'+
//                         '<div class="inline pos-rel">'+
//                             '<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">'+
//                                 '<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>'+
//                             '</button>'+

//                             '<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">'+
//                                 '<li>'+
//                                     '<a href="#" class="tooltip-info" data-rel="tooltip" title="View">'+
//                                         '<span class="blue">'+
//                                             '<i class="ace-icon fa fa-search-plus bigger-120"></i>'+
//                                         '</span>'+
//                                     '</a>'+
//                                 '</li>'+

//                                 '<li>'+
//                                     '<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">'+
//                                         '<span class="green">'+
//                                             '<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>'+
//                                         '</span>'+
//                                     '</a>'+
//                                 '</li>'+

//                                 '<li>'+
//                                     '<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">'+
//                                         '<span class="red">'+
//                                             '<i class="ace-icon fa fa-trash-o bigger-120"></i>'+
//                                         '</span>'+
//                                     '</a>'+
//                                 '</li>'+
//                             '</ul>'+
//                         '</div>'+
//                     '</div>'+
//                 '</td>'+
//             '</tr>');
                
//             });
//             }
//         });
    
// }

function getJSON(url,data){
    return JSON.parse($.ajax({
        type: 'POST',
        url : url,
        data:data,
        dataType:'json',
        global: false,
        async: false,
        success:function(msg){

        }
    }).responseText);
}
function getUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function getDropify(id){
    var id = id
    $(id).dropify({
        messages: {
            default: 'Drag atau Drop Untuk Foto Profil',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });
}
function clear(){
    var drEvent = $('#image').dropify();
    drEvent = drEvent.data('dropify');
    drEvent.resetPreview();
    drEvent.clearElement();
}

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}