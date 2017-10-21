var dok = {
	ubahdokumen: ko.observable(false),
	jenisdokname : ko.observable(""),
}

dok.prepare = function(){
	dok.resetform();
	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();

	$("#griddokumen").show();
	$("#adddokumen").hide();
	$("#editdokumen").hide();
	
}

dok.resetform = function(){
	$("#katskpd").empty();
	$("#namadokumen").val("");
    $('#rangkuman').data("wysihtml5").editor.clear();
    $("#foto").val("");
    $("#replacedokumen").html("");
 	$("#replacedokumen").append("<div class='fileupload fileupload-new' data-provides='fileupload'><div class='input-group'><div class='form-control uneditable-input span3' data-trigger='fileupload'><i class='glyphicon glyphicon-file fileupload-exists'></i> <span class='fileupload-preview'></span></div><span id='fotoreplace' class='input-group-addon btn btn-default btn-file'><span class='fileupload-new'>Select file</span><span class='fileupload-exists'>Change</span><input id='filedokumen' type='file' name='...'/></span></div></div></div>")
}

dok.tambah = function(){
	$("#tambah").hide();
	$("#batal").show();
	$("#simpan").show();
	$("#perbarui").hide();

	$("#griddokumen").hide();
	$("#adddokumen").show();
	$("#editdokumen").hide();

	var level 		= page.level();
	var skpd 		= page.skpd();
	var skpdname	= page.skpdname();
	if(level != "Super Admin"){
		dok.selectSKPD();
		$("#katskpd").empty().append('<option selected value='+skpd+'>'+skpdname+'</option>');
		$('#katskpd').prop("disabled", true);
	}else{
		dok.selectSKPD();
	}
	$("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"});
    $("#select2-lokasiskpd-container").css("height","34px");
}

dok.addDokumen = function(){
	page.loader(true);
	var ks = $("#katskpd").select2('val');
	var jd = $("#namadokumen").val();
	var is = $("#rangkuman").val();
	var jnd= $("#jdok").val();
	if(jnd == '1'){ dok.jenisdokname("Informasi Berkala") }else if(jnd == '2'){ dok.jenisdokname("Informasi Serta Merta") }else{ dok.jenisdokname("Informasi Setiap Saat") }

	var ft = $("#filedokumen")[0].files.length;

	if(ks == null || jd =="" || ft==0 ){
		swal({
            title: "Tidak Diizinkan",
            text: "Mohon Periksa Kembali...",
            type: "error",
            confirmButtonText: "Ya"
        });
        page.loader(false);
	}else{
		var ftformat = $("#filedokumen")[0].files[0].type;
		if(ftformat == "application/pdf"){
			
	        var data = new FormData();
		    data.append('katskpd', $("#katskpd").select2('val')); 
		    data.append('judul', $("#namadokumen").val()); 
		    data.append('isi', $("#rangkuman").val());
		    data.append('jenisdok', $("#jdok").val());
		    data.append('jenisdokname', dok.jenisdokname());
		    data.append('foto', $("#filedokumen")[0].files[0]);
		    data.append('user', page.user());

		    
		    $.ajax({
				url: './controller/data_dokumen/data_dokumen_add.php', 
				type: 'POST',
				data: data, 
				processData: false,
				contentType: false,
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 
					if(response.status == "sukses"){ 
						swal({
	                            title: "Berhasil Disimpan!",
	                            text: response.pesan,
	                            type: "success",
	                            confirmButtonText: "Ya",
	                    });
	                    page.loader(false);
	                    $("#namadokumen").val("");
	                    $('#rangkuman').data("wysihtml5").editor.clear();
					    $("#filedokumen").val("");
					    $("#replacedokumen").html("");
					 	$("#replacedokumen").append("<div class='fileupload fileupload-new' data-provides='fileupload'><div class='input-group'><div class='form-control uneditable-input span3' data-trigger='fileupload'><i class='glyphicon glyphicon-file fileupload-exists'></i> <span class='fileupload-preview'></span></div><span id='dokumenreplace' class='input-group-addon btn btn-default btn-file'><span class='fileupload-new'>Select file</span><span class='fileupload-exists'>Change</span><input id='filedokumen' type='file' name='...'/></span></div></div></div>")
					 	$("#DataTableDokumen").DataTable().ajax.reload();
		                
					}else{ 
						swal({
				            title: "Terjadi Kesalahan",
				            text: response.pesan,
				            type: "error",
				            confirmButtonText: "Ya"
				        });
				        page.loader(false);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) { 
				
				swal({
			            title: "Terjadi Kesalahan",
			            text: xhr.responseText,
			            type: "error",
			            confirmButtonText: "Ya"
			        });
				page.loader(false);
				}
		    });
		}else{
			swal({
	            title: "Tidak Diizinkan",
	            text: "Mohon Periksa Format File Dokumen, Format yang diperbolehkan hanya: PDF",
	            type: "error",
	            confirmButtonText: "Ya"
	        });
	        page.loader(false);
		}
	}
}

dok.ajaxGetDataDokumen = function(v){
	var dataTable = $("#DataTableDokumen").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "./controller/data_dokumen/data_dokumen_controller.php",
            "type": "POST",
            "data": function ( d ) { 
            	return $.extend( {}, d, {
            		"idskpd" : page.skpd(),
            		"level"	 : page.level()
            	} );
            },
            error: function(){
                $(".DataTableDokumen-error").html("");
                $("#DataTableDokumen").append('<tbody class="DataTableDokumen-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
                $("#DataTableDokumen_processing").css("display","none");
            },
            complete: function(){}
        },
        "order": [[ 0, 'asc' ]],
        "columnDefs": [ { orderable: false, targets: [0] }]
    });	
    setTimeout(function(){
    	$("#DataTableDokumen").DataTable().ajax.reload();
    	if(page.level() != "Super Admin"){
	    	$("#DataTableDokumen_filter").hide();
	    	$("#DataTableDokumen_info").hide();
	    	
	    }else{
	    	// $("#DataTableDokumen_filter").show();
	    }
    });	
}

dok.spottedUbahDokumen = function(){
	$("#edreplacedokumen").hide();
	$("#edubahdok").on('switchChange.bootstrapSwitch', function (event, state) {
        var sesuai = $("#edubahdok").is(':checked');
        if(sesuai != true){
            $("#edreplacedokumen").hide();
            dok.ubahdokumen(false);
        }else{
            $("#edreplacedokumen").show();
            dok.ubahdokumen(true);
        }
    });
}

dok.editDokumen = function(id){
	$("#tambah").hide();
	$("#simpan").hide();
	$("#batal").show();
	$("#perbarui").show();

	$("#griddokumen").hide();
	$("#adddokumen").hide();
	$("#editdokumen").show();

	dok.spottedUbahDokumen();


	$.ajax({
        dataType: 'json',
        type:'post',
        url: './controller/data_dokumen/data_dokumen_show_edit.php',
        data:{kode:id}
    }).done(function(data){
    	
    	var level 		= page.level();
		var skpd 		= page.skpd();
		var skpdname	= page.skpdname();
		if(level != "Super Admin"){
			// Untuk Admin Operator
			dok.selectSKPD();
			$("#edkatskpd").empty().append('<option selected value='+skpd+'>'+skpdname+'</option>');
			$('#edkatskpd').prop("disabled", true);
		}else{
			// Untuk Super Admin
			dok.selectSKPD();
			$("#edkatskpd").empty().append('<option selected value='+data.IDSKPD+'>'+data.NAME+'</option>');
		}
		$("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"});
	    $("#select2-lokasiskpd-container").css("height","34px");

	    $("#perbarui").attr('onclick','dok.editDokumenSave("'+id+'")');

	    // Mengisi field2 lanjutan
	    $("#ednamadokumen").val(data.NAMADOKUMEN);
	    $("#edjdok").val(data.JENIS);
	    $('#edrangkuman').data("wysihtml5").editor.setValue(data.RANGKUMANDOKUMEN);
    });
}

dok.editDokumenSave = function(id){
	var ks = $("#edkatskpd").select2('val');
	var jd = $("#ednamadokumen").val();
	var jns= $("#edjdok").val();
	if(jns == '1'){ dok.jenisdokname("Informasi Berkala") }else if(jns == '2'){ dok.jenisdokname("Informasi Serta Merta") }else{ dok.jenisdokname("Informasi Setiap Saat") }

	var is = $("#edrangkuman").val();
	var us = page.user();
	var fl = $("#edfiledokumen")[0].files.length;
	page.loader(true);
	var a = dok.ubahdokumen();
	if(a != true){
		//Jika update tidak dengan file
		if(ks == null || jd =="" ){
			swal({
	            title: "Tidak Diizinkan",
	            text: "Mohon Periksa Kembali...",
	            type: "error",
	            confirmButtonText: "Ya"
	        });
	        page.loader(false);
		}else{
			$.ajax({
                dataType: "json",
                type: "post",
                url: "./controller/data_dokumen/data_dokumen_edit_no_file.php",
                data:{iddokumen: id, skpd: ks, namadok: jd, rangkuman: is, jenisdokumen: jns, jenisname: dok.jenisdokname(), user: us}
            }).done(function(data){
                swal({
                        title: "Berhasil Disimpan!",
                        text: "Data Dokumen Berhasil Disimpan",
                        type: "success",
                        confirmButtonText: "Ya",
                })
                // us.clearformfield();
                dok.prepare();
                $("#DataTableDokumen").DataTable().ajax.reload();
            });
            page.loader(false);
		}
	}else{
		//Jika update menggunakan file
		var fileformat = $("#edfiledokumen")[0].files[0].type;
		if(fileformat == "application/pdf"){
			
	        var data = new FormData();
	        data.append('iddokumen', id);
		    data.append('katskpd', $("#edkatskpd").select2('val')); 
		    data.append('namadokumen', $("#ednamadokumen").val()); 
		    data.append('rangkuman', $("#edrangkuman").val());
		    data.append('jenisdokumen', $("#edjdok").val());
		    data.append('jenisname', dok.jenisdokname());
		    data.append('file', $("#edfiledokumen")[0].files[0]);
		    data.append('user', page.user());

		    page.loader(true);
		    $.ajax({
				url: './controller/data_dokumen/data_dokumen_edit_with_file.php', 
				type: 'POST',
				data: data, 
				processData: false,
				contentType: false,
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 
					if(response.status == "sukses"){ 
						swal({
	                            title: "Berhasil Disimpan!",
	                            text: response.pesan,
	                            type: "success",
	                            confirmButtonText: "Ya",
	                    });
	                    page.loader(false);
	                    dok.prepare();
		                $("#DataTableDokumen").DataTable().ajax.reload();
					}else{ 
						swal({
				            title: "Terjadi Kesalahan",
				            text: response.pesan,
				            type: "error",
				            confirmButtonText: "Ya"
				        });
				        page.loader(false);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) { 
					swal({
			            title: "Terjadi Kesalahan",
			            text: xhr.responseText,
			            type: "error",
			            confirmButtonText: "Ya"
			        });
			        page.loader(false);
				}
		    });
		}else{
			swal({
	            title: "Tidak Diizinkan",
	            text: "Mohon Periksa Format File Dokumen, Format yang diperbolehkan hanya: PDF",
	            type: "error",
	            confirmButtonText: "Ya"
	        });
	        page.loader(false);
		}
	}
}

dok.removeDokumen = function(id, name){
	swal({
        title: "Data Akan Dihapus ?",
        text: "Anda Akan Menghapus '"+name+"' !?",
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
                url: './controller/data_dokumen/data_dokumen_remove.php',
                data:{iddokumen: id}
            }).done(function(data){
                $("#DataTableDokumen").DataTable().ajax.reload();
                // swal("Berhasil Dihapus!", "Data Berhasil Dihapus", "success");
                swal({
                    title: "Berhasil Dihapus!",
                    text: "Data Berhasil Dihapus",
                    type: "success",
                    confirmButtonText: "Ya",
                });
                // toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        } else {
            $("#DataTableDokumen").DataTable().ajax.reload();
            swal("Batal", "Data Batal Dihapus", "error");
        }
    });
}

dok.selectSKPD = function(){
	$('#katskpd').select2({
        placeholder: 'Pilih Data SKPD...',
        minimumResultsForSearch: Infinity,
        ajax: {
            url: './controller/data_dokumen/data_dokumen_select_skpd.php',
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

    $('#edkatskpd').select2({
        placeholder: 'Pilih Data SKPD...',
        minimumResultsForSearch: Infinity,
        ajax: {
            url: './controller/data_dokumen/data_dokumen_select_skpd.php',
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

dok.previewisimodal = function(id, namadokumen){

	$.ajax({
        dataType: 'json',
        type:'post',
        url: './controller/data_dokumen/data_dokumen_show_edit.php',
        data:{kode:id}
    }).done(function(data){
    	$("#modalisi").modal('show');
		$("#titleisi").text(data.NAMADOKUMEN);
		// $("#contentisi").text(isi);
		$('#contentisi').data("wysihtml5").editor.setValue(data.RANGKUMANDOKUMEN);
		$(".modal-body .wysihtml5-toolbar").hide();
    });

	
}

$(document).ready(function(){
	$('#rangkuman').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	$('#edrangkuman').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	$('#contentisi').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	dok.prepare()
	dok.ajaxGetDataDokumen();
})