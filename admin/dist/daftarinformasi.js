
function calledPrepare(){
	var paramurl =	$("#paramfromurl").text();
	if(paramurl == "InformasiSertaMerta"){
		var aval = $("#titledaftarinformasi").text("Daftar Informasi Serta Merta");
		hal.jenisdok("1");
	}else if(paramurl == "InformasiBerkala"){
		$("#titledaftarinformasi").text("Daftar Informasi Berkala");
		hal.jenisdok("2");
	}else if(paramurl == "InformasiSetiapSaat"){
		$("#titledaftarinformasi").text("Daftar Informasi Setiap Saat");
		hal.jenisdok("3");
	}else{
		$("#DataTableInformasi").hide();
		swal({
            title: "Terjadi Kesalahan",
            text: "Beberapa saat anda akan kembali pada halaman utama",
            type: "error",
            showCancelButton: false,
  			showConfirmButton: false
        });
        setTimeout(function(){
          window.location.href = "index.php?page=beranda";
      },3000);
	}
	ajaxGetDataInformasi();
}

function openModalInformasi(id, nama){
    $.ajax({
        dataType: 'json',
        type:'post',
        url: './admin/controller/data_dokumen/data_dokumen_show_edit.php',
        data:{kode:id}
    }).done(function(data){
        $("#modalinformasi").modal('show');
        $("#titleinformasi").text(nama);
        $('#isiinformasi').data("wysihtml5").editor.setValue(data.RANGKUMANDOKUMEN);
        $(".modal-body .wysihtml5-toolbar").hide();
    });
	
}

function ajaxGetDataInformasi(){
	var dataTable = $("#DataTableInformasi").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "./admin/controller/daftar_informasi/daftar_informasi.php",
            "type": "POST",
            "data": function ( d ) { 
            	return $.extend( {}, d, {
            		"jenisdokumen" : hal.jenisdok()
            	} );
            },
            error: function(){
                $(".DataTableInformasi-error").html("");
                $("#DataTableInformasi").append('<tbody class="DataTableInformasi-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
                $("#DataTableInformasi").css("display","none");
            },
            complete: function(){}
        },
        "order": [[ 0, 'asc' ]],
        "columnDefs": [{ orderable: false, targets: [1] }, { orderable: false, targets: [2] }, { orderable: false, targets: [3] }]
    });	
    setTimeout(function(){
    	$("#DataTableInformasi").DataTable().ajax.reload();
    	$("#DataTableInformasi_filter").hide();
    	$("#DataTableInformasi_info").hide();
    });	
}

$(document).ready(function(){
	calledPrepare();
	$('#isiinformasi').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
});