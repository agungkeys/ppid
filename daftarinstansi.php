<script type="text/javascript">
	hal.page("DaftarInstansi");
</script>
<?php
	include('admin/engine/db_config.php');
?>
<div class="content-area">
	<div class="post-wrap" style="margin-top: -24px;">
		<article class="">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<div class="entry-post">
							<!-- <div class="row">
								<div class="col-md-12"> -->
									<h2 class="entry-title" style="width: 100%;">
										<!-- <a href="#" title="Daftar Instansi">Daftar Instansi <span id="titleinstansi"></span></a> -->
										<div class="row" style="margin-top: 21px;">
											<ul class="breadcrumbs-alt">
						                        <li id="br1">
						                            <a href="#" onclick="di.backDaftarInstansiHome();">Daftar Instansi</a>
						                        </li>
						                        <li id="br2">
						                            <a href="#" id="back2new"><span id="titleinstansi"></span></a>
						                        </li>
						                        <li id="br3">
						                            <a href="#"><span id="titleinstansidetails"></span></a>
						                        </li>
						                    </ul>
										</div>
										
										<div style="text-align: right; margin-top: -55px; margin-right: -15px;">
											<!-- <button id="back1" class="btn btn-sm btn-default" ><i class="fa fa-arrow-circle-left"></i> Kembali</button> -->
											<!-- <button id="back2" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i> Kembali</button> -->
											<button id="downloadfile" class="btn btn-sm btn-primary"><i class="fa fa-file"></i>&nbsp; Show Dokumen</button>
										</div>
									</h2>
									
								<!-- </div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</article>
		<div id="profileinstansi" style="padding-top: 19px;" data-bind="visible: hal.profilinstansi">
			<div class="row">
				<div class="col-md-6">
					<div class="title-daftarinstansi">
						<span>Profil Instansi</span>
					</div>
					<div class="title-daftarinstansi-isi">
						<span>
							<table>
								<tr>
									<td>Satuan</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infodinas"></span></td>
								</tr>
								<tr>
									<td>Pejabat</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infopejabat"></span></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infolokasi"></span></td>
								</tr>
								<tr>
									<td>Telephone</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infotelp"></span></td>
								</tr>
							</table>
						</span>
					</div>
				</div>
				<!-- <div class="col-md-3">
					<div class="title-daftarinstansi">
						<span><i class="fa fa-institution"></i> SATUAN</span>
					</div>
					<div class="title-daftarinstansi-isi">
						<span id="infodinas"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="title-daftarinstansi">
						<span><i class="fa fa-user-circle"></i> PEJABAT</span>
					</div>
					<div class="title-daftarinstansi-isi">
						<span id="infopejabat"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="title-daftarinstansi">
						<span><i class="fa fa-map-pin"></i> ALAMAT</span>
					</div>
					<div class="title-daftarinstansi-isi">
						<span id="infolokasi"></span>
					</div>
				</div>
				<div class="col-md-3">
					<div class="title-daftarinstansi">
						<span><i class="fa fa-phone"></i> TELEPHONE</span>
					</div>
					<div class="title-daftarinstansi-isi">
						<span id="infotelp"></span>
					</div>
				</div> -->
			</div>
			<!-- <div style="background: #efefef; padding: 10px 0;">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<table>
								<tr>
									<td><i class="fa fa-institution"></i> Satuan</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infodinas"></span></td>
								</tr>
								<tr>
									<td><i class="fa fa-user-circle"></i> Pejabat</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infopejabat"></span></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td><i class="fa fa-map-pin"></i> Alamat</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infolokasi"></span></td>
								</tr>
								<tr>
									<td><i class="fa fa-phone"></i> Telephone</td>
									<td>&nbsp;:&nbsp;</td>
									<td><span id="infotelp"></span></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div> -->
		</div>
		<div id="beritainstansi" style="padding-top: 15px;">
			<div id="beritainstansifill"></div>
		</div>


		<div id="daftarallinstansi" class="" style="padding-top: 40px;">
			<div class="sidebar">
				<div class="widget widget-recent">
					<ul>
						<?php
							$query = $mysqli->query("SELECT * FROM skpd WHERE STATUS ='AKTIF' ORDER BY NAME ASC"); 
							if($query->num_rows > 0){ 
						            while($row = $query->fetch_assoc()) { 
						?>
						<li>
							<?php echo "<a href='#' onclick='di.showberitainstansi(\"".$row['IDSKPD']."\",\"".$row['NAME']."\")'>";?><?php echo $row["NAME"]; ?></a>
						</li>
						<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="" id="daftarallinstansidetail" style="padding-top: 25px;">
		     <div class="table-responsive" id="gridinstansi">
                <table id="DataTableDokumenInstansi" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Dokumen</th>
                            <th>Keterangan</th>
                            <th>Jenis</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalinformasi" tabindex="-1" role="dialog" aria-labelledby="modalinformasi" style="z-index: 9999999">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleinformasi"></h4>
      </div>
      <div class="modal-body">
		<textarea id="isiinformasi" class="wysihtml5 form-control" rows="9" readonly></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- modal -->




<style type="text/css">
select[name='DataTableInstansi_length']{
	vertical-align: top !important;
}
	.form-inline.form-control{
		vertical-align: top !important;
	}
	#DataTableInstansi_filter label{
		display: inline-flex;
	}
</style>
<script type="text/javascript">
	var di = {
		skpd: ko.observable(""),
	}

	di.prepareAll = function(){
		$("#daftarallinstansi").show();
		$("#daftarallinstansidetail").hide();
		$("#beritainstansi").hide();
		$("#titleinstansi").text("");

		$("#back1").hide();
		$("#back2").hide();
		$("#downloadfile").hide();

		$("#br1>a").addClass('current');
		$("#br2").hide();
		$("#br3").hide();
	}

	di.previewisimodal = function(id, name){
		$.ajax({
        dataType: 'json',
        type:'post',
        url: './admin/controller/data_dokumen/data_dokumen_show_edit.php',
        data:{kode:id}
	    }).done(function(data){

	        $("#modalinformasi").modal('show');
	        $("#titleinformasi").text(name);
	        $('#isiinformasi').data("wysihtml5").editor.setValue(data.RANGKUMANDOKUMEN);
	        $(".modal-body .wysihtml5-toolbar").hide();
	    });
	}

	di.backDaftarInstansiHome = function(){
		window.location.href = "index.php?page=daftarinstansi";
	}

	di.ajaxGetDataInstansii = function(id){
		di.skpd(id);
		var dataTable = $("#DataTableDokumenInstansi").dataTable({
	        "processing": true,
	        "serverSide": true,
	        "ajax":{
	            "url": "./admin/controller/daftar_informasi/daftar_informasi_controller.php",
	            "type": "POST",
	            "data": function ( d ) { 
	            	return $.extend( {}, d, {
	            		"idskpd" : di.skpd()
	            	} );
	            },
	            error: function(){
	                $(".DataTableDokumenInstansi-error").html("");
	                $("#DataTableDokumenInstansi").append('<tbody class="DataTableDokumenInstansi-grid-error"><tr><th colspan="6">Data Tidak Ditemukan...</th></tr></tbody>');
	                $("#DataTableDokumenInstansi_processing").css("display","none");
	            },
	            complete: function(){
	            	$("#DataTableDokumenInstansi_length").hide();
	            	$("#DataTableDokumenInstansi_filter").hide();
	            	$("#DataTableDokumenInstansi_info").hide();
	            }
	        },
	        "order": [[ 0, 'asc' ]],
	        "columnDefs": [ { orderable: false, targets: [1] }, { orderable: false, targets: [2] }, { orderable: false, targets: [3] }]
	    });
	}

	di.getDataProfileInstansi = function(id){
		hal.profilinstansi(true);
		$.ajax({
	        dataType: 'json',
	        type:'post',
	        url: './admin/controller/daftar_informasi/daftar_informasi_show_skpd.php',
	        data:{kode:id}
	    }).done(function(data){
	    	if(data.NAME !=""){
	    		$("#infodinas").text(data.NAME);
	    	}else{
	    		$("#infodinas").text("Data Tidak Diketahui");
	    	}

	    	if(data.PEJABAT !=""){
	    		$("#infopejabat").text(data.PEJABAT);
	    	}else{
	    		$("#infopejabat").text("Data Tidak Diketahui");
	    	}

	    	if(data.LOCATION !=""){
	    		$("#infolokasi").text(data.LOCATION);
	    	}else{
	    		$("#infolokasi").text("Data Tidak Diketahui");
	    	}

	    	if(data.TELP !=""){
	    		$("#infotelp").text(data.TELP);
	    	}else{
	    		$("#infotelp").text("Data Tidak Diketahui");
	    	}
	    })
	}

	// AWAL SAAT MEMILIH SKPD
	di.showberitainstansi = function(id, val){
		di.getDataProfileInstansi(id);
		$("#daftarallinstansi").hide();
		$("#daftarallinstansidetail").hide();
		$("#beritainstansi").show();
		$("#titleinstansi").text(val);
		$("#titleinstansi1").text(val);
		$("#titleinstansi2").text(val);
		$("#titleinstansi3").text(val);

		$("#back2").hide();
		$("#back1").show();
		$("#downloadfile").show();

		$("#downloadfile").attr("onclick","di.showdetails('"+id+"','"+val+"')");
		// $("#gridinstansi").remove("");

		$("#br2").show();
		$("#br3").hide();
		$("#br1>a").removeAttr('class','current');
		$("#br2>a").addClass('current');
		setTimeout(function(){
			$("#beritainstansifill").load('daftarinstansiberita.php?idskpd='+id);
		});
	}


	// KETIKA AKAN MEMILIH SHOW DOCUMENT
	di.showdetails = function(id, val){
		$("#daftarallinstansi").hide();
		$("#beritainstansi").hide();
		$("#daftarallinstansidetail").show();
		$("#profileinstansi").css('padding-top','50px');
		setTimeout(function(){
			di.ajaxGetDataInstansii(id);
		})
		
		
		// $("#daftarallinstansidetail").append("<div class='table-responsive' id='gridinstansi'><table id='DataTableInstansi' class='table table-bordered table-striped table-hover'></table></div>")
		// di.ajaxGetDataInstansi(val);

		$("#back2").show();
		$("#back1").hide();
		$("#downloadfile").hide();
		$("#back2new").attr("onclick","di.showberitainstansiAgain('"+val+"')");

		$("#titleinstansidetails").text("Download Dok. "+val);

		$("#br3").show();
		$("#br2>a").removeAttr('class','current');
		$("#br3>a").addClass('current');

		
	}

	di.showberitainstansiAgain = function(){
		$("#gridinstansi").remove("");
		$("#daftarallinstansidetail").append("<div class='table-responsive' id='gridinstansi'><table id='DataTableDokumenInstansi' class='table table-bordered table-striped table-hover'><thead><tr><th>Nama Dokumen</th><th>Keterangan</th><th>Jenis</th><th>File</th></tr></thead><tbody></tbody></table></div>")
		$("#beritainstansi").show();
		$("#daftarallinstansidetail").hide();

		$("#br2").show();
		$("#br3").hide();
		$("#br1>a").removeAttr('class','current');
		$("#br2>a").addClass('current');
		$("#profileinstansi").css('padding-top','19px');
		// $("#beritainstansi").css('margin-top','10px');
		$("#downloadfile").show();
	}

	di.back2 = function(){

	}

	di.showdetailsulang = function(){
		$("#daftarallinstansi").show()
		$("#daftarallinstansidetail").hide()
	}


	$(document).ready(function(){
		di.prepareAll();
		$('#isiinformasi').wysihtml5({
			"stylesheets": [],
			"link": false, 
	    	"image": false
		});
	})
</script>