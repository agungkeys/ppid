<script>
	page.pageDestination("MasterDataSKPD");
</script>
<section class="wrapper">
	<div class="row">
		<div class="col-md-12">
            <section class="panel">
	            <header class="panel-heading">
	            	Master SKPD
	            	<span class="tools pull-right" style="margin-top: -5px;">
                        <button id="tambah" class="btn btn-sm btn-primary" onclick="skpd.add()"><i class="fa fa-plus"></i> Tambah Kategori</button>
                    	<button id="batal" class="btn btn-sm btn-danger" onclick="skpd.batal()"><i class="fa fa-times"></i> Batal</button>
                    	<button id="simpan" class="btn btn-sm btn-success" onclick="skpd.save()"><i class="fa fa-check"></i> Simpan</button>
                    	<button id="perbarui" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>
                <div id="gridskpd" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableSKPD" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID SKPD</th>
                                    <th>Nama SKPD</th>
                                    <th>Keterangan</th>
                                    <th>Alamat</th>
                                    <th>Pencarian</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="addskpd" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-skpd">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama SKPD</label>
                                <div class="col-md-8">
                                    <input type="text" name="nmskpd" class="form-control" id="nmskpd" placeholder="ie: DINAS SOSIAL" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-md-8">
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control" id="alamat" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Pencarian</label>
                                <div class="col-md-8">
                                    <select id="pencarianskpd" name="pencarianskpd" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-md-8">
                                    <div class="" id="stsskpd">
                                        <input id="status" type="checkbox" checked data-on="primary" data-off="danger">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="editskpd" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-edit-skpd">
                            <form method="post" id="form-add-user">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama SKPD</label>
                                <div class="col-md-8">
                                    <input type="text" name="nmskpd" class="form-control" id="nmskpd" placeholder="ie: DINAS SOSIAL" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Keterangan</label>
                                <div class="col-md-8">
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-md-8">
                                    <input type="text" name="alamat" class="form-control" id="alamat" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Pencarian</label>
                                <div class="col-md-8">
                                    <select id="pencarianskpd" name="pencarianskpd" class="form-control"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Status</label>
                                <div class="col-md-8">
                                    <div class="" id="stsskpd">
                                        <input id="status" type="checkbox" checked data-on="primary" data-off="danger">
                                    </div>
                                </div>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </section>
            <!--popover end-->
		</div>
	</div>
</section>
<script src="dist/master_skpd.js" type="text/javascript"></script>