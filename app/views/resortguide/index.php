<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
require_once("app/functions/request.php"); 
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
			<li><a href=""><?=(isset($data["resortguidesView"]["title"])) ? $data["resortguidesView"]["title"] : ""?></a></li>
		</ul>
	</section>
</section>

<main>
	<section class="center"> 
		<section class="title"><?=(isset($data["resortguidesView"]["title"])) ? $data["resortguidesView"]["title"] : ""?></section>
		<section class="row">
			<section class="col-lg-3 left">
				<section class="list-group">
					<?php 
						foreach($data["resortguides"] as $val) : 
						$active = (functions\request::index("GET","view") == $val["idx"]) ? " active" : "";
					?>
						<a href="<?=Config::WEBSITE.$_SESSION["LANG"]?>/resort-guide/?view=<?=$val["idx"]?>" class="list-group-item<?=$active?>">
							<i class="fa fa-map-marker" aria-hidden="true"></i> 
							<span><?=$val['title']?></span>
						</a>
					<?php endforeach; ?>
				  
				</section>
			</section>
			<section class="col-lg-9 right resort-guide-text">
				<?=strip_tags($data["resortguidesView"]["description"],"<h3><p><br><b><ul><li>")?>
				<button class="gotoResortSearch" onclick="goto('<?=$data["resortguidesView"]["url"]?>')">Book</button>

			</section>
		</section>
	</section>
</main>

<?=$data['footer']?>