<script>
	page.pageDestination("DataArtikel");
</script>
<section class="wrapper">
	<div class="row">
		<div class="col-md-12">
            <section class="panel">
	            <header class="panel-heading">
	            	Data Berita
	            	<span class="tools pull-right" style="margin-top: -5px;">
                        <button onclick="ar.tambah();" id="tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Berita</button>
                    	<button onclick="ar.prepare();" id="batal" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                    	<button onclick="ar.addartikel();" id="simpan" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Simpan</button>
                    	<button id="perbarui" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>

                <div id="gridartikel" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableArtikel" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori SKPD</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Image</th>
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

                <div id="addartikel" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-artikel">
                            <div class="form-group">
                                <label class="col-form-label">SKPD</label>
                                
                                <select id="katskpd" name="katskpd" class="selectpicker form-control m-bot15" title="Pilih SKPD..."></select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Judul Berita</label>
                                <div class=""> 
                                    <input type="text" name="judul" class="form-control" id="judul"/> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Isi Berita</label>
                                <div class="">
                                    <textarea id="isi" class="wysihtml5 form-control" style="height: 70px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Unggah Gambar <span style="font-weight: normal;">* file yang didukung JPEG, JPG, PNG, GIF || File Tidak Lebih Dari < 5mb.</span></label>
                                <div id="replaceimg">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-group">
                                            <div class="form-control uneditable-input span3" data-trigger="fileupload"><i class="glyphicon glyphicon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div>
                                            <span id="fotoreplace" class="input-group-addon btn btn-default btn-file">
                                                <span class="fileupload-new">Select file</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input id="foto" type="file" name="..."/>
                                            </span>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
                
                <div id="editartikel" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-edit-artikel">
                            <div class="form-group">
                                <label class="col-form-label">SKPD</label>
                                <div class="">
                                    <select id="edkatskpd" name="edkatskpd" class="selectpicker form-control m-bot15" title="Pilih SKPD..."></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Judul Berita</label>
                                <div class=""> 
                                    <input type="text" name="edjudul" class="form-control" id="edjudul"/> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Isi Berita</label>
                                <div class="">
                                    <textarea id="edisi" class="wysihtml5 form-control" style="height: 70px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Jika Anda Ingin Mengubah Gambar Maka Aktifkan Tombol Dibawah Ini. Jika Tidak Maka Abaikan">Ubah Gambar <span style="font-weight: normal;">* file yang didukung JPEG, JPG, PNG, GIF || File Tidak Lebih Dari < 5mb.</span></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="edubahgambar" type="checkbox" data-on="primary" data-off="danger" data-size="small">
                                    </div>

                                    <div class="col-md-9">
                                        <div id="edreplaceimg">
                                            <div class="edfileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-group">
                                                    <div class="form-control uneditable-input span3" data-trigger="fileupload">
                                                        <i class="glyphicon glyphicon-file fileupload-exists"></i> <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span id="edfotoreplace" class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileupload-new">Select file</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input id="edfoto" type="file" name="..."/>
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

<script src="dist/data_artikel.js" type="text/javascript"></script>
<style type="text/css">
    .img-zoom {
        width:50px;
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
    }
 
    .transition {
        -webkit-transform: scale(7); 
        -moz-transform: scale(7);
        -o-transform: scale(7);
        transform: scale(7);
    }
</style>