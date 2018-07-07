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
			<section class="col s12 m6 l3 leftSide noprint">
				<section class="leftNavigation">
					<section class="yellowBG"></section>
					<section class="nav">
						<?=$data['leftnav']?>
					</section>
				</section>

				<section class="justTitle"><?=$l->translate('linksandpublications')?></section>
				<?=$data['usefulllink']?>


				<section class="files-no-bg">
					<?=$data['publications']?>
				</section>
			</section>

			<section class="col s12 m6 l9 rightSite">
				<section class="justTitle"><?=strip_output::index($data['pageData2']['title'])?></section>
				<section class="justSubTitle"><?=strip_output::index($data['pageData2']['description'])?></section>
				<section class="justDate">published: <?=@date("d M Y", (int)$data['pageData2']['date'])?></section>

				<section class="mainText">
					<?=strip_output::index(@$data['pageData2']['text'])?>					
				</section>
			</section>
		</section>
	</section>	
</main>


<?=$data['footer']?>

</body>
</html>