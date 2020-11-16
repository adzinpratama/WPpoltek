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
            $('#modal-form .modal-body #username').val(detail.data['username']);
            $('#modal-form .modal-body #full_name').val(detail.data['full_name']);
            $('#modal-form .modal-body #email').val(detail.data['email']);
            $('#modal-form .modal-body #phone').val(detail.data['phone']);
            $loc = "./upload/avatars/"+detail.data['photo'];
            $('#modal-form .modal-body #image').attr("data-default-file",$loc);
            getDropify()
            // $('.dropify-render > img').attr('src' ,imageUrll);
            // $('#modal-form .modal-body #image').dropify();
            $('#modal-form').modal('show');
            
        }

    });

    
});
$(window).trigger('hashchange');
$('.dropify').trigger('dropify');

$('#modal-form').on('hidden.bs.modal', function (e) {
    window.history.pushState(null, null, path); // hapus hash 
    e.preventDefault();
    
    $('#modal-form form').find("input").val("");
    $('#modal-form form').find("input[type=file]").attr("data-default-file","");
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
                )
            }
            }
        });
        
        }
    });
});

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

function getDropify(){
    $('.dropify').dropify({
        messages: {
            default: 'Drag atau Drop Untuk Foto Profil',
            replace: 'Ganti',
            remove:  'Hapus',
            error:   'error'
        }
    });
}
function stop(){
    $('.dropify').dropify().stop();
}