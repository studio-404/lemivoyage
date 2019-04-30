var Config = {
	website: "https://lemivoyage.com/",
	ajax: "https://lemivoyage.com/fr/ajax/index",
	mainLang: "fr",
	mainClass: "home"
};

function isMobile(){
	var isMobile = false;
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))){
	    isMobile = true;
	}
	return isMobile;
}

function hideIt(section){
	console.log(section);
	for (var i = section.length - 1; i >= 0; i--) {
		$("#"+section[i]).hide();
	};
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
	return false;
});

$(document).on("click", "header .navigation .right nav", function(){
	if(isMobile()){
		$("ul", this).slideDown("slow");
	}
});

$(document).on("click", ".closeNavigation", function(){
	if(isMobile()){
		$("header .navigation .right nav ul").slideUp("slow");
		return false;
	}
});

$(document).on("click", ".favourites", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	var ajaxFile = "/favourites";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			var url = obj.Success.GoToUrl;
			location.href = url;
		}else{
			var text = obj.Error.Text;
			$(".theMessage").html(text);
			$(".modal").modal("show");
		}
	});
	return false;
});

$(document).on("click", ".mycart", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	var ajaxFile = "/mycart";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			var url = obj.Success.GoToUrl;
			location.href = url;
		}else{
			var text = obj.Error.Text;
			$(".theMessage").html(text);
			$(".modal").modal("show");
		}
	});
	return false;
});


$(document).on("click", ".addFavourite", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	var tourid = $(this).attr("data-tourid");
	$(".theTitle").html(boxtitle);

	var ajaxFile = "/addFavourite";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { tourid:tourid, lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			if(obj.Success.Status=="on"){
				$(".addFavourite i").removeClass("fa-heart-o").addClass("fa-heart");
			}else{
				$(".addFavourite i").removeClass("fa-heart").addClass("fa-heart-o");
			}
			$(".addFavourite span").text(obj.Success.StatusText);
		}else{
			var text = obj.Error.Text;
			$(".theMessage").html(text);
			$(".modal").modal("show");
		}
	});
});


$(document).on("click", ".removefavourite", function(){
	var tourid = $(this).attr("data-tourid");
	var ajaxFile = "/removeFavourite";

	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { tourid:tourid }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			location.reload();
		}else{
			var text = obj.Error.Text;
			console.log(text);
		}
	});
});

$(document).on("click", ".share", function(){
	var url = $(this).attr("data-url");
	window.open(url,'_blank');	
});


$(document).on("click", ".signIn", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	$(".theMessage").html("");
	var ajaxFile = "/loadsigninform";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			var html = obj.Success.form;
			$(".theMessage").html(html);

			$(document).on("click", ".signinbutton", function(){
				var form = $("#signinForm");
				var serialize = form.serialize();
				var ajaxFile2 = "/signin";

				$.ajax({
					method: "POST",
					url: Config.ajax + ajaxFile2,
					data: { serialize:serialize, lang:lang }
				}).done(function( msg2 ) {
					var obj2 = $.parseJSON(msg2);
					if(obj2.Success.Code==1){
						var text = obj2.Success.Text;	
						location.href = obj2.Success.GoToUrl;		
					}else{
						var text = obj2.Error.Text;
					}
					$(".signin-error-message").html(text).fadeIn("slow");
					scrollTop(".modal");
				});	
			});
		}
	});

	$(".modal").modal("show");
	return false;
});

$(document).on("click", ".bookNowButtonnoLogin", function(){
	$(".signIn").click();
});

$(document).on("change", "#choosepayment", function(){
	var choosepayment = $(this).val();
	var lang = $("#lang").val();
	if(choosepayment=="visa"){
		$("#payoutform").attr("action", "/"+lang+"/payout");
	}else{
		$("#payoutform").attr("action", "/"+lang+"/paypal");
	}
});

$(document).on("click", ".bookNowButton", function(){
	$("#payoutform").submit();
});

$(document).on("click", ".createAccount", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	$(".theMessage").html("");
	$(".modal").modal("show");
	var ajaxFile = "/loadcreateaccountform";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			var html = obj.Success.form;
			$(".theMessage").html(html);

			$(document).on("click", ".createAccountButton", function(){
				var form = $("#createAccountForm");
				var serialize = form.serialize();
				var ajaxFile2 = "/register";

				$.ajax({
					method: "POST",
					url: Config.ajax + ajaxFile2,
					data: { serialize:serialize, lang:lang }
				}).done(function( msg2 ) {
					var obj2 = $.parseJSON(msg2);
					if(obj2.Success.Code==1){
						var text = obj2.Success.Text;	
						location.href = obj2.Success.GoToUrl;		
					}else{
						var text = obj2.Error.Text;
					}
					$(".register-error-message").html(text).fadeIn("slow");
					scrollTop(".modal");
				});	
			});
			
			$('.selectpicker').selectpicker();
			
			$('.gend').on('changed.bs.select', function (e) {
            	$("#gender").val(e.target.value);
            });

            $('.coun').on('changed.bs.select', function (e) {
            	$("#country").val(e.target.value);
            });

			$(".date").datepicker({
				format: 'dd/mm/yyyy', 
				autoclose: true
			});

		}
	});	
	return false;
});

var scrollTop = function(el){
	var body = $(el);
	body.stop().animate({scrollTop:0}, '500', 'swing', function() { });
};


$(document).on("click", ".recoverPassword", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	$(".theMessage").html("");
	var ajaxFile = "/loadrecoverform";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			var html = obj.Success.form;
			$(".theMessage").html(html);

			$(document).on("click", ".recoverbutton", function(){
				var form = $("#recoverPasswordForm");
				var serialize = form.serialize();
				var ajaxFile2 = "/recover";

				$.ajax({
					method: "POST",
					url: Config.ajax + ajaxFile2,
					data: { serialize:serialize, lang:lang }
				}).done(function( msg2 ) {
					var obj2 = $.parseJSON(msg2);
					if(obj2.Success.Code==1){
						var text = obj2.Success.Text;	
					}else{
						var text = obj2.Error.Text;
					}

					setTimeout(3000, function(){
						location.reload();
					});

					$(".recover-error-message").html(text).fadeIn("slow");
					scrollTop(".modal");
				});	
			});

		}
	});
});


$(document).on("click", ".popupSearchbutton",function(e){
	var lang = $("#lang").val();
	var title = $(".pop-title").val();
	var destination = $(".pop-destination").val();
	var tourtypes = $(".pop-tourtypes").val();
	var arrival = $(".pop-arrival").val();
	var departure = $(".pop-departure").val();
	
	var urlPath = Config.website + lang + "/tours/?title="+ title +"&destination=" + destination + "&tourtype=" + tourtypes + "&arrival=" + arrival + "&departure=" + departure;

	location.href = urlPath;
});

$(document).on("click", ".catalogpagesearch",function(e){
	var lang = $("#lang").val();
	var catalogpagesearch_title = $(".catalogpagesearch_title").val();
	var catalogpagesearch_destination = $(".catalogpagesearch_destination").val();
	var catalogpagesearch_tourtypes = $(".catalogpagesearch_tourtypes").val();
	var catalogpagesearch_arrival = $(".catalogpagesearch_arrival").val().replace(/\//g,"-");
	var catalogpagesearch_departure = $(".catalogpagesearch_departure").val().replace(/\//g,"-");
	var catalogpagesearch_range = $(".catalogpagesearch_range").val();
	
	var urlPath = Config.website + lang + "/tours/?title="+ catalogpagesearch_title +"&destination=" + catalogpagesearch_destination + "&tourtype=" + catalogpagesearch_tourtypes + "&arrival=" + catalogpagesearch_arrival + "&departure=" + catalogpagesearch_departure + "&price="+catalogpagesearch_range;

	location.href = urlPath;
});


$(document).on("click", ".searchPopUp", function(){
	var boxtitle = $(this).attr("data-boxtitle");
	$(".theTitle").html(boxtitle);

	$(".theMessage").html("");
	var ajaxFile = "/loadsearchform";
	var lang = $("#lang").val();
	$.ajax({
		method: "POST",
		url: Config.ajax + ajaxFile,
		data: { lang:lang }
	}).done(function( msg ) {
		var obj = $.parseJSON(msg);
		if(obj.Success.Code==1){
			var html = obj.Success.form;
			$(".theMessage").html(html);
			
			$('.pop-dest').on('changed.bs.select', function (e) {
            	$(".pop-destination").val(e.target.value);
            });

            $('.pop-tour').on('changed.bs.select', function (e) {
            	$(".pop-tourtypes").val(e.target.value);
            });

			$('.selectpicker').selectpicker();
			$(".date").datepicker({
				format: 'dd/mm/yyyy',
				autoclose: true
			});
		}
	});
	$(".modal").modal("show");	
	return false;
});

var goto = function(x){
	location.href = x;
};

var changeLanguage = function(newLang, oldLang){
	var url = window.location.href;
	var find = "/"+oldLang+"/";
	var replace = "/"+newLang+"/";
	var replaced = url.replace(find, replace); 

	if(url.search(find)!="-1"){
		location.href = replaced;
	}else{
		location.href = Config.website+newLang+"/"+Config.mainClass;
	}
	return false;
};

var bookPriceCounter = function(){
	var MAIN_PRICE = parseFloat($("#bookprice").val()); 
	var bookadult = parseInt($("#bookadult").val()); 
	var bookchild = parseInt($("#bookchild").val()); 

	var ADULT_PRICE = MAIN_PRICE * bookadult;

	var SERVICE_PRICE = 0;
	$(".subserviceinput").each(function(){
		var p = $(this).val();
		var split = p.split(":");

		var pl = parseFloat(split[1]);
		pl = (pl*bookadult) + ((pl/2)*bookchild); 
		SERVICE_PRICE += pl;
	});


	var CHILD_PRICE = 0;
	$(".bookchildspair").each(function(){
		var val = parseInt($(this).val());
		if(val>3 && val<=12){
			// half price
			var halfPrice = parseFloat(MAIN_PRICE / 2);
			CHILD_PRICE += halfPrice;
		}
	});


	return ( ADULT_PRICE + SERVICE_PRICE + CHILD_PRICE );
};

$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip(); 

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

	$(document).on("change", "#choosepayment", function(){
		var val = $(this).val();
		$("#paymentMethod").val(val);
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


	$(document).on("click", ".checkbox-sub-input", function(){
		var total = parseFloat($(".total-price span").html());
		var bookid = $("#bookid").val();
		var bookprice = parseFloat($("#bookprice").val());
		var sub = $(this).attr("data-sub");
		var subservid = parseInt($(this).attr("data-subservid"));
		var serviceid = parseInt($(this).attr("data-serviceid"));
		var turn = $(this).attr("data-turn");
		var classname = $(this).attr("data-classname");
		var price = parseFloat($(this).attr("data-price"));
		var adults = parseInt($("#adults").val());

		var input = "<input type=\"hidden\" name=\"booksubservice[]\" class=\"subserviceinput serv"+serviceid+" subserv"+subservid+"\" value=\""+serviceid+":"+price+":"+subservid+"\" />";
		if(turn=="on"){
			$(this).attr("data-turn", "off");
			$(".total-price span").html( total-price );
			$("#bookForm .subserv"+subservid).remove();
		}else{
			if(classname=="single"){
				$("#"+sub + " .checkbox-sub-input").attr("data-turn", "off");
				$("#bookForm .serv"+serviceid).remove();
				$("#"+sub + " .checkbox-sub-input").removeClass("fa-toggle-on");
				$("#"+sub + " .checkbox-sub-input").addClass("fa-toggle-off");
			}
			$(this).attr("data-turn", "on");
			$("#bookForm").append(input);
		}

		$(this).toggleClass("fa-toggle-on fa-toggle-off");
		var p = 0;
		$('.checkbox-sub-input[data-turn="on"]').each(function(){
			p += parseFloat($(this).attr("data-price")); 
		});
		$(".total-price span").html( bookPriceCounter() );
		
	});

	$(document).on("click", ".bookNowButton", function(){
		$("#bookForm").submit();
	});


	$(document).on("click", ".subscribeToNewsletter", function(){
		var token = $(this).attr("data-token");
		var newsletterEmail = $("#newsletterEmail").val();
		var boxtitle = $(this).attr("data-boxtitle");
		var lang = $("#lang").val();
		
		$(".theTitle").html(boxtitle);
		$(".theMessage").html("");

		var ajaxFile = "/subscribeToNewsletter";
		$.ajax({
			method: "POST",
			url: Config.ajax + ajaxFile,
			data: { newsletterEmail:newsletterEmail, token:token, lang:lang }
		}).done(function( msg ) {
			var obj = $.parseJSON(msg);
			if(obj.Success.Code==1){
				var text = obj.Success.Text;
				$("#newsletterEmail").val('');
			}else{
				var text = obj.Error.Text;
			}
			$(".theMessage").html(text);
		});

		$(".modal").modal("show")
	})

	$(document).on("keyup mouseup", "#adults", function(){
		$("#bookadult").val( $("#adults").val() ); 

		$(".total-price span").html( bookPriceCounter() );
	});

	// Price Chnage count
	$(document).on("keyup mouseup", "#children", function(){
		var children = parseInt($("#children").val());
		var childageText = $("#children").attr("data-childageText");
		$("#bookchild").val(children); 	

		$(".childernsAges").html('');
		$("#bookForm .bookchildspair").remove(); 

		if(children){
			for (var i = 1; i <= children; i++) {
				var pair = "<input type=\"hidden\" name=\"bookchilds[]\" class=\"bookchildspair p"+i+"\" value=\"4\" />";
				$("#bookForm").append(pair);
				if(i==1){
					var input = "<hr style=\"width:100%; height: 1px; background-color: #555555; margin:20px 0px 10px 0px; clear: both\" />";
				}else{
					var input = "";
				}
				input += "<section class=\"form-group ChildAge\">";
				input += "<label class=\"col-2 col-form-label\">"+i+". "+childageText+"</label>";
				input += "<input type=\"number\" name=\"child[]\" data-pair=\"p"+i+"\" class=\"form-control\" max=\"12\" min=\"4\" value=\"4\" />";
				input += "</section>";

				$(".childernsAges").append(input);
			};
		}
		$(".total-price span").html( bookPriceCounter() );
	});

	// Price Chnage count
	$(document).on("keyup mouseup", ".ChildAge input[type='number']", function(){
		var val = parseInt($(this).val()); 
		var pair = $(this).attr("data-pair"); 
		if(val<=3 || val>=13){
			$(this).css({"background-color":"red", "color":"white"});
		}else{
			$(this).css({"background-color":"white", "color":"#555555"});
		}

		$("#bookForm ."+pair).val(val);
		$(".total-price span").html( bookPriceCounter() );
	});

	$(document).on("click", "#carousel-example-generic", function(e){
		var n = e.target.className;
		var a = $(".carousel-inner .active").attr("href");
		if(n=="carousel slide"){
			window.open(a,'_self');
		}
	});

	$(document).on("click", ".sliderSearchButton", function(e){
		var destination = $(".destinationSelect").val();
		var tourtypes = $(".advantureTypeSelect").val();
		var arrival = $(".datepickerArrival").val().replace(new RegExp("/", 'g'), "-");
		var departure = $(".datepickerDeparture").val().replace(new RegExp("/", 'g'), "-");

		var urlPath = Config.website + $("#lang").val() + "/tours/?destination=" + destination + "&tourtype=" + tourtypes + "&arrival=" + arrival + "&departure=" + departure;

		location.href = urlPath;
	});

	$(document).on("click", ".myaccount-signout", function(){
		var ajaxFile = "/signmeout";
		var lang = $("#lang").val();
		$.ajax({
			method: "POST",
			url: Config.ajax + ajaxFile,
			data: { lang:lang }
		}).done(function( msg ) {
			var obj = $.parseJSON(msg);
			if(obj.Success.Code==1){	
				location.href = obj.Success.GoToUrl;		
			}else{
				console.log(obj.Error.Text);
			}
		});
		return false;
	});

	$(document).on("click", ".sendmessage", function(){
		var form = $("#contactForm");
		var serialize = form.serialize();
		var ajaxFile = "/sendmessage";

		var lang = $("#lang").val();
		var plzWait = $(this).attr("data-plzwait");
		
		$(".contact-error-message").html(plzWait).fadeIn("slow");
		$.ajax({
			method: "POST",
			url: Config.ajax + ajaxFile,
			data: { serialize:serialize, lang:lang }
		}).done(function( msg ) {
			var obj = $.parseJSON(msg);
			if(obj.Success.Code==1){
				var text = obj.Success.Text;
				document.getElementById("contactForm").reset();	
			}else{
				var text = obj.Error.Text;
			}

			$(".contact-error-message").html(text);

			$('html, body').animate({
		        scrollTop: $("main .center .leftside .title").offset().top
		    }, 500);

		});	
	});

	$(document).on("click", ".updateProfile", function(){
		var form = $("#profileForm");
		var serialize = form.serialize();
		var ajaxFile = "/updateprofile";

		var lang = $("#lang").val();
		var plzWait = $(this).attr("data-plzwait");
		
		$(".profile-error-message").html(plzWait).fadeIn("slow");
		$.ajax({
			method: "POST",
			url: Config.ajax + ajaxFile,
			data: { serialize:serialize, lang:lang }
		}).done(function( msg ) {
			var obj = $.parseJSON(msg);
			if(obj.Success.Code==1){
				var text = obj.Success.Text;	
			}else{
				var text = obj.Error.Text;
			}

			$(".profile-error-message").html(text);

			$('html, body').animate({
		        scrollTop: $("main .center .title").offset().top
		    }, 500);

		});	
	});

	$(document).on("click", ".updatePasswordButton", function(){
		var form = $("#updatepassword");
		var serialize = form.serialize();
		var ajaxFile = "/updatecurrentpassword";

		var lang = $("#lang").val();
		var plzWait = $(this).attr("data-plzwait");
		
		$(".passwordupdate-error-message").html(plzWait).fadeIn("slow");
		$.ajax({
			method: "POST",
			url: Config.ajax + ajaxFile,
			data: { serialize:serialize, lang:lang }
		}).done(function( msg ) {
			var obj = $.parseJSON(msg);
			if(obj.Success.Code==1){
				var text = obj.Success.Text;	
				document.getElementById("updatepassword").reset();	
			}else{
				var text = obj.Error.Text;
			}

			$(".passwordupdate-error-message").html(text);

			$('html, body').animate({
		        scrollTop: $("main .center .title").offset().top
		    }, 500);

		});	
	});
	
});