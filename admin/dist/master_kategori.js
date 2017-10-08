var kategori = {

}

kategori.ajaxGetDataKategori = function(){
	// console.log("ABCD")
	var dataTable = $("#DataTableKategori").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            url: "./controller/master_kategori/master_kategori_controller.php",
            type: "post",
            error: function(){
                $(".DataTableKategori-error").html("");
                $("#DataTableKategori").append('<tbody class="DataTableKategori-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
                $("#DataTableKategori").css("display","none");
            },
            complete: function(){}
        },
        "order": [[ 0, 'ASC' ]],
        "columnDefs": [ { orderable: false, targets: [0] },{ orderable: false, targets: [3] } ]

    });
}

kategori.remove = function(id){
	swal({
	    title: "Data Akan Dihapus ?",
	    text: "Anda Akan Menghapus ID Kategori'"+id+"' !?",
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
	            url: './controller/master_kategori/master_kategori_controller_remove.php',
	            data:{value:id}
	        }).done(function(data){
	            $("#DataTableKategori").DataTable().ajax.reload();
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
	        $("#DataTableKategori").DataTable().ajax.reload();
	        swal("Batal", "Data Batal Dihapus", "error");
	    }
	});
}

kategori.save = function(){
	var keat = $("#kategori").val();

	$.ajax({
        dataType: 'json',
        type:'post',
        url: './controller/master_kategori/master_kategori_controller_select_find.php',
        data:{val: keat}
    }).done(function(data){
        if(data != null){
            swal({
                title: "Tidak Diizinkan",
                text: "Kategori SKPD Telah Digunakan...",
                type: "error",
                confirmButtonText: "Ya"
            });
        }else{
        	if(keat==""){
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
					url: "./controller/master_kategori/master_kategori_controller_add.php",
					data:{valkt: keat}
				}).done(function(data){
					swal({
							title: "Berhasil Disimpan!",
		                    text: "Data Kategori Berhasil Disimpan",
		                    type: "success",
		                    confirmButtonText: "Ya",
					});
					$("#kategori").val("");
					kategori.prepare();
					$("#DataTableKategori").DataTable().ajax.reload();
				})
			}
        }
    })
}

kategori.edit = function(id,name){
	$("#tambah").hide();
	$("#batal").show();
	$("#perbarui").show();

	$("#gridkategori").hide();
	$("#addkategori").hide();
	$("#editkategori").show();

	$("#kategoried").val(name);

	$('#perbarui').attr('onclick', 'kategori.editsave("'+id+'")');

}

kategori.editsave = function(id){
	var value = $("#kategoried").val();
	if(value==""){
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
            url: './controller/master_kategori/master_kategori_controller_edit.php',
            data:{
            	idval: id,
            	edval: value
            }
        }).done(function(data){
            swal({
                    title: "Berhasil Diubah!",
                    text: "Data Berhasil Diubah",
                    type: "success",
                    confirmButtonText: "Ya",
                });
            $("#kategoried").val("");
			kategori.prepare();
            $("#DataTableKategori").DataTable().ajax.reload();
        });
	}
}

kategori.prepare = function(){
	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();

	$("#gridkategori").show();
	$("#addkategori").hide();
	$("#editkategori").hide();
}

kategori.spotted = function(){
	$("#kategori").keyup(function(){
		this.value = this.value.toUpperCase();
	});

	$("#kategoried").keyup(function(){
		this.value = this.value.toUpperCase();
	});
	// $("#kategori").on('keyup',function(){
 //        $(this).capitalize();
 //    }).capitalize();
}

kategori.add = function(){
	$("#tambah").hide();
	$("#batal").show();
	$("#simpan").show();

	$("#gridkategori").hide();
	$("#editkategori").hide();
	$("#addkategori").show();
	
}

kategori.batal = function(){
	$("#kategori").val("");
	kategori.prepare();
}

$(document).ready(function () {
	kategori.prepare();
	kategori.spotted();
	kategori.ajaxGetDataKategori();
});