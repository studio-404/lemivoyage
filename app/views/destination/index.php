<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
require_once("app/functions/string.php"); 
require_once("app/functions/tours.php"); 
$l = new functions\l(); 
$tours = new functions\tours(); 
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

		<section class="row">



			<?php foreach($data["destinations"] as $val) : 
			$counted = $tours->countToursByDestinations(array(
				"numberx"=>$val["idx"]
			));
			?>
			<section class="col-lg-4 dest-item" title="<?=htmlentities($val["title"])?>">
				<section class="image" style="background-image: url('<?=Config::WEBSITE_.$val["photo"]?>')"></section>
				<section class="dest-description">
					<section class="header">
						<section class="dest-title"><i class="fa fa-map-marker" aria-hidden="true"></i> <?=functions\string::cutstatic($val["title"], 25)?></section>
						<section class="dest-count"><span><?=$counted?></span> Tours</section>
					</section>
					<section class="dest-text">
						<p><?=functions\string::cutstatic(strip_tags($val["description"]), 220)?></p>
					</section>

					<section class="dest-link">
						<a href="<?=Config::WEBSITE.$_SESSION["LANG"]?>/tours/?destination=<?=$val["idx"]?>">View All Tours</a>
					</section>
				</section>
			</section>
			<?php endforeach; ?>
			

		</section>
	</section>

</main>
<section class="clearer"></section>

<?=$data['footer']?>