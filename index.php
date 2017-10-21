
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
	<!-- Basic Page Needs -->
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>PPID Pemerintah Kabupaten Jember | Terbuka - Transparan</title>

	<meta name="author" content="PPID Kabupaten Jember">

	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Boostrap style -->
	<link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.min.css">

	<!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">

	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href="stylesheets/style.css">

	<!-- Ionicons style -->
	<link rel="stylesheet" type="text/css" href="stylesheets/ionicons.min.css">	

	<!-- Reponsive -->
	<link rel="stylesheet" type="text/css" href="stylesheets/responsive.css">

	<!-- Colors -->
    <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors">

    <!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="javascript/datatables/dataTables.min.css">

	<!-- SweetAlert -->
	<link href="plugin/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="plugin/toastr/toastr.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

	<!-- Favicon -->
    <link href="logo.png" rel="icon">
    <link href="logo.png" rel="icon">
    <link href="favicon.ico" rel="shortcut icon">
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/knockoutjs/knockout-3.4.2.js" type="text/javascript"></script>
    <script type="text/javascript">
      var hal = {
        page: ko.observable(""),
        jenisdok: ko.observable(""),
        profilinstansi: ko.observable(false),
      };
    </script>
</head>
	<body class="header_sticky">
		<div class="boxed">

		<!-- Preloader -->
		<div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div><!-- /.preloader -->

		<div class="top header-style2">
			<div class="container">
				<div class="content-left">
					<ul class="flat-infomation">
						<li class="phone">
							<i class="fa fa-phone"></i>Telp. 0331-428824
						</li>
						<li class="email">
							<i class="fa fa-envelope"></i>
							<a href="#" title="">ppidjember@gmail.com</a>
						</li>
					</ul><!-- /.flat-infomation -->
				</div><!-- /.content-left -->
				<div class="content-right">
					<!-- <ul class="flat-social">
						<li class="facebook">
							<a href="#" title=""><i class="fa fa-facebook"></i></a>
						</li>
						<li class="twitter">
							<a href="#" title=""><i class="fa fa-twitter"></i></a>
						</li>
						<li class="google-plus">
							<a href="#" title=""><i class="fa fa-google-plus"></i></a>
						</li>
						<li class="linkedin">
							<a href="#" title=""><i class="fa fa-linkedin"></i></a>
						</li>
					</ul> -->
					<!-- /.flat-social -->
					<div class="info-top-right">
						<a href="admin" class="appoinment" title="">LOGIN</a>
					</div>
				</div>
				<!-- /.content-right -->
			</div><!-- /.container -->
		</div><!-- /.top -->

		<section class="header style2">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="header-wrap">
							<div id="logo" class="logo" style="display: flex; margin-top: 10px; padding-bottom: 10px;">
								<a href="#" title="">
									<img src="images/logo-jember.png" alt="" style="width: 55px;">

								</a>
								<div style="padding-left: 20px;">
									<h3 style="margin-top: 0px; margin-bottom: 0px; font-weight: bold; color: #0096ff">PPID Pemerintah Kabupaten Jember </h1>
									<h5 style="margin-bottom: -5px; margin-top: 0px; color: #555; font-style: italic;">Terbuka - Transparan</h3>
									<span style="font-size: 12px; margin-top: -20px; color: #000;">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI PEMERINTAH KABUPATEN JEMBER.</span>
								</div>
								
							</div><!-- /.logo -->
							<div class="header-content">
								<!-- <ul>
									<li>
										<i class="ion-location"></i>
										<strong>Office Address</strong>
										<p>PO Box 16122 Collins Street West </p>
									</li>
									<li>
										<i class="ion-android-time"></i>
										<strong>Open House</strong>
										<p>
											Mon - Sat: 8.30 am - 5.30 pm
										</p>
									</li>
									<li>
										<i class="ion-android-call"></i>
										<strong>Call Us</strong>
										<p>
											+61 3 8376 6284
									</p></li>
								</ul> -->
							</div><!-- /.header-content -->
						</div><!-- /.header-wrap -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->

			<div class="nav header-style2" style="border-bottom: 3px solid #ccc;">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-wrap">
						    	<div class="btn-menu">
							        <span></span>
							    </div> <!-- mobile menu button -->
						    	
							    <nav id="mainnav" class="mainnav">	
							    	<ul class="menu">
							    		<li class="beranda">
							    			<a href="index.php?page=beranda">Beranda</a>
							    		</li>
							    		<li class="seputarppid">
							    			<a href="#">Seputar PPID</a>
							    			<ul class="submenu">
							    				<li>
							    					<a href="index.php?page=dasarhukum" title="">Dasar Hukum</a>
							    				</li>
							    				<li>
							    					<a href="index.php?page=profilppid" title="">Profil PPID</a>
							    				</li>
							    				<li>
							    					<a href="index.php?page=pelayananppid" title="">Pelayanan PPID</a>
							    				</li>
							    			</ul>
							    		</li>
							    		<li class="jenisinformasi">
							    			<a href="#">Jenis Informasi</a>
							    			<ul class="submenu">
							    				<li>
							    					<a href="index.php?page=informasiberkala" title="">Informasi Berkala</a>
							    				</li>
							    				<li>
							    					<a href="index.php?page=informasisertamerta" title="">Informasi Serta Merta</a>
							    				</li>
							    				<li>
							    					<a href="index.php?page=informasisetiapsaat" title="">Informasi Setiap Saat</a>
							    				</li>
							    			</ul>
							    		</li>
							    		<li class="daftarinstansi">
							    			<a href="index.php?page=daftarinstansi">Daftar Instansi</a>
							    		</li>
							    		<li class="daftarinformasi">
							    			<a href="#">Daftar Informasi</a>
							    			<ul class="submenu">
							    				<li>
							    					<a href="index.php?page=daftarinformasi&param=InformasiBerkala" title="">Informasi Berkala</a>
							    				</li>
							    				<li>
							    					<a href="index.php?page=daftarinformasi&param=InformasiSertaMerta" title="">Informasi Serta Merta</a>
							    				</li>
							    				<li>
							    					<a href="index.php?page=daftarinformasi&param=InformasiSetiapSaat" title="">Informasi Setiap Saat</a>
							    				</li>
							    			</ul>
							    		</li>
							    		<!-- <li class="berita">
							    			<a href="index.php?page=berita">Berita</a>
							    		</li> -->
							    		<li class="kontak">
							    			<a href="index.php?page=kontak">Hubungi kami</a>
							    		</li>
							    	</ul>
							    </nav>
							</div>
							<!-- <ul class="flat-social">
								<li class="facebook">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
								</li>
								<li class="twitter">
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
								</li>
								<li class="google-plus">
									<a href="#" title=""><i class="fa fa-google-plus"></i></a>
								</li>
								<li class="linkedin">
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
								</li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.header style2 -->		

		
		<!-- ISI DENGAN CONTENT BODY -->
		
      	<section class="main-about page-wrap" style="padding-top: 40px">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<?php
				          $page = (isset($_GET['page']))? $_GET['page'] : "main";
				          switch ($page) {
				              // case 'dataartikel': include "input_dataartikel.php"; break;
				              // case 'tentangkami': include "tentangkami.php"; break;
				              case 'dasarhukum': include "dasarhukum.php"; break;
				              case 'profilppid': include "profilppid.php"; break;
				              case 'pelayananppid': include "pelayananppid.php"; break;
				              case 'informasiberkala': include "informasiberkala.php"; break;
				              case 'informasisertamerta': include "informasisertamerta.php"; break;
				              case 'informasisetiapsaat': include "informasisetiapsaat.php"; break;

				              case 'daftarinstansi': include "daftarinstansi.php"; break;
				              case 'berita': include "berita.php"; break;
				              case 'detailberita': include "detailberita.php"; break;
				              case 'kontak': include "kontak.php"; break;
				              case 'cari': include "cari.php"; break;
				              case 'request': include "request.php"; break;
				              case 'daftarinformasi': include "daftarinformasi.php"; break;
				              
				              default : include 'beranda.php'; 
				          	}
				      	?>

						<div class="widget-area">
							<div class="sidebar">
								<div class="widget widget-nav-menu">
									<ul class="menu-our-company">
										<!-- <li>
											<div style="padding: 10px 0;">
												<div style="padding-bottom: 10px;">Pencarian Dokumen</div>
												<div style="margin-bottom: -25px; padding-right: 25px;">
													<select class="form-control">
														<option value="">Pilih Dinas...</option>
														<option>Dinas Sosial</option>
														<option>Dinas Kesehatan</option>
														<option>Dinas Pendidikan</option>
														<option>Dinas Pekerjaan Umum</option>
														<option>Dinas Koperasi</option>
														<option>Dinas Lingkungan Hidup</option>
														<option>Dinas Pemadam Kebakaran</option>
													</select>
												</div>
												<div style="margin-bottom: -25px; padding-right: 25px;">
													<select class="form-control">
														<option value="">Pilih Tahun...</option>
						                                <script>
						                                    var tahun = 1940;
						                                    var y = new Date();
						                                    for(i=y.getFullYear();i>=tahun;i--){
						                                        document.write("<option>" + i + "</option>");
						                                    }
						                                </script>
													</select>
												</div>
												<div style="display: flex;">
													<div class="input-group" style="padding-right: 25px">

														<input type="text" class="form-control" id="exampleInputAmount" placeholder="Cari Dokumen...">
														<div onclick="cariDokumen();" class="input-group-addon" style="background: #2691e4; color: #fff; border-color: #2691e4"><i class="fa fa-search"></i></div>
													</div>
												</div>
											</div>
										</li> -->
										<!-- <li data-bind="visible: hal.profilinstansi">
											<div id="profilinstansi" style="padding-top: 10px;">

												<div style="padding-bottom: 10px;">Profil Instansi</div>
												
												<div class="input-group" style="padding-right: 25px; padding-bottom: 10px;">
													<div style="font-weight: normal;">
														<table>
															<tr>
																<td><i class="fa fa-institution"></i></td>
																<td>&nbsp;:&nbsp;</td>
																<td id="infodinas"></td>
															</tr>
															<tr>
																<td><i class="fa fa-user-circle"></i></td>
																<td>&nbsp;:&nbsp;</td>
																<td id="infopejabat"></td>
															</tr>
															<tr>
																<td><i class="fa fa-map-pin"></i></td>
																<td>&nbsp;:&nbsp;</td>
																<td id="infolokasi"></td>
															</tr>
															<tr>
																<td><i class="fa fa-phone"></i></td>
																<td>&nbsp;:&nbsp;</td>
																<td id="infotelp"></td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</li> -->
										<!-- <li>
											<div class="title-left">
												<span>Daftar Informasi</span>
											</div>
											<a style="padding: 20px 0;">
												<div class="input-group" style="padding-right: 25px;">
													<select id="infojenisdokumen" class="form-control">
														<option value="">Pilih Jenis Dokumen...</option>
														<option value="InformasiBerkala">Informasi Berkala</option>
														<option value="InformasiSertaMerta">Informasi Serta Merta</option>
														<option value="InformasiSetiapSaat"">Informasi Setiap Saat</option>
													</select>
													<div onclick="cariInformasi();" class="input-group-addon" style="background: #2691e4; color: #fff; border-color: #2691e4"><i class="fa fa-search"></i></div>
												</div>
											</a>
										</li> -->
										<li>
											<div class="title-left">
												<span>Informasi Tanggal</span>
											</div>
											<div style="padding: 20px 0;">
												<!-- <div style="padding-bottom: 10px;">Informasi Tanggal</div> -->
												<div style="display: flex;">
													<i class="fa fa-calendar" style="font-size: 40px; color: #2691e4;"></i>
													<ul>
														<li style="font-weight: bold; margin-bottom: -2px;"><p id="jam" style="margin: 0px;font-weight: normal;"></p></li>
														<li style="font-weight: bold; margin:0px;"><p id="tanggalsekarang" style="font-weight: normal;"></p></li>
													</ul>
												</div>
											</div>
										</li>
										<!-- <li>
											<a style="padding: 10px 0;" href="index.php?page=daftarinstansi">
												<div style="padding-bottom: 10px;">Daftar Informasi</div>
												<div style="display: flex;">
													<i class="fa fa-clock-o" style="font-size: 40px; color: #2691e4;"></i>
													<ul>
														
														<li style="font-weight: normal; margin:0px;">Silahkan klik untuk mengetahui Daftar Instansi</li>
													</ul>
												</div>
											</a>
										</li> -->
										<!-- <div>
											<ul id="tree3">
											    <li style="padding-bottom: 3px;"><a href="#" style="padding-top: 0px;     margin-top: -10px;">Daftar Instansi</a>
											        <ul id="dinas">
											            <li style="font-weight: normal;">Dinas Pertanian</li>
											            <li style="font-weight: normal;">Dinas Peternakan</li>
											            <li style="font-weight: normal;">Dinas Perpajakan</li>
											        </ul>
											    </li>
											</ul>
										</div> -->
									</ul><!-- /.menu-our-company -->
								</div><!-- /.widget widdget-nav-menu -->
								<div class="widget widget-text">
									<h4 class="widget-title">Butuh Informasi Lebih ?</h4>
									<div class="textwidget">
										<p>Silahkan menghubungi kami melalui button dibawah ini</p>
										<a href="index.php?page=kontak" title="" style="width: 100%;">HUBUNGI KAMI</a>
									</div>
								</div><!-- /.widget widget-text -->
								
							
							</div><!-- /.sidebar -->
						</div><!-- /.widget-area -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section>

		<!-- /.main-about -->
		<!-- END ISI DENGAN CONTENT BODY -->
		

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="footer-widgets">
						<div class="col-md-4 col-sm-6">
							<div class="widget widget_text">
								<h4 class="widget-title">Tentang Kami</h4>
			                    <div class="textwidget">
			                        <img src="images/logo-jember.png" alt="images" style="width: 55px;">
			                        <p>
			                        Pejabat Pengelola Informasi dan Dokumentasi Pemerintah Kabupaten Jember.
			                        </p>
			                    </div>
			                    <!-- <div class="widget widget_socials">
				                    <div class="socials">
				                        <a class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
				                        <a class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
				                        <a class="google" target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
				                        <a class="pinterest" target="_blank" href="#"><i class="fa fa-pinterest"></i></a>
				                        <a class="dribbble" target="_blank" href="#"><i class="fa fa-dribbble"></i></a>
				                    </div>
				                </div> -->
			                </div>					
						</div><!-- /.col-md-4 col-sm-6 -->
						<div class="col-md-4 col-sm-6">
							<div class="widget widget_text">
								<h4 class="widget-title">Hubungi Kami</h4>
								<ul class="menu-our-services">
									<li>
										<i class="fa fa-home"></i>
										<a href="#" title="" style="padding-left: 10px;">
										Bagian Humas dan Protokol</a>
									</li>
									<li>
										<i class="fa fa-map-marker"></i>
										<a href="#" title="" style="padding-left: 10px;">
										Jl. Sudarman 1 Jember – 68118</a>
									</li>
									<li>
										<i class="fa fa-phone"></i>
										<a href="#" title="" style="padding-left: 10px;">
										Telp. (0331) 428824</a>
									</li>
									<li>
										<i class="fa fa-fax"></i>
										<a href="#" title="" style="padding-left: 10px;">
										Fax. (0331) 425644</a>
									</li>
									<li>
										<i class="fa fa-envelope"></i>
										<a href="#" title="" style="padding-left: 10px;">
										ppidjember@gmail.com</a>
									</li>
									<!-- <li>
										<a href="#" title="">Supply Chain Solutions</a>
									</li>
									<li>
										<a href="#" title="">Freight forwarding</a>
									</li>
									<li>
										<a href="#" title="">Customs Brokerage</a>
									</li> -->
								</ul>
								<!-- /.menu-our-services -->
							</div><!-- /.widget widget-nav-menu -->
						</div><!-- /.col-md-4 col-sm-6 -->
						<div class="col-md-4 col-sm-6">
							<div class="widget widget-contact">
								<!-- <h4 class="widget-title">Contact From</h4> -->
								<form action="#" method="get" accept-charset="utf-8">
									<!-- <div class="form-ft">
										<div class="flat-wrap-field">
											<div class="flat-one-half">
												<input type="text" name="your name" placeholder="Name" required="">
											</div>
											<div class="flat-one-half">
												<input type="email" name="your email" placeholder="Email" required="">
											</div>
										</div>
										<p>
											<textarea name="your-message" cols="40" rows="10" placeholder="Message"></textarea>
										</p>
										<p>
											<button type="button" class="btn-contact-ft">Send Message</button>
										</p>
									</div> -->
									<!-- /.form-ft -->
								</form><!-- /form -->
							</div><!-- /.widget widget-contact -->
						</div><!-- /.col-md-4 col-sm-6 -->
					</div><!-- /.footer-widgets -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<section class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							<p>Coyright <i class="fa fa-copyright"></i>	<?php echo date("Y"); ?> PPID Kab. Jember - All rights reserved.</p>
						</div><!-- /.copyright -->
						<a class="go-top">
                            <i class="fa fa-chevron-up"></i>
                        </a><!-- /.go-top -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.footer-bottom -->

		</div><!-- boxed -->

		<!-- Javascript -->
		
	    
	    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
	    <!-- <script type="text/javascript" src="javascript/bootstrap-treeview.js"></script> -->
	    <script type="text/javascript" src="javascript/easing.js"></script>
	    <script type="text/javascript" src="javascript/waypoints.min.js"></script>
	    <script type="text/javascript" src="javascript/parallax.js"></script>
	    <script type="text/javascript" src="javascript/jquery.flexslider-min.js"></script>
    	<script type="text/javascript" src="javascript/owl.carousel.js"></script>
    	<script type="text/javascript" src="javascript/jquery-countTo.js"></script>
    	<script type="text/javascript" src="javascript/jquery-validate.js"></script>

    	<script type="text/javascript" src="javascript/jquery.cookie.js"></script>
    	<!-- <script type="text/javascript" src="javascript/switcher.js"></script> -->

    	<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtRmXKclfDp20TvfQnpgXSDPjut14x5wk&amp;region=GB"></script> -->
   		<script type="text/javascript" src="javascript/gmap3.min.js"></script>

	    <script type="text/javascript" src="javascript/smoothscroll.js"></script>
	    <script type="text/javascript" src="javascript/main.js"></script>
	    <!-- DataTables -->
	    <script type="text/javascript" src="javascript/datatables/dataTables.min.js"></script>
	    <script type="text/javascript" src="javascript/pdfobject.min.js"></script>

	    <!-- Sweet alert js -->
		<script src="plugin/sweetalert/sweetalert.min.js" type="text/javascript"></script>
		<script src="plugin/toastr/toastr.min.js" type="text/javascript"></script>

		<!-- WYSIWYG -->
		<script type="text/javascript" src="admin/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
		<script type="text/javascript" src="admin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	    <script>
	    	function cariInformasi(){
	    		var val = $("#infojenisdokumen").val();
	    		window.location.href = "index.php?page=daftarinformasi&param="+val+"";
	    	}
	    	function cariDokumen() {
		      	window.location.href = "index.php?page=cari";
		    }  
	    	function callPrepareMenu(){
	    		var pgMenu = hal.page();
	    		if (pgMenu=="Beranda"){
			        $(".beranda").addClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="TentangKami"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").addClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="DaftarInstansi"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").addClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="Berita"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").addClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="Kontak"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").addClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="DasarHukum"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").addClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="ProfilPPID"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").addClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="PelayananPPID"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").addClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="InformasiBerkala"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").addClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="InformasiSertaMerta"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").addClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="InformasiSetiapSaat"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").addClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}else if(pgMenu=="DaftarInformasi"){
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").addClass("active");
		      	}else{
		      		$(".beranda").removeClass("active");
			        $(".tentangkami").removeClass("active");
			        $(".daftarinstansi").removeClass("active");
			        $(".berita").removeClass("active");
			        $(".kontak").removeClass("active");
			        $(".seputarppid").removeClass("active");
			        $(".jenisinformasi").removeClass("active");
			        $(".daftarinformasi").removeClass("active");
		      	}
	    	}

	    	function startTime(){
				var today=new Date();
				var h=today.getHours();
				var m=today.getMinutes();
				var s=today.getSeconds();
				// add a zero in front of numbers<10<br>
				m=checkTime(m);
				s=checkTime(s);
				document.getElementById('jam').innerHTML=h+":"+m+":"+s;
				t=setTimeout(function(){startTime()},500);
			}
			
			function checkTime(i){
				if (i<10) {i="0" + i;} return i;
			}

			$.fn.extend({
			    treed: function (o) {
			      
			      var openedClass = 'glyphicon-minus-sign';
			      var closedClass = 'glyphicon-plus-sign';
			      
			      if (typeof o != 'undefined'){
			        if (typeof o.openedClass != 'undefined'){
			        openedClass = o.openedClass;
			        }
			        if (typeof o.closedClass != 'undefined'){
			        closedClass = o.closedClass;
			        }
			      };
			      
			        //initialize each of the top levels
			        var tree = $(this);
			        tree.addClass("tree");
			        tree.find('li').has("ul").each(function () {
			            var branch = $(this); //li with children ul
			            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
			            branch.addClass('branch');
			            branch.on('click', function (e) {
			                if (this == e.target) {
			                    var icon = $(this).children('i:first');
			                    icon.toggleClass(openedClass + " " + closedClass);
			                    $(this).children().children().toggle();
			                }
			            })
			            branch.children().children().toggle();
			        });
			        //fire event from the dynamically added icon
			      tree.find('.branch .indicator').each(function(){
			        $(this).on('click', function () {
			            $(this).closest('li').click();
			        });
			      });
			        //fire event to open branch if the li contains an anchor instead of text
			        tree.find('.branch>a').each(function () {
			            $(this).on('click', function (e) {
			                $(this).closest('li').click();
			                e.preventDefault();
			            });
			        });
			        //fire event to open branch if the li contains a button instead of text
			        tree.find('.branch>button').each(function () {
			            $(this).on('click', function (e) {
			                $(this).closest('li').click();
			                e.preventDefault();
			            });
			        });
			    }
			});

			//Initialization of treeviews
			$('#tree3').treed({openedClass:'', closedClass:''});
			$(document).ready(function () {
		      "use strict";
		      callPrepareMenu();
		      ko.applyBindings(hal);
		      startTime();
		    });
		</script>
	</body>
</html>