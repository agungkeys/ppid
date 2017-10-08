var dok = {

}

dok.prepare = function(){
	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();


	$("#adddokumen").hide();
	$("#editdokumen").hide();
	$("#griddokumen").show();
}

dok.tambah = function(){
	$("#tambah").hide();
	$("#batal").show();
	$("#simpan").show();
	$("#perbarui").hide();

	$("#griddokumen").hide();
	$("#adddokumen").show();
	$("#editdokumen").hide();
}

dok.ajaxGetDataDokumen = function(v){
	
		var dataset = [
				[
					"DOK0001", 
					"DINAS SOSIAL", 
					"Dokumen Lorem Ipsum ", 
					"Dokumen Lorem Ipsum gfFGH gfh fghfg hhghgfh gfhfghfgh", 
					"<a target='_blank' href='uploaddokumen/skpdjember.pdf' data-toggle='tooltip' title='Download File' class='btn btn-primary btn-sm btn-outline'><i class='glyphicon glyphicon-save-file'></i></a> skpdjember.pdf", 
					"Genta Perwira", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"DOK0002", 
					"DINAS PENDIDIKAN", 
					"Dokumen Lofgfh fghfgh fghgfrem Ipsum ", 
					"Dokumen Lorem Ipsum gfhgfgh fghf ghgfh gfhfghfgh", 
					"<a target='_blank' href='uploaddokumen/skpdjember.pdf' data-toggle='tooltip' title='Download File' class='btn btn-primary btn-sm btn-outline'><i class='glyphicon glyphicon-save-file'></i></a> skpdjember.pdf", 
					"Genta Purnama", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"DOK0003", 
					"DINAS KOPERASI", 
					"Dokumen Lohfgh gfhgfhgf ghfh fghgfh fghrem Ipsum ", 
					"Dokumen Lorem Ipsum gfhghgfh gfhfgh fghgfh gfhgfhfg hgfhgffghfgh", 
					"<a target='_blank' href='uploaddokumen/skpdjember.pdf' data-toggle='tooltip' title='Download File' class='btn btn-primary btn-sm btn-outline'><i class='glyphicon glyphicon-save-file'></i></a> skpdjember.pdf", 
					"Genta Panji", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
			];
	    $('#DataTableDokumen').DataTable( {
	        data: dataset,
	        columns: [
	            { title: "#" },
	            { title: "SKPD" },
	            { title: "Nama Dokumen" },
	            { title: "Rangkuman Dokumen" },
	            { title: "File" },
	            { title: "Upload By" },
	            { title: "Tanggal" },
	            { 
	            	title: "Aksi",
	            	"width": "8%"
	            },
	        ]
	    });
	}

$(document).ready(function(){
	$('#rangkuman').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	dok.prepare()
	dok.ajaxGetDataDokumen();
})