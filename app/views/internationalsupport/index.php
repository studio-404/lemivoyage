<?php
require_once("app/functions/l.php"); 
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
					<?=$data['internationalsupport']?>					
				</section>
			</section>
		</section>
	</section>	
</main>

<?=$data['footer']?>
</body>
</html>