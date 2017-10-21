
function clickforembed(val){
	if(val == "1"){
		$("#modalpdf").modal('show');
		var title 	= $(".iconbox-desc.title1").text();
		var url		= "././images/uu1.pdf";
		$("#titlepdf").text(title)
		embedpdf(url);
	}else if(val == "2"){
		$("#modalpdf").modal('show');
		var title 	= $(".iconbox-desc.title2").text();
		var url		= "././images/uu2.pdf";
		$("#titlepdf").text(title)
		embedpdf(url);
	}else if(val == "3"){
		$("#modalpdf").modal('show');
		var title 	= $(".iconbox-desc.title3").text();
		var url		= "././images/uu5.pdf";
		$("#titlepdf").text(title)
		embedpdf(url);
	}else{
		$("#modalpdf").modal('show');
		var title 	= $(".iconbox-desc.title4").text();
		var url		= "././images/uu4.pdf";
		$("#titlepdf").text(title)
		embedpdf(url);
	}
}

function embedpdf(url){
	PDFObject.embed(url, "#filepdf", {width: "100%"});
}


$(document).ready(function(){

})