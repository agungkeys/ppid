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
                    	<button id="perbarui" class="btn btn-sm btn-success" onclick="skpd.update()><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>
                <div id="gridskpd" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableSKPD" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID SKPD</th>
                                    <th>Nama SKPD</th>
                                    <th>Nama Pejabat</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Fax</th>
                                    <th>Tugas Pokok</th>
                                    <th>Join SKPD</th>
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
                            <div class="form-group">
                                <label>Nama SKPD</label>
                                <div>
                                    <input type="text" name="nmskpd" class="form-control" id="nmskpd" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pejabat</label>
                                <div>
                                    <input type="text" name="nmpejabat" class="form-control" id="nmpejabat" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Kantor</label>
                                <div>
                                    <input type="text" name="alamat" class="form-control" id="alamat" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <div>
                                    <input type="text" name="telephone" class="form-control" id="telephone" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <div>
                                    <input type="text" name="fax" class="form-control" id="fax" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tugas Pokok dan Fungsi</label>
                                <div>
                                    <!-- <input type="text" name="fax" class="form-control" id="fax" />
                                      -->
                                    <textarea class="form-control" rows="6" id="tugaspokok"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Join SKPD</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="cariskpd" type="checkbox" data-on="primary" data-off="danger" data-size="small">
                                    </div>
                                    <div id="ccariskpd" class="col-md-9" hidden>
                                        <select id="pencarianskpd" name="pencarianskpd" class="form-control"></select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <div class="" id="stsskpd">
                                        <input id="status" type="checkbox" data-on="primary" data-off="danger" data-size="small">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="editskpd" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-edit-skpd">
                            <div class="form-group">
                                <label>Nama SKPD</label>
                                <div>
                                    <input type="text" name="ednmskpd" class="form-control" id="ednmskpd" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pejabat</label>
                                <div>
                                    <input type="text" name="ednmpejabat" class="form-control" id="ednmpejabat" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Kantor</label>
                                <div>
                                    <input type="text" name="edalamat" class="form-control" id="edalamat" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Telephone</label>
                                <div>
                                    <input type="text" name="edtelephone" class="form-control" id="edtelephone" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <div>
                                    <input type="text" name="edfax" class="form-control" id="edfax" /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tugas Pokok dan Fungsi</label>
                                <div>
                                    <!-- <input type="text" name="fax" class="form-control" id="fax" />
                                      -->
                                    <textarea class="form-control" rows="6" id="edtugaspokok"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Join SKPD</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input id="edcariskpd" type="checkbox" data-on="primary" data-off="danger" data-size="small">
                                    </div>
                                    <div id="edccariskpd" class="col-md-9" hidden>
                                        <select id="edpencarianskpd" name="pencarianskpd" class="form-control"></select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <div>
                                    <input id="edstatus" type="checkbox" data-on="primary" data-off="danger" data-size="small">
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
<script src="dist/master_skpd.js" type="text/javascript"></script>