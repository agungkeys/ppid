<?php
class Pagination{
	var $baseURL		= '';
	var $totalRows  	= '';
	var $perPage	 	= 10;
	var $numLinks		=  2;
	var $currentPage	=  0;
	var $firstLink   	= '<i class="fa fa-angle-double-left"></i> Pertama';
	var $nextLink		= '<i class="fa fa-angle-double-right"></i>';
	var $prevLink		= '<i class="fa fa-angle-double-left"></i>';
	var $lastLink		= 'Terakhir <i class="fa fa-angle-double-right"></i>';
	var $fullTagOpen	= '<div class="paging-navigation"><ul class="flat-pagination">';
	var $fullTagClose	= '</ul></div>';
	var $firstTagOpen	= '<li class="next-page">';
	var $firstTagClose	= '</li>';
	var $lastTagOpen	= '<li class="next-page">';
	var $lastTagClose	= '</li>';
	var $curTagOpen		= '<li class="active"><a>';
	var $curTagClose	= '</a></li>';
	var $nextTagOpen	= '<li>';
	var $nextTagClose	= '</li>';
	var $prevTagOpen	= '<li>';
	var $prevTagClose	= '</li>';
	var $numTagOpen		= '<li>';
	var $numTagClose	= '</li>';
	var $anchorClass	= '';
	var $showCount      = true;
	var $currentOffset	= 0;
	var $contentDiv     = '';
    var $additionalParam= '';
    
	function __construct($params = array()){
		if (count($params) > 0){
			$this->initialize($params);		
		}
		
		if ($this->anchorClass != ''){
			$this->anchorClass = 'class="'.$this->anchorClass.'" ';
		}	
	}
	
	function initialize($params = array()){
		if (count($params) > 0){
			foreach ($params as $key => $val){
				if (isset($this->$key)){
					$this->$key = $val;
				}
			}		
		}
	}
	
	/**
	 * Buat link pagination
	 */	
	function createLinks(){ 
		// Jika jumlah baris adalah nol, tidak perlu melanjutkan
		if ($this->totalRows == 0 OR $this->perPage == 0){
		   return '';
		}

		// Hitung jumlah total halaman
		$numPages = ceil($this->totalRows / $this->perPage);

		// Apakah hanya ada satu halaman? Tidak perlu melanjutkan
		if ($numPages == 1){
			if ($this->showCount){
				$info = 'Tampilkan : ' . $this->totalRows;
				return $info;
			}else{
				return '';
			}
		}

		// Tentukan halaman saat ini
		if ( ! is_numeric($this->currentPage)){
			$this->currentPage = 0;
		}
		
		// Tautan variabel string konten
		$output = '';
		
		// Menampilkan pemberitahuan tautan
		if ($this->showCount){
		   $currentOffset = $this->currentPage;
		   $info = 'Tampilkan ' . ( $currentOffset + 1 ) . ' Ke ' ;
		
		   if( ( $currentOffset + $this->perPage ) < ( $this->totalRows -1 ) )
			  $info .= $currentOffset + $this->perPage;
		   else
			  $info .= $this->totalRows;
		
		   $info .= ' Dari ' . $this->totalRows . ' | ';
		
		   $output .= $info;
		}
		
		$this->numLinks = (int)$this->numLinks;
		
		// Apakah nomor halaman di luar jangkauan hasil? Halaman terakhir akan muncul
		if ($this->currentPage > $this->totalRows){
			$this->currentPage = ($numPages - 1) * $this->perPage;
		}
		
		$uriPageNum = $this->currentPage;
		
		$this->currentPage = floor(($this->currentPage/$this->perPage) + 1);

		// Hitung angka awal dan akhir.
		$start = (($this->currentPage - $this->numLinks) > 0) ? $this->currentPage - ($this->numLinks - 1) : 1;
		$end   = (($this->currentPage + $this->numLinks) < $numPages) ? $this->currentPage + $this->numLinks : $numPages;

		// Render link "Pertama"
		if  ($this->currentPage > $this->numLinks){
			$output .= $this->firstTagOpen 
				. $this->getAJAXlink( '' , $this->firstLink)
				. $this->firstTagClose; 
		}

		// Render link "sebelumnya"
		if  ($this->currentPage != 1){
			$i = $uriPageNum - $this->perPage;
			if ($i == 0) $i = '';
			$output .= $this->prevTagOpen 
				. $this->getAJAXlink( $i, $this->prevLink )
				. $this->prevTagClose;
		}

		// Tulislah link angka
		for ($loop = $start -1; $loop <= $end; $loop++){
			$i = ($loop * $this->perPage) - $this->perPage;
					
			if ($i >= 0){
				if ($this->currentPage == $loop){
					$output .= $this->curTagOpen.$loop.$this->curTagClose;
				}else{
					$n = ($i == 0) ? '' : $i;
					$output .= $this->numTagOpen
						. $this->getAJAXlink( $n, $loop )
						. $this->numTagClose;
				}
			}
		}

		// Render link "selanjutny"
		if ($this->currentPage < $numPages){
			$output .= $this->nextTagOpen 
				. $this->getAJAXlink( $this->currentPage * $this->perPage , $this->nextLink )
				. $this->nextTagClose;
		}

		// Render link "Terakhir"
		if (($this->currentPage + $this->numLinks) < $numPages){
			$i = (($numPages * $this->perPage) - $this->perPage);
			$output .= $this->lastTagOpen . $this->getAJAXlink( $i, $this->lastLink ) . $this->lastTagClose;
		}

		// Hapus garis miring ganda
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Tambahkan wrapper HTML jika ada
		$output = $this->fullTagOpen.$output.$this->fullTagClose;
		
		return $output;		
	}

	function getAJAXlink( $count, $text) {
        if( $this->contentDiv == '')
            return '<a href="'. $this->anchorClass . ' ' . $this->baseURL . $count . '">'. $text .'</a>';

        $pageCount = $count?$count:0;
        $this->additionalParam = "{'page' : $pageCount}";
		
	    return "<a href=\"javascript:void(0);\" " . $this->anchorClass . "
				onclick=\"$.post('". $this->baseURL."', ". $this->additionalParam .", function(data){
					   $('#". $this->contentDiv . "').html(data); }); return false;\">"
			   . $text .'</a>';
	}
}
?>