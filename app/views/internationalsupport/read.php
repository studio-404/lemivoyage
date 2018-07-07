<?php
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
$l = new functions\l();
echo $data['headerModule']; 
echo $data['headertop']; 
?>
<main>
	<section class="centerWidth">
		<section class="row">
			<section class="col s12 m12 l12 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=strip_tags($data['pageData']['description'])?></div>
				</section>

				<section class="marginminus10 marginTop40">
						
						<?php
						$photos = new Database("photos",array(
							"method"=>"selectByParent", 
							"idx"=>(int)$data['moduleData']['idx'],  
							"lang"=>htmlspecialchars($_SESSION['LANG']),  
							"type"=>htmlspecialchars($data['moduleData']['type'])
						));
						?>

						<section class="mainText">
							<?php 
							if($photos->getter() && isset($_SESSION['LANG'])){
								$pic = $photos->getter();
								$image = Config::WEBSITE.$_SESSION['LANG']."/image/loadimage?f=".Config::WEBSITE_.$pic[0]['path']."&w=340&h=71";
								echo '<img src="'.htmlspecialchars($image).'" width="350" alt="" />';
								echo '<p class="marginTop40"></p>';
							}
							?>						
							<p><strong><?=strip_output::index($data['moduleData']['title'])?></strong></p>
							<?=strip_output::index($data['moduleData']['description'])?>

							<p class="linkWithIcon marginTop40">
								<a href="<?=$data['moduleData']['url']?>" target="_blank">
									<img src="<?=Config::PUBLIC_FOLDER?>img/icon-link.png" alt="" />
									<span><?=strip_output::index($data['moduleData']['url'])?></span>
								</a>
							</p>
						</section>
						
						<section class="clearer"></section>
						
						<section class="marginminus10 marginTop40">
							<p class="marginTop40">&nbsp;</p>
							
							<?=$data['miniinternationalsupport']?>

						</section>
					
				</section>
			</section>
		</section>
	</section>	
</main>

<?=$data['footer']?>
</body>
</html>