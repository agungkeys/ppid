<div id="posts_content">
<?php 
	$idskpd = $_GET['idskpd']; 

	include('admin/controller/artikel_instansi/halaman.php');
	include('admin/engine/db_config.php');
	$limit = 3;

	//function limit for isi artikel
	function limit_text($text, $limit) {
	  if (str_word_count($text, 0) > $limit) {
	      $words = str_word_count($text, 2);
	      $pos = array_keys($words);
	      $text = substr($text, 0, $pos[$limit]) . '  ';
	  }
	  return $text;
	}

	//Mendapatkan jumlah baris
	$queryNum = $mysqli->query("SELECT COUNT(*) as postNum FROM artikel WHERE IDSKPD ='".$idskpd."' ");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];

    //Menginisialisasi kelas pagination
    $pagConfig = array('baseURL'=>'admin/controller/artikel_instansi/ambilData.php?idskpd='.$idskpd.'', 'totalRows'=>$rowCount, 'perPage'=>$limit, 'contentDiv'=>'posts_content');
    $pagination =  new Pagination($pagConfig);

    //dapat baris

    $query = $mysqli->query("SELECT artikel.IDARTIKEL, skpd.NAME, artikel.JUDULARTIKEL, artikel.ISIARTIKEL, artikel.IMG, artikel.USER, artikel.DATECREATE, artikel.IDSKPD FROM artikel INNER JOIN skpd ON artikel.IDSKPD = skpd.IDSKPD WHERE artikel.IDSKPD = '".$idskpd."' ORDER BY artikel.IDARTIKEL DESC LIMIT $limit");
    if($query->num_rows > 0){ ?>
    	<?php
            while($row = $query->fetch_assoc()){ 
                $postID = $row['IDARTIKEL'];
                $imgc	= $row['IMG'];
                $imgcj	= substr($imgc, 2);
                $datefor= date("d F Y", strtotime($row["DATECREATE"]));
?>
<article class="blog-post">
	<div class="row">
		<div class="">
			<div class="col-md-12">
				<div class="entry-post">
					<h4 class="entry-title">
						<a href="#" title=""><span><?php echo $row['JUDULARTIKEL']; ?></span></a>
					</h4>
					<ul class="entry-meta">
						<li class="post-date">
							<i class="fa fa-calendar"></i>&nbsp;<?php echo $datefor; ?>
						</li>
						
						<li class="post-categories">
							<span><i class="fa fa-institution"></i> <a title=""><?php echo $row["NAME"]; ?></a></span>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="featured-post">
					<a href="#" title="">
						<?php echo"<img class='img-zoom' src='admin/".$imgcj."' >"; ?>
					</a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="content-post">
					<p>
						<?php echo limit_text($row["ISIARTIKEL"], 75)."<a href='index.php?page=detailberita&idberita=".$row["IDARTIKEL"]."' style='color: #2691e4' target='_blank'>read more...</a>"; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</article>

		<?php } ?>
			
    <?php echo $pagination->createLinks(); ?>
<?php }else{ ?>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12" style="background: #F44336;color: #fff;text-align: center;padding: 10px;">
			Data Berita Tidak Ditemukan...!!!
		</div>
	</div>
</div>

	
<?php } ?>
</div>