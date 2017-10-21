<?php
	$paraminformasi = $_GET['param']; 
?>
<script type="text/javascript">
  hal.page("DaftarInformasi");
</script>
<div class="content-area">
	<div class="post-wrap">
		<article class="blog-single">
			<div class="content-post">
				<div class="entry-post">
					<span id="paramfromurl" style="display: none;"><?php echo $paraminformasi; ?></span>
					<h2 class="entry-title" style="margin-top: 0px; margin-bottom: 5px;">
						<a href="#" title="" id="titledaftarinformasi"></a>
					</h2>
					<div class="table-responsive" style="padding-top: 25px;">
            <table id="DataTableInformasi" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>SKPD</th>
                        <th>Nama Dokumen</th>
                        <th>Keterangan</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </div>
				</div>
			</div>
		</article>
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
select[name='DataTableInformasi_length']{
	vertical-align: top !important;
	margin-bottom: 10px;
}
	.form-inline.form-control{
		vertical-align: top !important;
	}
	#DataTableInformasi_filter label{
		display: inline-flex;
	}
</style>
<script src="admin/dist/daftarinformasi.js" type="text/javascript"></script>