<script type="text/javascript">
	hal.page("DetailBerita");
</script>
<?php
	include('admin/engine/db_config.php');
	$paraminformasi = $_GET['idberita'];

	$query = $mysqli->query("SELECT artikel.IDARTIKEL, skpd.NAME, artikel.JUDULARTIKEL, artikel.ISIARTIKEL, artikel.IMG, artikel.USER, artikel.DATECREATE, artikel.IDSKPD FROM artikel INNER JOIN skpd ON artikel.IDSKPD = skpd.IDSKPD  WHERE artikel.IDARTIKEL = '".$paraminformasi."' "); 
	


	if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()) { 
					$imgc	= $row['IMG'];
					$imgcj	= substr($imgc, 2);
					$datefor= date("d F Y", strtotime($row["DATECREATE"]));

?>
<div class="content-area">
	<div class="post-wrap">
		<article class="blog-single">
			<div class="content-post">
				<div class="entry-post">
					<h2 class="entry-title" style="margin-top: 0px; margin-bottom: 5px;">
						<a href="#" title=""><?php echo $row["JUDULARTIKEL"]; ?></a>
					</h2>
					<div class="clearfix">
					</div>
					<ul class="entry-meta">
						<li class="post-date">
							<?php echo $datefor; ?>
						</li>
						<li class="post-author">
							<span>By: <a title="" style="text-transform: capitalize;"><?php echo $row["USER"]; ?></a></span>
						</li>
						<li class="post-categories">
							<span>SKPD: <a title=""><?php echo $row["NAME"]; ?></a></span>
						</li>
					</ul>
				</div>
				</br></br>
				<p><?php echo"<img width='50%' align='left' style='padding-right: 10px;' class='img-zoom' src='admin/".$imgcj."' >"; ?>
					<?php echo $row["ISIARTIKEL"]; ?>
				</p>
			</div><!-- /.content-post -->
		</article><!-- /.blog-post -->
	</div>
</div>
<?php
		}
	}
?>