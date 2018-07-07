<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/strip_output.php"); 
$l = new functions\l(); 
echo $data['headerModule']; 
echo $data['headertop']; 

$DB = new Database("georgia", array(
   "method"=>"selectById", 
   "idx"=>(int)$data['story']["region"],
   "lang"=>$_SESSION['LANG']
));
$region = $DB->getter();

$DB2 = new Database("georgia", array(
   "method"=>"selectById", 
   "idx"=>(int)$data['story']["city"],
   "lang"=>$_SESSION['LANG']
));
$city = $DB2->getter();
?>


<section class="preloader">
   <div class="loader">
      <div class="dot dot1"></div>
      <div class="dot dot2"></div>
      <div class="dot dot3"></div>
      <div class="dot dot4"></div>
   </div>
</section>
<main class="stories-single">
   <a href="/<?=$_SESSION['LANG']?>/home" class="main_logo-link">
   <img src="<?=Config::PUBLIC_FOLDER?>img/web/logo.png" alt="logo" class="header_logo"/></a>
   <a href="javascript:void(0)" class="stories-single_btn-back" onclick="goBack();"><?=$l->translate('back')?></a>
   <article class="stories-single-item">
      <h1 class="stories-single_title"><?=$data['story']["name"]?></h1>
      <p class="stories-single_title"><?=$l->translate('region')?>: <span><?=$region['name']?></span></p>
      <p class="stories-single_title"><?=$l->translate('city')?>: <span><?=$city['name']?></span></p>
      <p class="stories-single_title"><?=$l->translate('age')?>: <span><?=$data['story']["age"]?></span></p>

      <div class="sliderBxo">
      <ul class="rslides" style="height: 440px; background-color: #000000">        
        <?php 
         foreach ($data['allimage'] as $im) {
            $image = sprintf(
               "%s%s/image/loadimage?f=%s%s&w=670&h=521",
               Config::WEBSITE,
               $_SESSION['LANG'],
               Config::WEBSITE_,
               $im['path']
            );
            echo '<li style="background-image: url(\''.Config::WEBSITE_. $im['path'].'\'); background-repeat: no-repeat; background-size: contain; background-position: center center; height: 440px"></li>'; 
         }
         ?>
      </ul>
      </div>

      <div class="stories-single_text">
         <?=$data['story']["about"]?><br />
         <div class="fb-share-button" data-href="<?=$data["actual_link"]?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($data["actual_link"])?>&amp;id=<?=$data["actual_link"]?>&scrape=true">Share</a></div>
      </div>
   </article>
</main>

<?=$data['footer']?>