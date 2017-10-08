<script>
	page.pageDestination("MasterDataKategoriSKPD");
</script>
<section class="wrapper">
	<div class="row">
		<!-- <div class="col-md-12"><h1>Master User</h1></div> -->
		<div class="col-md-12">
            <section class="panel">
	            <header class="panel-heading">
	            	Master Kategori SKPD
	            	<span class="tools pull-right" style="margin-top: -5px;">
                        <button id="tambah" class="btn btn-sm btn-primary" onclick="kategori.add()"><i class="fa fa-plus"></i> Tambah Kategori</button>
                    	<button id="batal" class="btn btn-sm btn-danger" onclick="kategori.batal()"><i class="fa fa-times"></i> Batal</button>
                    	<button id="simpan" class="btn btn-sm btn-success" onclick="kategori.save()"><i class="fa fa-check"></i> Simpan</button>
                    	<button id="perbarui" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>
                <div id="gridkategori" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableKategori" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID Kategori SKPD</th>
                                    <th>Nama Kategori SKPD</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="addkategori" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-user">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Kategori</label>
                                <div class="col-md-8">
                                    <input type="text" name="kategori" class="form-control" id="kategori" placeholder="ie: SOSIAL" /> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="editkategori" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-user">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Kategori</label>
                                <div class="col-md-8">
                                    <input type="text" name="kategoried" class="form-control" id="kategoried"/> 
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
<script src="dist/master_kategori.js" type="text/javascript"></script>