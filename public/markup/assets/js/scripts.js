var Config = {
	website: "http://lemi.404.ge/"
};

function isMobile(){
	var isMobile = false;
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))){
	    isMobile = true;
	}
	return isMobile;
}

$(document).on("click", ".language", function(){
	var opened = $(".language").attr("data-opened");
	if(opened=="false"){
		$(".language").attr("data-opened", "true");
		$(".choose-languages").slideDown("slow");
	}else{
		$(".language").attr("data-opened", "false");
		$(".choose-languages").slideUp("slow");
	}
});

$(document).on("click", "header .navigation .right nav", function(){
	if(isMobile()){
		$("ul", this).slideDown("slow");
	}
});

$(document).on("click", ".favourites", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);
	$(".theMessage").html("<p>Please sign in or sign up!</p>");
	$(".modal").modal("show");
});

$(document).on("click", ".mycart", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);
	$(".theMessage").html("<p>Please sign in or sign up!</p>");
	$(".modal").modal("show");
});


$(document).on("click", ".signIn", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	// Ajax Call here to retrieve form
	var html =	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Email Address\" />" +
				"</div>"; 

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"password\" class=\"form-control\" placeholder=\"Password\" />" +
				"</div>"; 
		html += "<button class=\"popupSearchbutton\">Sign In</button>"; 
		html += "<p><a href=\"javascript:void(0)\" class=\"recoverPassword\" data-boxtitle=\"Recover Password\">Recover Password</a> / <a href=\"javascript:void(0)\"  class=\"createAccount\" data-boxtitle=\"Create New Account\">Create New Account</a></p>"; 

	$(".theMessage").html(html);
	$(".modal").modal("show");
});

$(document).on("click", ".createAccount", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	// Ajax Call here to retrieve form
	var html =	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Email Address\" />" +
				"</div>"; 

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"password\" class=\"form-control\" placeholder=\"Password\" />" +
				"</div>"; 
		html +=	"<div class=\"input-group\">" +
 				"<input type=\"password\" class=\"form-control\" placeholder=\"Comfirm Password\" />" +
				"</div>"; 

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"First Name\" />" +
				"</div>"; 

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Last Name\" />" +
				"</div>"; 

		html += "<section class=\"dateBox\">"+
				"<input type=\"text\" class=\"form-control date\" value=\"\" placeholder=\"Date Of Birth\" readonly=\"readonly\" />" +
				"</section>";

		html += "<select class=\"selectpicker\" data-live-search=\"true\">" +
				"<option value=\"\">Gender</option>" +
				"<option value=\"1\">Male</option>" +
				"<option value=\"2\">Female</option>" + 
			"</select>";

		html += "<select class=\"selectpicker\" data-live-search=\"true\">" +
				"<option value=\"\">Country</option>" +
				"<option value=\"1\">England</option>" +
				"<option value=\"2\">Spain</option>" + 
				"<option value=\"3\">Russion</option>" +
				"<option value=\"4\">Georgia</option>" +
			"</select>";

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"City\" />" +
				"</div>"; 

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Phone\" />" +
				"</div>"; 

		html +=	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Post Code\" />" +
				"</div>"; 

		html += "<button class=\"popupSearchbutton\">Create Account</button>"; 
		
	$(".theMessage").html(html);
	$('.selectpicker').selectpicker();
	$(".date").datepicker({
		format: 'mm/dd/yyyy'
	});
	$(".modal").modal("show");
});

$(document).on("click", ".recoverPassword", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	// Ajax Call here to retrieve form
	var html =	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Email\" />" +
				"</div>"; 
	html += "<button class=\"popupSearchbutton\">Recover</button>"; 
		
	$(".theMessage").html(html);
});


$(document).on("click", ".searchPopUp", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);
	// Ajax Call here to retrieve form
	var html =	"<div class=\"input-group\">" +
 				"<input type=\"text\" class=\"form-control\" placeholder=\"Type Tour Title\" />" +
				"</div>"; 
	html += "<select class=\"selectpicker\" data-live-search=\"true\">" +
				"<option value=\"\">Destinations</option>" +
				"<option value=\"1\">Tbilisi</option>" +
				"<option value=\"2\">Batumi</option>" + 
				"<option value=\"3\">Ureki</option>" +
				"<option value=\"4\">Qobuleti</option>" +
				"<option value=\"5\">Baxmaro</option>" +
			"</select>";
	html +=	"<select class=\"selectpicker\" data-live-search=\"true\">" +
				"<option value=\"\">Season</option>" +
				" <option value=\"1\">Spring</option>" +
				"<option value=\"2\">Summer</option>" + 
				"<option value=\"3\">Fall</option>" +
				"<option value=\"4\">Winter</option>" +
			"</select>";
	html +=	"<select class=\"selectpicker\" data-live-search=\"true\">" +
				"<option value=\"\">Adventure Type</option>" +
				" <option value=\"1\">Outdoor Activity</option>" +
				"<option value=\"2\">Cycle Tour</option>" + 
				"<option value=\"3\">Culinary, Food &amp; Wine Tours</option>" +
				"<option value=\"4\">Relaxation Tours</option>" +
				"<option value=\"5\">Cultural &amp; Thematic Tours</option>" +
			"</select>";
	html += "<section class=\"dateBox\">"+
			"<input type=\"text\" class=\"form-control date\" value=\"\" placeholder=\"Arrival\" readonly=\"readonly\" />" +
			"</section>";
	html += "<section class=\"dateBox\">"+
			"<input type=\"text\" class=\"form-control date\" value=\"\" placeholder=\"Departure\" readonly=\"readonly\" />" +
			"</section>";
	html +=	"<div class=\"input-group\">" +
 			"<input type=\"text\" class=\"form-control\" placeholder=\"Guests\" />" +
			"</div>"; 
	html += "<button class=\"popupSearchbutton\">Search</button>"; 

	

	$(".theMessage").html(html);
	$('.selectpicker').selectpicker();
	$(".date").datepicker({
		format: 'mm/dd/yyyy'
	});
	$(".modal").modal("show");
});

var goto = function(x){
	location.href = x;
};

$(document).ready(function(){
	var svg1 = document.getElementById("svg1");
	svg1.addEventListener("load",function(){
	var svgDoc = svg1.contentDocument;
        var container = svgDoc.getElementById("container");
        container.addEventListener("mousedown",function(){
            location.href = "/";
        }, false);
    }, false);

	$('#carousel-example-generic').carousel({
	  interval: 5000
	});

	$(document).on("mouseenter", "main .center .topTravelsSlider .owl-carousel .owl-stage-outer .owl-stage .owl-item .owlItem", function(){
		$(".share", this).animate({bottom:20}, 300, function() {
		    //callback
		});
	});
	
	$(document).on("mouseleave", "main .center .topTravelsSlider .owl-carousel .owl-stage-outer .owl-stage .owl-item .owlItem", function(){
		$(".share", this).animate({bottom:-40}, 300, function() {
		    //callback
		});
	});

	

	$(document).on("click", ".checkbox-input", function(){
		var enabled = $(this).attr("data-enabled");
		var turn = $(this).attr("data-turn");
		
		if(enabled=="true"){
			if(turn=="off"){
				$(this).attr("data-turn", "on");
			}else{
				$(this).attr("data-turn", "off");
			}
			$(this).toggleClass("fa-toggle-on fa-toggle-off");
		}		
	});

	//
	$(document).on("click", ".checkbox-sub-input", function(){
		var sub = $(this).attr("data-sub");
		var turn = $(this).attr("data-turn");
		var subtype = $(this).attr("data-subtype");

		if(subtype=="single-select"){
			$("#"+sub+" .checkbox-sub-input").removeClass("fa-toggle-on").addClass("fa-toggle-off");
		}

		if(turn=="on"){
			$(this).attr("data-turn", "off");
		}else{
			$(this).attr("data-turn", "on");
		}

		$(this).toggleClass("fa-toggle-on fa-toggle-off");
	});


	
});