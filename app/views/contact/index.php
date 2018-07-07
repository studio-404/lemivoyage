<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
$l = new functions\l(); 
echo $data['headerModule']; 
echo $data['headertop']; 

$photo = (isset($data["pageData"]["photo"])) ? Config::WEBSITE_.$data["pageData"]["photo"] : "";
?>

<section class="breadcrups" style="background-image: url('<?=$photo?>')">
	<section class="content">
		<h3><?=(isset($data["pageData"]["title"])) ? $data["pageData"]["title"] : ""?></h3>
		<ul>
			<li><a href="<?=Config::WEBSITE.$_SESSION["LANG"]."/".Config::MAIN_CLASS?>"><?=$l->translate("home")?></a></li>
			<li><a href=""><?=(isset($data["pageData"]["title"])) ? $data["pageData"]["title"] : ""?></a></li>
		</ul>
	</section>
</section>

<main>
	<section class="center">
		<section class="title"><?=(isset($data["pageData"]["title"])) ? $data["pageData"]["title"] : ""?></section>

		<section class="col-lg-9 leftside">
			<section class="map" id="map"></section>

			<section class="title" style="text-align: left"><?=$l->translate("sendusmessage")?></section>
			<form action="javascript:void(0)" method="get" class="contactForm" id="contactForm" style="margin:0">
				<section class="alert alert-warning contact-error-message" style="display: none"></section>
				<div class="input-group">
					<input type="text" class="form-control" autocomplete="off" name="firstname" placeholder="Nom et Prénom" />
				</div>
				<div class="input-group">
					<input type="text" class="form-control" autocomplete="off" name="email" placeholder="<?=$l->translate("email")?>" />
				</div>
				<div class="input-group">
					<input type="text" class="form-control" autocomplete="off" name="subject" placeholder="Objet" />
				</div>
				<div class="input-group">
					<textarea name="message" name="massage" autocomplete="off" placeholder="<?=$l->translate("message")?>"></textarea>
				</div>
				<button class="sendmessage" data-plzwait="<?=htmlentities($l->translate("plzwait"))?>"><?=$l->translate("send")?></button>
			</form>
		</section>

		<section class="col-lg-3 rightside">
			<section class="contact-info">
				<h3><?=$l->translate("contactinfo")?></h3>
				<?=$data["contactinfo"]?>
			</section>
		</section>
	</section>
</main>

<section class="clearer"></section>

<script type="text/javascript">
var map;
function initMap() {
	var mapOptions = {
        zoom: 14,
        center: new google.maps.LatLng(<?=strip_tags($data["contactMap"])?>),
        styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
    };
	map = new google.maps.Map(document.getElementById('map'), mapOptions);
	var marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?=strip_tags($data["contactMap"])?>), 
        map: map,
        animation: google.maps.Animation.DROP,
        title: 'Snazzy!',
        icon: '<?=Config::PUBLIC_FOLDER?>img/marker-yellow.png'
    });
}
</script>
<!-- https://console.developers.google.com -->
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuNVK1o6mUkHGOO44eULUbWzLnkXDkUW4&amp;callback=initMap" type="text/javascript"></script>

<?=$data['footer']?>
