var ar = {}

ar.prepare = function(){
	$("#tambah").show();
	$("#batal").hide();
	$("#simpan").hide();
	$("#perbarui").hide();


	$("#addartikel").hide();
	$("#editartikel").hide();
	$("#gridartikel").show();
}

ar.tambah = function(){
	$("#tambah").hide();
	$("#batal").show();
	$("#simpan").show();
	$("#perbarui").hide();

	$("#gridartikel").hide();
	$("#addartikel").show();
	$("#editartikel").hide();
}

ar.addartikel = function(){
	
}

ar.ajaxGetDataArtikel = function(v){
	
		var dataset = [
				[
					"AR0001", 
					"DINAS SOSIAL", 
					"Pengembangan Lorem Ipsum ", 
					"Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"Ini adalah isi dari Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"<img src='uploadimgartikel/image1.jpg' width='50' />", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"AR0002", 
					"DINAS KEBAKARAN", 
					"Pengembangan Lorem Ipsum ", 
					"Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"Ini adalah isi dari Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"<img src='uploadimgartikel/image2.jpg' width='50' />", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"AR0003", 
					"DINAS KOPERASI", 
					"Pengembangan Lorem Ipsum ", 
					"Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"Ini adalah isi dari Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"<img src='uploadimgartikel/image3.jpg' width='50' />", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],[
					"AR0004", 
					"DINAS KETENAGAKERJAAN", 
					"Pengembangan Lorem Ipsum ", 
					"Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"Ini adalah isi dari Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"<img src='uploadimgartikel/image4.jpg' width='50' />", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
				[
					"AR0005", 
					"DINAS PENDIDIKAN", 
					"Pengembangan Lorem Ipsum ", 
					"Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"Ini adalah isi dari Pengembangan Lorem Ipsum gfhghgfh gfhfghfgh", 
					"<img src='uploadimgartikel/image5.jpg' width='50' />", 
					"2017-10-01 08:51:50", 
					"<button data-toggle='tooltip' title='Ubah' class='btn btn-warning btn-sm btn-outline'><i class='glyphicon glyphicon-pencil'></i></button> &nbsp; <button data-toggle='tooltip' title='Hapus' class='btn btn-danger btn-sm btn-outline'><i class='glyphicon glyphicon-trash'></i></button>"
				],
			];
	    $('#DataTableArtikel').DataTable( {
	        data: dataset,
	        columns: [
	            { title: "#" },
	            { title: "SKPD" },
	            { title: "Judul" },
	            { title: "Lead Artikel" },
	            { title: "Isi" },
	            { title: "Gambar" },
	            { title: "Tanggal" },
	            { 
	            	title: "Aksi",
	            	"width": "8%"
	            },
	        ]
	    });
	}

	

$(document).ready(function(){
	$('#isi').wysihtml5({
		"stylesheets": [],
		"link": false, 
    	"image": false
	});
	ar.prepare();
    ar.ajaxGetDataArtikel();
})