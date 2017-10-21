<script>
	page.pageDestination("MasterUser");
</script>
<section class="wrapper">
	<div class="row">
		<!-- <div class="col-md-12"><h1>Master User</h1></div> -->
		<div class="col-md-12">
            <section class="panel">
	            <header class="panel-heading">
	            	Master User
	            	<span class="tools pull-right" style="margin-top: -5px;">
                        <button onclick="us.tambah();" id="tambah" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah User</button>
                    	<button onclick="us.prepare();" id="batal" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
                    	<button onclick="us.adduser();" id="simpan" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Simpan</button>
                    	<button onclick="us.editUserSave();" id="perbarui" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Perbarui</button>
                    </span>
	            </header>
                <div id="griduser" class="panel-body">
                    <div class="table-responsive">
                        <table id="DataTableUser" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pengguna</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Lokasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="adduser" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-user">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="username" class="form-control" id="username" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
                                <div class="col-md-8">
                                    <input type="text" name="password" class="form-control" id="password"/> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" name="namalengkap" class="form-control" id="namalengkap" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="pegawaippid@gmail.com" /> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Level</label>
                                <div class="col-md-8">
                                    <select id="level" name="level" class="selectpicker form-control m-bot15" title="Pilih Level...">
                                        <?php if($level != 'Super Admin'){}else{echo '<option data-tokens="Super Admin">Super Admin</option>';} ?>
                                        <option data-tokens="Admin Operator">Admin Operator</option>
                                        <!-- <option data-tokens="Pimpinan">Pimpinan</option>
                                        <option data-tokens="Pegawai">Pegawai</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">SKPD</label>
                                <div class="col-md-8">
                                    <select id="lokasiskpd" name="lokasiskpd" class="selectpicker form-control m-bot15"></select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="edituser" class="panel-body" hidden>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <form method="post" id="form-add-user">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Username</label>
                                <div class="col-md-8">
                                    <input type="text" name="edusername" class="form-control" id="edusername" readonly /> 
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
                                    <select id="edlevel" name="edlevel" class="selectpicker form-control m-bot15" title="Pilih Level...">
                                        <?php if($level != 'Super Admin'){}else{echo '<option data-tokens="Super Admin">Super Admin</option>';} ?>
                                        <option data-tokens="Admin Operator">Admin Operator</option>
                                        <!-- <option data-tokens="Pimpinan">Pimpinan</option>
                                        <option data-tokens="Pegawai">Pegawai</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Satuan Kerja</label>
                                <div class="col-md-8">
                                    <select id="edlokasiskpd" name="edlokasiskpd" class="form-control"></select>
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
<script src="dist/master_user.js" type="text/javascript"></script>