var req = {

}

req.ajaxGetDataRequest = function(v){
	
		var dataset = [
				[
					"RQ0001", 
					"DINAS SOSIAL", 
					"Dokumen Request Lorem Ipsum ", 
					"Dokumen Lorem Ipsum gfFGH gfh fghfg hhghgfh gfhfghfgh", 
					"Genta Perwira", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"RQ0002", 
					"DINAS KESEHATAN", 
					"Dokumen Request Lorem Ipsum ", 
					"Dokumen Lorem Ipsum gfFGH gfh fghfg hhghgfh gfhfghfgh", 
					"Genta Perwira", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"RQ0003", 
					"DINAS PENDIDIKAN", 
					"Dokumen Request Lorem Ipsum ", 
					"Dokumen Lorem Ipsum gfFGH gfh fghfg hhghgfh gfhfghfgh", 
					"Genta Perwira", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"RQ0004", 
					"DINAS KOPERASI", 
					"Dokumen Request Lorem Ipsum ", 
					"Dokumen Lorem Ipsum gfFGH gfh fghfg hhghgfh gfhfghfgh", 
					"Genta Perwira", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"RQ0005", 
					"DINAS PEMADAM KEBAKARAN", 
					"Dokumen Request Lorem Ipsum ", 
					"Dokumen Lorem Ipsum gfFGH gfh fghfg hhghgfh gfhfghfgh", 
					"Genta Perwira", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
			];
	    $('#DataTableRequest').DataTable( {
	        data: dataset,
	        columns: [
	            { title: "#" },
	            { title: "SKPD" },
	            { title: "Nama Dokumen" },
	            { title: "Keterangan" },
	            { title: "Nama Pemohon" },
	            { title: "Tanggal" },
	            { 
	            	title: "Aksi",
	            	"width": "8%"
	            },
	        ]
	    });
	}

$(document).ready(function(){
	
	req.ajaxGetDataRequest();
})