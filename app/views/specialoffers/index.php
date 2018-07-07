<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
require_once("app/functions/string.php"); 
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
		<section class="rowBox" style="margin: 0 0 40px 0">
			
			<?php foreach($data["selectSpecial"] as $special) :
			$href = sprintf(
					"%s%s/view/%s/?id=%d",
					Config::WEBSITE,
					$_SESSION["LANG"],
					str_replace(array(" ", "'"), "-", strip_tags($special["title"])),
					(int)$special["idx"]
			);
			$description = sprintf(
				"%s",
				functions\string::cutstatic(strip_tags($special["short_description"]), 70)
			);
			?>
			<section class="col-lg-6 leftside" style="margin-bottom: 30px">
				<section class="scaleBox">
				<section class="price"><?=(int)$special["price"]?> &euro;</section>
				<a href="<?=$href?>" style="background-image: url('<?=Config::WEBSITE.$_SESSION["LANG"]?>/image/loadimage?f=<?=Config::WEBSITE_.$special["photo"]?>&amp;w=680&amp;h=1200')" alt="<?=htmlentities($special["title"])?>"></a>
				<section class="description">
				<h3><?=functions\string::cutstatic(strip_tags($special["title"]), 25)?></h3>
				<p><?=$description?></p>
				</section>
				</section>
			</section>
		<?php endforeach; ?>


			<section class="clearer"></section>
		</section>
	</section>
</main>

<?=$data['footer']?>