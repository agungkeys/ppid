var ar = {
	ubahgambar: ko.observable(false),
}

ar.prepare = function(){
	ar.resetform();

	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();

	$("#gridartikel").show();
	$("#addartikel").hide();
	$("#editartikel").hide();
}

ar.resetform = function(){
	$("#katskpd").empty();
	$("#judul").val("");
    $('#isi').data("wysihtml5").editor.clear();
    $("#foto").val("");
    $("#replaceimg").html("");
    $("#edubahgambar").prop('checked', false).trigger('change');
 	$("#replaceimg").append("<div class='fileupload fileupload-new' data-provides='fileupload'><div class='input-group'><div class='form-control uneditable-input span3' data-trigger='fileupload'><i class='glyphicon glyphicon-file fileupload-exists'></i> <span class='fileupload-preview'></span></div><span id='fotoreplace' class='input-group-addon btn btn-default btn-file'><span class='fileupload-new'>Select file</span><span class='fileupload-exists'>Change</span><input id='foto' type='file' name='...'/></span></div></div></div>");

}

ar.tambah = function(){
	$("#tambah").hide();
	$("#perbarui").hide();
	$("#batal").show();
	$("#simpan").show();

	$("#addartikel").show();
	$("#gridartikel").hide();
	$("#editartikel").hide();

	var level 		= page.level();
	var skpd 		= page.skpd();
	var skpdname	= page.skpdname();
	if(level != "Super Admin"){
		ar.selectSKPD();
		$("#katskpd").empty().append('<option selected value='+skpd+'>'+skpdname+'</option>');
		$('#katskpd').prop("disabled", true);
	}else{
		ar.selectSKPD();
	}
	
	
	$("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"});
    $("#select2-lokasiskpd-container").css("height","34px");
}

ar.addartikel = function(){
	var ks = $("#katskpd").select2('val');
	var jd = $("#judul").val();
	var is = $("#isi").val();
	var ft = $("#foto")[0].files.length;
	page.loader(true);
	if(ks == null || jd =="" || ft==0 ){
		swal({
            title: "Tidak Diizinkan",
            text: "Mohon Periksa Kembali...",
            type: "error",
            confirmButtonText: "Ya"
        });
        page.loader(false);
	}else{
		var ftformat = $("#foto")[0].files[0].type;
		if(ftformat == "image/jpeg" || ftformat == "image/png" || ftformat == "image/gif"){
			
	        var data = new FormData();
		    data.append('katskpd', $("#katskpd").select2('val')); 
		    data.append('judul', $("#judul").val()); 
		    data.append('isi', $("#isi").val());
		    data.append('foto', $("#foto")[0].files[0]);
		    data.append('user', page.user());

		    
		    $.ajax({
				url: './controller/data_artikel/data_artikel_add.php', 
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
	                    $("#judul").val("");
	                    $('#isi').data("wysihtml5").editor.clear();
					    $("#foto").val("");
					    $("#replaceimg").html("");
					 	$("#replaceimg").append("<div class='fileupload fileupload-new' data-provides='fileupload'><div class='input-group'><div class='form-control uneditable-input span3' data-trigger='fileupload'><i class='glyphicon glyphicon-file fileupload-exists'></i> <span class='fileupload-preview'></span></div><span id='fotoreplace' class='input-group-addon btn btn-default btn-file'><span class='fileupload-new'>Select file</span><span class='fileupload-exists'>Change</span><input id='foto' type='file' name='...'/></span></div></div></div>")
					 	$("#DataTableArtikel").DataTable().ajax.reload();
					 	page.loader(false);
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
	            text: "Mohon Periksa Format Gambar, Format yang diperbolehkan hanya: JPG, JPEG, PNG, GIF",
	            type: "error",
	            confirmButtonText: "Ya"
	        });
	        page.loader(false);
		}
	}
}

ar.spottedUbahGambar = function(){
	$("#edreplaceimg").hide();
	$("#edubahgambar").on('switchChange.bootstrapSwitch', function (event, state) {
        var sesuai = $("#edubahgambar").is(':checked');
        if(sesuai != true){
            $("#edreplaceimg").hide();
            ar.ubahgambar(false);
        }else{
            $("#edreplaceimg").show();
            ar.ubahgambar(true);
        }  
    });
}

ar.previewisimodal = function(id, title){
	$.ajax({
        dataType: 'json',
        type:'post',
        url: './controller/data_artikel/data_artikel_show_edit.php',
        data:{kode:id}
    }).done(function(data){
    	$("#modalisi").modal('show');
		$("#titleisi").text(data.JUDULARTIKEL);
		// $("#contentisi").text(isi);
		$('#contentisi').data("wysihtml5").editor.setValue(data.ISIARTIKEL);
		$(".modal-body .wysihtml5-toolbar").hide();
    })
}

ar.editArtikel = function(id){
	$("#tambah").hide();
	$("#simpan").hide();
	$("#batal").show();
	$("#perbarui").show();

	$("#gridartikel").hide();
	$("#addartikel").hide();
	$("#editartikel").show();

	ar.spottedUbahGambar();

	$.ajax({
        dataType: 'json',
        type:'post',
        url: './controller/data_artikel/data_artikel_show_edit.php',
        data:{kode:id}
    }).done(function(data){
    	var level 		= page.level();
		var skpd 		= page.skpd();
		var skpdname	= page.skpdname();
		if(level != "Super Admin"){
			ar.selectSKPD();
			$("#edkatskpd").empty().append('<option selected value='+skpd+'>'+skpdname+'</option>');
			$('#edkatskpd').prop("disabled", true);
		}else{
			ar.selectSKPD();
			$("#edkatskpd").empty().append('<option selected value='+skpd+'>'+skpdname+'</option>');
		}
		
		$("span>.select2-selection--single").css({"height":"34px","padding-left":"5px"});
	    $("#select2-lokasiskpd-container").css("height","34px");

	    $("#perbarui").attr('onclick','ar.editArtikelSave("'+id+'")');

	    // $("#edkatskpd").empty().append('<option selected value='+idskpd+'>'+nameskpd+'</option>');
	    $("#edjudul").val(data.JUDULARTIKEL);
	    $('#edisi').data("wysihtml5").editor.setValue(data.ISIARTIKEL);
    })
}

ar.editArtikelSave = function(id){
	var ks = $("#edkatskpd").select2('val');
	var jd = $("#edjudul").val();
	var is = $("#edisi").val();
	var us = page.user();
	var ft = $("#edfoto")[0].files.length;
	page.loader(true);
	var a = ar.ubahgambar();
	if(a != true){
		//Jika update tidak dengan gambar
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
                url: "./controller/data_artikel/data_artikel_edit_no_image.php",
                data:{idartikel: id, skpd: ks, judul: jd, isi: is, user: us}
            }).done(function(data){
                swal({
                        title: "Berhasil Disimpan!",
                        text: "Data Artikel Berhasil Disimpan",
                        type: "success",
                        confirmButtonText: "Ya",
                })
                // us.clearformfield();
                ar.prepare();
                $("#DataTableArtikel").DataTable().ajax.reload();
                page.loader(false);
            })
		}
	}else{
		//Jika update menggunakan gambar
		var ftformat = $("#edfoto")[0].files[0].type;
		if(ftformat == "image/jpeg" || ftformat == "image/png" || ftformat == "image/gif"){
			
	        var data = new FormData();
	        data.append('idart', id);
		    data.append('katskpd', $("#edkatskpd").select2('val')); 
		    data.append('judul', $("#edjudul").val()); 
		    data.append('isi', $("#edisi").val());
		    data.append('foto', $("#edfoto")[0].files[0]);
		    data.append('user', page.user());

		    
		    $.ajax({
				url: './controller/data_artikel/data_artikel_edit_with_image.php', 
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
	                    $("#edreplaceimg").html("");
					 	$("#edreplaceimg").append("<div class='edfileupload fileupload-new' data-provides='fileupload'><div class='input-group'><div class='form-control uneditable-input span3' data-trigger='fileupload'><i class='glyphicon glyphicon-file fileupload-exists'></i> <span class='fileupload-preview'></span></div><span id='edfotoreplace' class='input-group-addon btn btn-default btn-file'><span class='fileupload-new'>Select file</span><span class='fileupload-exists'>Change</span><input id='edfoto' type='file' name='...'/></span></div></div></div>")
					 	
	                    ar.prepare();
		                $("#DataTableArtikel").DataTable().ajax.reload();
		        		page.loader(false);
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
	            text: "Mohon Periksa Format Gambar, Format yang diperbolehkan hanya: JPG, JPEG, PNG, GIF",
	            type: "error",
	            confirmButtonText: "Ya"
	        });
	        page.loader(false);
		}
	}
}

ar.removeArtikel = function(id, name){
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
                url: './controller/data_artikel/data_artikel_remove.php',
                data:{idartikel: id}
            }).done(function(data){
                $("#DataTableArtikel").DataTable().ajax.reload();
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
            $("#DataTableArtikel").DataTable().ajax.reload();
            swal("Batal", "Data Batal Dihapus", "error");
        }
    });
}

ar.ajaxGetDataArtikel = function(v){
	var dataTable = $("#DataTableArtikel").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            "url": "./controller/data_artikel/data_artikel_controller.php",
            "type": "POST",
            "data": function ( d ) { 
            	return $.extend( {}, d, {
            		"idskpd" : page.skpd(),
            		"level"	 : page.level()
            	} );
            },
            error: function(){
                $(".DataTableArtikel-error").html("");
                $("#DataTableArtikel").append('<tbody class="DataTableArtikel-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
                $("#DataTableArtikel_processing").css("display","none");
            },
            complete: function(){
            	$('.img-zoom').hover(function() {
					$(this).addClass('transition');

				}, function() {
					$(this).removeClass('transition');
				});
            }
        },
        "order": [[ 0, 'asc' ]],
        "columnDefs": [ {width: "30%", targets: [3]}, {width: "8%", targets: [7]},{ orderable: false, targets: [0] }, { orderable: false, targets: [4] }, { orderable: false, targets: [7] }]
    });	
    
    setTimeout(function(){
    	$("#DataTableArtikel").DataTable().ajax.reload();
    	if(page.level() != "Super Admin"){
	    	$("#DataTableArtikel_filter").hide();
	    	$("#DataTableArtikel_info").hide();
	    }else{
	    	// $("#DataTableDokumen_filter").show();
	    }
    });	
}

ar.selectSKPD = function(){
	$('#katskpd').select2({
        placeholder: 'Pilih Data SKPD...',
        minimumResultsForSearch: Infinity,
        ajax: {
            url: './controller/data_artikel/data_artikel_select_skpd.php',
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


	

$(document).ready(function(){
	$('#isi').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	$('#edisi').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	$('#contentisi').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	ar.prepare();
    ar.ajaxGetDataArtikel();
})