var us = {

}

us.prepare = function(){
    $("#tambah").show();
    $("#batal").hide();
    $("#simpan").hide();
    $("#perbarui").hide();

    $("#griduser").show();
    $("#adduser").hide();
    $("#edituser").hide();
}

us.preparevalidation = function(){
    $("#form-add-user").validate({
        rules:
            {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                namalengkap: {
                    required: true,
                // email: true
                },
                email: {
                    required: true,
                    email: true
                },
                level: {
                    required: true,
                },
                lokasiskpd: {
                    required: true,
                },
            },
        messages:
            {
                username:"Username Tidak Boleh Kosong...",
                password:"Password Tidak Boleh Kosong...",
                namalengkap: "Nama Lengkap Tidak Boleh Kosong...",
                email: "Email Tidak Boleh Kosong...",
                level: "Level Wajib Dipilih...",
                lokasiskpd: "Lokasi SKPD Wajib DIpilih...",
            },
    });
}

us.adduser = function(){
    var nmPengguna  = $("#username").val();
    var pass        = $("#password").val();
    var nmLengkap   = $("#namalengkap").val();
    var mail        = $("#email").val();
    var lvl         = $("#level").val();
    var lokasi      = $("#lokasiskpd").select2('val');

    $.ajax({
        dataType: 'json',
        type:'post',
        url: './controller/master_user/master_user_select_find.php',
        data:{kodeUserName:nmPengguna}
    }).done(function(data){
        if(data != null){
            swal({
                title: "Tidak Diizinkan",
                text: "Username Telah Digunakan...",
                type: "error",
                confirmButtonText: "Ya"
            });
        }else{
            if(nmPengguna=="" || pass=="" || nmLengkap=="" || mail=="" || lvl=="" || lokasi=="" || lokasi==null){
                swal({
                        title: "Tidak Diizinkan",
                        text: "Mohon Periksa Kembali...",
                        type: "error",
                        confirmButtonText: "Ya"
                    });
            }else{
                $.ajax({
                    dataType: "json",
                    type: "post",
                    url: "./controller/master_user/master_user_add.php",
                    data:{usNm: nmPengguna, usPass: pass, usNmFull: nmLengkap, usMail: mail, usLvl: lvl, usLok: lokasi}
                }).done(function(data){
                    swal({
                            title: "Berhasil Disimpan!",
                            text: "Data User Berhasil Disimpan",
                            type: "success",
                            confirmButtonText: "Ya",
                    })
                    us.clearformfield();
                    us.prepare();
                    $("#DataTableUser").DataTable().ajax.reload();
                })
            }
        }
    });
}

us.editUser = function(val){

}

us.removeUser = function(val){

}

us.tambah = function(){
    $("#tambah").hide();
    $("#batal").show();
    $("#simpan").show();
    $("#perbarui").hide();

    $("#griduser").hide();
    $("#adduser").show();

    us.selectskpd();
    us.preparevalidation();
    setTimeout(function(){
        $("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"})
        $("#select2-lokasiskpd-container").css("height","34px")
    },500)
    
}

us.clearformfield = function(){
   $("#username").val("");
   $("#password").val("");
   $("#namalengkap").val("");
   $("#email").val("");
   $("#level").val("");
   $("#lokasiskpd").empty();
   us.selectskpd();
}

us.selectskpd = function(){
    // untuk menampilkan data dalam mode edit
    // $("#pencarianskpd").val(["K0002","K0006"]).trigger("change")

    $('#lokasiskpd').select2({
        placeholder: 'Pilih Data SKPD...',
        minimumResultsForSearch: Infinity,
        ajax: {
            url: './controller/master_user/master_user_select_skpd.php',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: false
        }
    });
}

us.ajaxGetDataUser = function(){
    var dataTable = $("#DataTableUser").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            url: "./controller/master_user/master_user_controller.php",
            type: "post",
            error: function(){
                $(".DataTableUser-error").html("");
                $("#DataTableUser").append('<tbody class="DataTableUser-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
                $("#DataTableUser_processing").css("display","none");
            },
            complete: function(){}
        },
        "order": [[ 0, 'desc' ],[ 1, 'desc' ],[ 3, 'desc' ]],
        "columnDefs": [ { orderable: false, targets: [5] }]
    });
}


$(document).ready(function(){
    us.prepare();
    us.ajaxGetDataUser();
})