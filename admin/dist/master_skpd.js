var skpd = {
	status: ko.observable("AKTIF"),
    statused: ko.observable("AKTIF"),
	pencari: ko.observableArray([]),

}

skpd.prepare = function(){
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();
    $("#tambah").show();

	$("#addskpd").hide();
	$("#editskpd").hide();
    $("#gridskpd").show();
}

skpd.reset = function(){
	$("#nmskpd").val("");
    $("#nmpejabat").val("");
	$("#alamat").val(""); 
    $("#telephone").val(""); 
    $("#fax").val(""); 
 	$('#pencarianskpd').empty();

    $("#ednmskpd").val(""); 
    $("#edalamat").val(""); 
    $('#edpencarianskpd').empty();

 	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();

	$("#gridskpd").show();
	$("#addskpd").hide();
	$("#editskpd").hide();

    skpd.prepareCheckbox();
}

skpd.add = function(){
    $("#tambah").hide();
    $("#batal").show();
    $("#simpan").show();

    $("#gridskpd").hide();
    $("#editskpd").hide();
    $("#addskpd").show();
    // skpd.prepareSelectLokasi();
    // $('#pencarianskpd').select2('val',["K0002", "K0004", "K0005"]);
    // $('#pencarianskpd').select2({tags: true, multiple: true});
    skpd.selectkategori();
    skpd.status("AKTIF");

    $("#status").prop("checked", true).change();
    $("#cariskpd").prop("checked", false).change();
}

skpd.edit = function(id, nm, pjbt, loc, telp, fax, tgspkok, ons, sts){
    $("#tambah").hide();
    $("#simpan").hide();
    $("#batal").show();
    $("#perbarui").show();

    $("#gridskpd").hide();
    $("#addskpd").hide();
    $("#editskpd").show();

    $("#perbarui").attr('onclick','skpd.editSave("'+id+'")');
    
    $("#ednmskpd").val(nm);
    $("#ednmpejabat").val(pjbt);
    $("#edalamat").val(loc);
    $("#edtelephone").val(telp);
    $("#edfax").val(fax);
    $("#edtugaspokok").val(tgspkok);

    if(ons != ""){
        $("#edcariskpd").prop("checked", true).change();
        skpd.selectkategori();

        $.ajax({
            url: './controller/master_skpd/master_skpd_controller_select_pencarian_skpd.php', //This is the current doc
            type: "POST",
            dataType:'json', // add json datatype to get json
            data: ({idx: id}),
            success: function(data){
                // var bsex = _.pluck(data, 'IDKATSKPD');
                // var cex = getValues(bsex);
                // console.log(cex);

                var items = _.map(data, function(e, i){
                    // return  { id: e.IDKATSKPD, text: e.NAMEKATSKPD }
                    return $("<option selected></option>").val( e.IDKATSKPD).text(e.NAMEKATSKPD);
                });

                $('#edpencarianskpd').append(items).trigger('change');
            }
        });
    }else{
        $("#edcariskpd").prop("checked", false).change();
    }

    if(sts != "AKTIF"){
        // console.log("true");
        $("#edstatus").prop("checked", false).change();
    }else{
        // console.log("false");
        $("#edstatus").prop("checked", true).change();  
    }
}

skpd.prepareCheckbox = function(){
	$("#status").on('switchChange.bootstrapSwitch', function (event, state) {
        var sesuai = $("#status").is(':checked');
        if(sesuai != true){
            skpd.status("TIDAK AKTIF");
        }else{
            skpd.status("AKTIF");
        }  
    });

    $('#cariskpd').on('switchChange.bootstrapSwitch', function (event, state) {
        var sesuai = $("#cariskpd").is(':checked');
        if(sesuai != true){
            $("#ccariskpd").hide();
        }else{
            $("#ccariskpd").show();
            skpd.selectkategori();
        }  
    });

    $("#edstatus").on('switchChange.bootstrapSwitch', function (event, state) {
        var sesuai = $("#edstatus").is(':checked');
        if(sesuai != true){
            skpd.statused("TIDAK AKTIF");
        }else{
            skpd.statused("AKTIF");
        }  
    });

    $('#edcariskpd').on('switchChange.bootstrapSwitch', function (event, state) {
        var sesuai = $("#edcariskpd").is(':checked');
        if(sesuai != true){
            $("#edccariskpd").hide();
        }else{
            $("#edccariskpd").show();
            skpd.selectkategori();
        }  
    });
}

skpd.batal = function(){
	skpd.reset();
}

skpd.selectkategori = function(){
	// untuk menampilkan data dalam mode edit
	// $("#pencarianskpd").val(["K0002","K0006"]).trigger("change")

	$('#pencarianskpd').select2({
		tags: true, 
		multiple: true,
        placeholder: 'Pilih Data Kategori...',
        // minimumResultsForSearch: Infinity,
        ajax: {
            url: './controller/master_skpd/master_skpd_controller_select_kategori_skpd.php',
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

    $('#edpencarianskpd').select2({
        tags: true, 
        multiple: true,
        placeholder: 'Pilih Data Kategori...',
        // minimumResultsForSearch: Infinity,
        ajax: {
            url: './controller/master_skpd/master_skpd_controller_select_kategori_skpd.php',
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

skpd.editSelectLokasiNope = function(){
	var $select = $('#edpencarianskpd');

	// save current config. options
	var options = $select.data('select2').options.options;

	// delete all items of the native select element
	$select.html('');

	// build new items
	var items = [{id:'K0005',text:'PERHUBUNGAN'},{id:'K0004',text:'PARIWISATA'},{id:'K0002',text:'KETENAGAKERJAAN'}];
	for (var i = 0; i < items.length; i++) {
	    // logik to create new items

	    items.push({
	        "id": items.id,
	        "text": items.text
	    });

	    $select.append("<option value=\"" + items.id + "\">" + items.text + "</option>");
	}

	// add new items
	options.data = items;
	$select.select2(options);
}

skpd.ajaxGetDataSKPD = function(){
	var dataTable = $("#DataTableSKPD").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax":{
            url: "./controller/master_skpd/master_skpd_controller.php",
            type: "post",
            error: function(){
                $(".DataTableSKPD-error").html("");
                $("#DataTableSKPD").append('<tbody class="DataTableSKPD-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
                $("#DataTableSKPD").css("display","none");
            },
            complete: function(){}
        },
        "order": [[ 0, 'ASC' ]],
        "columnDefs": [ { orderable: false, targets: [0] },{ orderable: false, targets: [3] } ]

    });
}

var getValues = function ( obj ) {
  var key,
    array = [];

  for ( key in obj ) {
    if ( obj .hasOwnProperty( key ) ) {
      array.push( obj [ key ] );
    }
  }

  return obj.join( ', ' );
};

skpd.save = function(){
	var namaskpd 	= $("#nmskpd").val();
    var namapejabat = $("#nmpejabat").val();
	var almt 		= $("#alamat").val();
    var telp        = $("#telephone").val();
    var fax         = $("#fax").val();
    var tugaspokok  = $("#tugaspokok").val();
	var status		= skpd.status();
	var cari 		= $('#pencarianskpd').val();

	// untuk menyimpan data string pencarian
	var axe = $('#pencarianskpd').select2('data');
	skpd.pencari(axe);
	var bsex = _.pluck(axe, 'text');
	var cex = getValues(bsex)

	if(namaskpd == ""){
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
            url: "./controller/master_skpd/master_skpd_controller_add.php",
            data:{
                1: namaskpd, 2: namapejabat, 3: almt, 4: telp, 5: fax, 6: tugaspokok, 7: cex, 8: status
            }
        }).done(function(data){
        	
        	var dt = data.IDSKPD 
        	var zzz = skpd.pencari();

        	var agung = _.map(zzz, function(e, i){
        		return {no: i, idkatskpd: e.id, nmskpd: e.text, idskpd: dt}
        	})

            // console.log(agung);
        	$.ajax({
                dataType: "json",
                type: "post",
                url: "./controller/master_skpd/master_skpd_controller_pencarian_add.php",
                data: { data : agung },
            })

            swal({
                title: "Berhasil Disimpan!",
                text: "Data Jaringan Berhasil Disimpan",
                type: "success",
                confirmButtonText: "Ya"
            });
            skpd.batal();
            $("#DataTableSKPD").DataTable().ajax.reload();
        });
    }
}

skpd.editSave = function(id){
    var namaskpd    = $("#ednmskpd").val();
    var namapejabat = $("#ednmpejabat").val();
    var almt        = $("#edalamat").val();
    var status      = skpd.statused();
    var telp        = $("#edtelephone").val();
    var fax         = $("#edfax").val();
    var tugaspokok  = $("#edtugaspokok").val();
    var cari        = $('#edpencarianskpd').val();


    // untuk menyimpan data string pencarian
    var jskpd = $('#edcariskpd').prop('checked');
    if(jskpd != false){
        var axe = $('#edpencarianskpd').select2('data');
        skpd.pencari(axe);
        var bsex = _.pluck(axe, 'text');
        var cex = getValues(bsex)
    }else{
        var cex = ""
    }
    

    if(namaskpd == ""){
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
            url: "./controller/master_skpd/master_skpd_controller_edit.php",
            data:{
                idx: id, 1: namaskpd, 2: namapejabat, 3: almt, 4: telp, 5: fax, 6: cex, 7: tugaspokok, 8: status
            }
        }).done(function(data){
            
            var dt = data.IDSKPD 
            var zzz = skpd.pencari();

            var agung = _.map(zzz, function(e, i){
                return {no: i, idkatskpd: e.id, nmskpd: e.text, idskpd: dt}
            })

            $.ajax({
                dataType: "json",
                type: "post",
                url: "./controller/master_skpd/master_skpd_controller_pencarian_add.php",
                data: { data : agung },
            })

            swal({
                title: "Berhasil Disimpan!",
                text: "Data Jaringan Berhasil Disimpan",
                type: "success",
                confirmButtonText: "Ya"
            });
            skpd.batal();
            $("#DataTableSKPD").DataTable().ajax.reload();
        });
    }
}

$(document).ready(function () {
	skpd.prepare();
	skpd.prepareCheckbox();
	skpd.ajaxGetDataSKPD();
});
