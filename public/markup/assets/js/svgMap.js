function resetSvg(regions){
	for(var i = 0; i < regions.length; i++){
		regions[i].setAttribute("fill","#000000");
	}
}

function loadTheSvg(texts){
	var svg = document.getElementById("svgContainer");
	svg.addEventListener("load", function(){
	    var svgDoc = svg.contentDocument;
	   
	    var regions = [
	    	svgDoc.getElementById("ajara"),
	    	svgDoc.getElementById("apkhazia"),
	    	svgDoc.getElementById("guria"),
	    	svgDoc.getElementById("kvemoKartli"),
	    	svgDoc.getElementById("imereti"),
	    	svgDoc.getElementById("mckhetaMtianeti"),
	    	svgDoc.getElementById("kakheti"),
	    	svgDoc.getElementById("rachaLechkhumi"),
	    	svgDoc.getElementById("samckheJavakheti"), 
	    	svgDoc.getElementById("samkhretOseti"), 
	    	svgDoc.getElementById("shidaKartli"),
	    	svgDoc.getElementById("samegreloZemosvaneti"),
	    	svgDoc.getElementById("tbilisi")
	    ];

	    regions[0].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[0].setAttribute("fill","#fee133");
			$(".r-title").text(texts[0][0]);
			$(".r-text").html(texts[0][1]);
			$(".r-link").attr("href", texts[0][2]);
	    }, false);

	    regions[1].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[1].setAttribute("fill","#fee133");
			$(".r-title").text(texts[1][0]);
			$(".r-text").html(texts[1][1]);
			$(".r-link").attr("href", texts[1][2]);
	    }, false);

	    regions[2].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[2].setAttribute("fill","#fee133");
			$(".r-title").text(texts[2][0]);
			$(".r-text").html(texts[2][1]);
			$(".r-link").attr("href", texts[2][2]);
	    }, false);

	    regions[3].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[3].setAttribute("fill","#fee133");
			$(".r-title").text(texts[3][0]);
			$(".r-text").html(texts[3][1]);
			$(".r-link").attr("href", texts[3][2]);
	    }, false);

	    regions[4].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[4].setAttribute("fill","#fee133");
			$(".r-title").text(texts[4][0]);
			$(".r-text").html(texts[4][1]);
			$(".r-link").attr("href", texts[4][2]);
	    }, false);

	    regions[5].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[5].setAttribute("fill","#fee133");
			$(".r-title").text(texts[5][0]);
			$(".r-text").html(texts[5][1]);
			$(".r-link").attr("href", texts[5][2]);
	    }, false);

	    regions[6].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[6].setAttribute("fill","#fee133");
			$(".r-title").text(texts[6][0]);
			$(".r-text").html(texts[6][1]);
			$(".r-link").attr("href", texts[6][2]);
	    }, false);

	    regions[7].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[7].setAttribute("fill","#fee133");
			$(".r-title").text(texts[7][0]);
			$(".r-text").html(texts[7][1]);
			$(".r-link").attr("href", texts[7][2]);
	    }, false);

	    regions[8].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[8].setAttribute("fill","#fee133");
			$(".r-title").text(texts[8][0]);
			$(".r-text").html(texts[8][1]);
			$(".r-link").attr("href", texts[8][2]);
	    }, false);

	    regions[9].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[9].setAttribute("fill","#fee133");
			$(".r-title").text(texts[9][0]);
			$(".r-text").html(texts[9][1]);
			$(".r-link").attr("href", texts[9][2]);
	    }, false);

	    regions[10].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[10].setAttribute("fill","#fee133");
			$(".r-title").text(texts[10][0]);
			$(".r-text").html(texts[10][1]);
			$(".r-link").attr("href", texts[10][2]);
	    }, false);

	    regions[11].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[11].setAttribute("fill","#fee133");
			$(".r-title").text(texts[11][0]);
			$(".r-text").html(texts[11][1]);
			$(".r-link").attr("href", texts[11][2]);
	    }, false);

	    regions[12].addEventListener("mousedown",function(e){
	   		resetSvg(regions);
			regions[12].setAttribute("fill","#fee133");
			$(".r-title").text(texts[12][0]);
			$(".r-text").html(texts[12][1]);
			$(".r-link").attr("href", texts[12][2]);
	    }, false);

    }, false);
}