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
			<section class="col s12 m6 l8 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=strip_output::index($data['pageData']['description'])?></div>
				</section>
				<section class="mainText">
					<?=strip_output::index($data['pageData']['text'])?>
				</section>
				
				<section class="noprint">
					<section class="headerText">
						<div class="line"></div>
						<div class="title"><?=$l->translate('chapters')?></div>
					</section>
					<?=$data['chapters']?>
				</section>
			</section>
			<section class="col s12 m6 l4 rightSide">
				<section class="justTitle"><?=$l->translate('stateagencies')?></section>
				<?=$data['stateagencies']?>
			</section>



		</section>
	</section>	
</main>

<?=$data['footer']?>
<script type="text/javascript" charset="utf-8">
	$('.mainText').css({"overflow":"hidden"});
    $('.mainText').readmore({
      moreLink: '<a href="#" class="readmoreLink"><?=$l->translate('readmore')?></a>',
      lessLink: '',
      collapsedHeight: 378
    });
  </script>
</body>
</html>