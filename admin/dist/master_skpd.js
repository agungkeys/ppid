var skpd = {
	status: ko.observable("AKTIF"),
	pencari: ko.observableArray([]),

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
	$("#status").prop('checked', true);
}

skpd.edit = function(){
    
}

skpd.prepare = function(){
	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();

	$("#gridskpd").show();
	$("#addskpd").hide();
	$("#editskpd").hide();
}

skpd.reset = function(){
	$("#nmskpd").val("");
	$("#keterangan").val(""); 
	$("#alamat").val(""); 
 	$('#pencarianskpd').empty();

 	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();

	$("#gridskpd").show();
	$("#addskpd").hide();
	$("#editskpd").hide();

}

skpd.prepareCheckbox = function(){
	$("#status").change(function(){
        var sesuai = $("#status").is(':checked');
        if(sesuai != true){
            skpd.status("TIDAK AKTIF");
        }else{
            skpd.status("AKTIF");
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
}

skpd.editSelectLokasi = function(){
	var $select = $('#pencarianskpd');

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
	var ket 		= $("#keterangan").val();
	var almt 		= $("#alamat").val();
	var status		= skpd.status();
	var cari 		= $('#pencarianskpd').val();

	// untuk menyimpan data string pencarian
	var axe = $('#pencarianskpd').select2('data');
	skpd.pencari(axe);
	var bsex = _.pluck(axe, 'text');
	var cex = getValues(bsex)

	if(namaskpd == "" || cari == null || axe ==[]){
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
                1: namaskpd, 2: ket, 3: almt, 4: cex, 5: status
            }
        }).done(function(data){
        	
        	var dt = data.IDSKPD 
        	var zzz = skpd.pencari();

        	var agung = _.map(zzz, function(e, i){
        		return {no: i, idkatskpd: e.id, nmskpd: e.text, idskpd: dt}
        	})

            console.log(agung);
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
