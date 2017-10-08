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
                    	<button onclick="dok.adddokumen();" id="simpan" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Simpan</button>
                    	<button id="perbarui" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>

                <div id="griddokumen" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableDokumen" class="table table-bordered table-striped table-hover">
                            <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori SKPD</th>
                                    <th>Judul</th>
                                    <th>Lead Artikel</th>
                                    <th>Isi</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody> -->
                        </table>
                    </div>
                </div>
                <div id="adddokumen" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-dokumen">
                        	
                            <div class="form-group">
                                <label class="col-form-label">SKPD</label>
                                <div class="">
                                    <select id="katskpd" name="katskpd" class="selectpicker form-control m-bot15" title="Pilih SKPD...">
                                        <option value="">Pilih SKPD...</option>
										<option>Dinas Sosial</option>
										<option>Dinas Kesehatan</option>
										<option>Dinas Pendidikan</option>
										<option>Dinas Pekerjaan Umum</option>
										<option>Dinas Koperasi</option>
										<option>Dinas Lingkungan Hidup</option>
										<option>Dinas Pemadam Kebakaran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Nama Dokumen</label>
                                <div class="">
                                    <input type="text" name="namadokumen" class="form-control" id="namadokumen"/> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Rangkuman Dokumen</label>
                                <div class="">
                                    <textarea id="rangkuman" class="wysihtml5 form-control" rows="9"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Unggah File Dokumen</label>
                                <div class="">
                                    <div class="controls ">
	                                    <div class="fileupload fileupload-new" data-provides="fileupload">
	                                                <span class="btn btn-primary btn-file">
	                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
	                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
	                                                <input type="file" class="default" />
	                                                </span>
	                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
	                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
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
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Pengguna</label>
                                <div class="col-md-8">
                                    <input type="text" name="edusername" class="form-control" id="edusername" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="edpassword" class="form-control" id="edpassword"/> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" name="ednamalengkap" class="form-control" id="ednamalengkap" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="edemail" class="form-control" id="edemail"/> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Level</label>
                                <div class="col-md-8">
                                    <select id="edlevel" name="edlevel" class="selectpicker" title="Pilih Level...">
                                        <option data-tokens="Admin">Admin</option>
                                        <option data-tokens="Pimpinan">Pimpinan</option>
                                        <option data-tokens="Pegawai">Pegawai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Satuan Kerja</label>
                                <div class="col-md-8">
                                    <select id="edlokasiunit" name="edlokasiunit" class="form-control"></select>
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
<script src="dist/data_dokumen.js" type="text/javascript"></script>