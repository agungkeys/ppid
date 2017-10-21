<script>
	page.pageDestination("DataDokumen");
</script>
<section class="wrapper">
	<div class="row">
		<div class="col-md-12">
            <section class="panel">
	            <header class="panel-heading">
	            	Data Dokumen
	            	<span class="tools pull-right" style="margin-top: -5px;">
                        <button onclick="dok.tambah();" id="tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Dokumen</button>
                    	<button onclick="dok.prepare();" id="batal" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                    	<button onclick="dok.addDokumen();" id="simpan" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Simpan</button>
                    	<button id="perbarui" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>

                <div id="griddokumen" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableDokumen" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori SKPD</th>
                                    <th>Nama Dokumen</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th>Jenis</th>
                                    <th>Upload By</th>
                                    <th>Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="adddokumen" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-dokumen">
                            <div class="form-group">
                                <label class="col-form-label">SKPD</label>
                                <select id="katskpd" name="katskpd" class="selectpicker form-control m-bot15" title="Pilih SKPD..."></select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nama Dokumen</label>
                                <div class="">
                                    <input type="text" name="namadokumen" class="form-control" id="namadokumen"/> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Keterangan</label>
                                <div class="">
                                    <textarea id="rangkuman" class="wysihtml5 form-control" style="height: 70px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Dokumen</label>
                                <div class="col-md-8">
                                    <select id="jdok" name="jdok" class="selectpicker form-control m-bot15" title="Pilih Jenis Dokumen...">
                                        <option value="1">Informasi Berkala</option>
                                        <option value="2">Informasi Serta Merta</option>
                                        <option value="3">Informasi Setiap Saat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Unggah File Dokumen <span style="font-weight: normal;">* file yang didukung PDF || File Tidak Lebih Dari < 5mb.</span></label>
                                <div id="replacedokumen">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-group">
                                            <div class="form-control uneditable-input span3" data-trigger="fileupload"><i class="glyphicon glyphicon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div>
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileupload-new">Select file</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input id="filedokumen" type="file" name="..."/>
                                            </span>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
                <div id="editdokumen" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-dokumen">
                            <div class="form-group">
                                <label class="col-form-label">SKPD</label>
                                <select id="edkatskpd" name="edkatskpd" class="selectpicker form-control m-bot15" title="Pilih SKPD..."></select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nama Dokumen</label>
                                <div class="">
                                    <input type="text" name="ednamadokumen" class="form-control" id="ednamadokumen"/> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Keterangan</label>
                                <div class="">
                                    <textarea id="edrangkuman" class="wysihtml5 form-control" style="height: 70px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Dokumen</label>
                                <div class="col-md-8">
                                    <select id="edjdok" name="edjdok" class="selectpicker form-control m-bot15" title="Pilih Jenis Dokumen...">
                                        <option value="1">Informasi Berkala</option>
                                        <option value="2">Informasi Serta Merta</option>
                                        <option value="3">Informasi Setiap Saat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Jika Anda Ingin Mengubah File Dokumen Maka Aktifkan Tombol Dibawah Ini. Jika Tidak Maka Abaikan">Ubah File Dokumen <span style="font-weight: normal;">* file yang didukung PDF || File Tidak Lebih Dari < 5mb.</span></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="edubahdok" type="checkbox" data-on="primary" data-off="danger" data-size="small">
                                    </div>

                                    <div class="col-md-9">
                                        <div id="edreplacedokumen">
                                            <div class="edfileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-group">
                                                    <div class="form-control uneditable-input span3" data-trigger="fileupload">
                                                        <i class="glyphicon glyphicon-file fileupload-exists"></i> <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileupload-new">Select file</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input id="edfiledokumen" type="file" name="..."/>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--popover end-->
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="modalisi" tabindex="-1" role="dialog" aria-labelledby="modalisi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="titleisi"></h4>
            </div>
            <div class="modal-body">
                <!-- <span id="contentisi"></span> -->
                <textarea id="contentisi" class="wysihtml5 form-control" rows="9" readonly></textarea>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<script src="dist/data_dokumen.js" type="text/javascript"></script>