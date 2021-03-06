<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
$l = new functions\l(); 
echo $data['headerModule']; 
echo $data['headertop']; 
?>


<section class="preloader">
   <div class="loader">
      <div class="dot dot1"></div>
      <div class="dot dot2"></div>
      <div class="dot dot3"></div>
      <div class="dot dot4"></div>
   </div>
</section>
<main class="what-we-do">
   <a href="./" class="main_logo-link"><img src="<?=Config::PUBLIC_FOLDER?>img/web/logo.png" alt="logo" class="header_logo"/></a>
   <h1 class="title"><?=strip_tags($data['pageData']['title'])?></h1>
	<article class="what-we-do_item">
	<p class="what-we-do_text"><?=strip_tags($data['pageData']['description'])?></p>
	</article>
	<article class="what-we-do_item">
	<p class="what-we-do_text"><?=strip_tags($data['pageData']['text'])?></p>
	</article>
</main>

<?=$data['footer']?>