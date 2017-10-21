var us = {

}

us.prepare = function(){
    $("#batal").hide();
    $("#simpan").hide();
    $("#perbarui").hide();
    $("#tambah").show();

    $("#adduser").hide();
    $("#edituser").hide();
    $("#griduser").show();
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

    $("#form-edit-user").validate({
        rules:
            {
                edusername: {
                    required: true,
                },
                edpassword: {
                    required: true,
                },
                ednamalengkap: {
                    required: true,
                // email: true
                },
                edemail: {
                    required: true,
                    email: true
                },
                edlevel: {
                    required: true,
                },
                edlokasiskpd: {
                    required: true,
                },
            },
        messages:
            {
                edusername:"Username Tidak Boleh Kosong...",
                edpassword:"Password Tidak Boleh Kosong...",
                ednamalengkap: "Nama Lengkap Tidak Boleh Kosong...",
                edemail: "Email Tidak Boleh Kosong...",
                edlevel: "Level Wajib Dipilih...",
                edlokasiskpd: "Lokasi SKPD Wajib DIpilih...",
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

us.editUser = function(id, nm, fn, em, ps, lvl, lokid, loknm){
    $("#tambah").hide();
    $("#simpan").hide();
    $("#batal").show();
    $("#perbarui").show();

    $("#griduser").hide();
    $("#adduser").hide();
    $("#edituser").show();

    us.selectskpd();
    us.preparevalidation();
    setTimeout(function(){
        $("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"})
        $("#select2-lokasiskpd-container").css("height","34px")
    },500);

    $("#edusername").val(nm);
    $("#edpassword").val(ps);
    $("#ednamalengkap").val(fn);
    $("#edemail").val(em);
    $("#edlevel").val(lvl);
    $("#edlokasiskpd").empty().append('<option selected value='+lokid+'>'+loknm+'</option>');
}

us.editUserSave = function(id){
    var nmPengguna  = $("#edusername").val();
    var pass        = $("#edpassword").val();
    var nmLengkap   = $("#ednamalengkap").val();
    var mail        = $("#edemail").val();
    var lvl         = $("#edlevel").val();
    var lokasi      = $("#edlokasiskpd").select2('val');

    if(nmPengguna=="" || pass=="" || nmLengkap=="" || mail=="" || lvl=="" || lokasi=="" || lokasi==null){
        swal({
                title: "Tidak Diizinkan",
                text: "Mohon Periksa Kembali...",
                type: "error",
                confirmButtonText: "Ya"
            });
    }else{
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: './controller/master_user/master_user_edit.php',
            data:{
                ednmPengguna: nmPengguna,
                edpass: pass, 
                ednmLengkap: nmLengkap, 
                edmail: mail,
                edlvl: lvl,
                edlokasi: lokasi
            }
        }).done(function(data){
            swal({
                    title: "Berhasil Diubah!",
                    text: "Data Berhasil Diubah",
                    type: "success",
                    confirmButtonText: "Ya",
                });
            us.prepare()
            $("#DataTableUser").DataTable().ajax.reload();
        });
    }
}

us.removeUser = function(id, us){
    swal({
        title: "Data Akan Dihapus ?",
        text: "Anda Akan Menghapus '"+us+"' !?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                dataType: 'json',
                type:'post',
                url: './controller/master_user/master_user_remove.php',
                data:{kodeUserName:us}
            }).done(function(data){
                $("#DataTableUser").DataTable().ajax.reload();
                // swal("Berhasil Dihapus!", "Data Berhasil Dihapus", "success");
                swal({
                    title: "Berhasil Dihapus!",
                    text: "Data Berhasil Dihapus",
                    type: "success",
                    confirmButtonText: "Ya",
                })
                // toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        } else {
            $("#DataTableUser").DataTable().ajax.reload();
            swal("Batal", "Data Batal Dihapus", "error");
        }
    });
}

us.tambah = function(){
    $("#tambah").hide();
    $("#perbarui").hide();
    $("#batal").show();
    $("#simpan").show();
    

    $("#griduser").hide();
    $("#adduser").show();

    us.selectskpd();
    us.preparevalidation();
    $("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"});
    $("#select2-lokasiskpd-container").css("height","34px");
    $("#select2-katskpd-container").css("line-height","34px");

  
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

    $('#edlokasiskpd').select2({
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
        "order": [[ 0, 'asc' ]],
        "columnDefs": [ { orderable: false, targets: [7] }, { orderable: false, targets: [4] }]
    });
}


$(document).ready(function(){
    us.prepare();
    us.ajaxGetDataUser();
})