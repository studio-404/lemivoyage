<?php
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php");
$l = new functions\l();
echo $data['headerModule']; 
echo $data['headertop']; 
$searchText = htmlspecialchars(strip_tags($data['searchText']));
?>

<main>
	<section class="centerWidth">
		<section class="row">
			<section class="col s12 m12 l12 leftSide">
				<section class="headerText">
					<div class="line"></div>
					<div class="title"><?=strip_tags($data['pageData']['description'])?></div>
				</section>
				<section class="mainText">
					<strong><?=$l->translate('searchword')?>: </strong><i><?=$searchText?></i>

					<div class="collection searchCollectionBox">
						<?php
						if(mb_strlen($searchText,'UTF-8')<=6){
							echo sprintf(
								'<a href="#!" class="collection-item">%s</a>',
								$l->translate('tooshortsearchkey')
							);
						}else if(count($data['searchResults']->output)){
							foreach ($data['searchResults']->output as $value) {
								$title = strip_output::index($value['page_title']);
								$url = "#!";
								switch ($value['page_type']) {
									case 'news':
											$titleUrl = str_replace(" ", "-", $title);
											$url = Config::WEBSITE.$_SESSION['LANG']."/news/".$value['page_slug']."/".$titleUrl;
											$searchType="News";
										break;
									case 'event':
											$titleUrl = str_replace(" ", "-", $title);
											$url = Config::WEBSITE.$_SESSION['LANG']."/event/".$value['page_slug']."/".$titleUrl;
											$searchType="Event";
										break;
									case 'internationalsupport':
											$titleUrl = str_replace(" ", "-", $title);
											$url = Config::WEBSITE.$_SESSION['LANG']."/international-support/".$value['page_slug']."/".$titleUrl;
											$searchType="International Support";
										break;
									case 'chapters':
											$url = Config::WEBSITE.$_SESSION['LANG']."/agreement#open".$value['page_slug'];
											$searchType="Chapters";
										break;
									case 'implementation':
											$url = Config::WEBSITE.$_SESSION['LANG']."/implimentation#open".$value['page_slug'];
											$searchType="Implimentation";
										break;	
									case 'strategic':
											$url = Config::WEBSITE.$_SESSION['LANG']."/implimentation#open".$value['page_slug'];
											$searchType="Strategic documents";
										break;	
									case 'legislation':
										$url = Config::WEBSITE.$_SESSION['LANG']."/legislation#open".$value['page_slug'];
											$searchType="Legislation";
										break;
									case 'adopedlegislation':
										$url = Config::WEBSITE.$_SESSION['LANG']."/legislation#open".$value['page_slug'];
											$searchType="Adoped legislation";
										break;									
									default:
										if($value['page_cid']!=0){
											$url = Config::WEBSITE.$_SESSION['LANG']."/dcfta-for-bussinness/".$value['page_slug'];
										}else{
											$url = Config::WEBSITE.$_SESSION['LANG']."/".$value['page_slug'];	
										}
										$searchType="Page";								
										break;
								}
								echo sprintf(
									'<a href="%s" class="collection-item">%s<span class="badge" style="font-family:roboto">%s</span></a>',
									$url, 
									strip_output::index($title),
									$searchType
								);	
							}							
						}else{
							echo sprintf(
								'<a href="#!" class="collection-item">%s</a>',
								$l->translate('nodatafound')
							);
						}
						?>					
					</div>	
				</section>		



			</section>

		</section>
	</section>	
</main>
<?=$data['footer']?>

</body>
</html>