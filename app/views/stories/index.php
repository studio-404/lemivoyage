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
<main class="stories">
   <a href="./" class="main_logo-link"><img src="<?=Config::PUBLIC_FOLDER?>img/web/logo.png" alt="logo" class="header_logo"/></a>
   <div class="srories-header">
      <div class="stories-controls">
         <a href="<?=Config::WEBSITE.$_SESSION['LANG']?>/stories-on-map" class="switch-map"><?=$l->translate('gotomap')?> </a>
         <div class="stories-filters">
            <input type="hidden" name="language" id="language" value="<?=$_SESSION['LANG']?>" />
            <span class="stories-filters-text"> <?=$l->translate('filter')?>:</span>
            <div class="select-wrap">
               <select id="filter-regions">
                  <option value=""><?=$l->translate('regions')?></option>
                  <?php
                  foreach ($data['regions'] as $val) {
                     echo sprintf(
                        "<option value=\"%s\">%s</option>", 
                        $val['idx'], 
                        $val['name']
                     );
                  }
                  ?>
               </select>
            </div>
            <div class="select-wrap">
               <select id="filter-cities">
                  <option disabled="disabled" selected="selected"><?=$l->translate('city')?></option>
               </select>
            </div>
            <div class="select-wrap">
               <select id="filter-age">
                  <option value=""><?=$l->translate('age')?></option>
                  <option value="0-16">0-16</option>
                  <option value="17-29">17-29</option>
                  <option value="30-44">30-44</option>
                  <option value="45-70">45-70</option>
                  <option value="70-*">70-*</option>
               </select>
            </div>
            <div class="select-wrap">
               <select id="filter-gender">
                  <option value=""><?=$l->translate('gender')?> </option>
                  <option value="male"><?=$l->translate('male')?></option>
                  <option value="female"><?=$l->translate('female')?></option>
               </select>
            </div>
         </div>
      </div>
      <div class="stories-count">
         <h2 class="stories-count_title"><?=$data['counted']?><span class="stories-count_text"><?=$l->translate('stories')?></span></h2>
         <h2 class="stories-count_title"><?=$data['countregions']?><span class="stories-count_text"><?=$l->translate('regions')?> </span></h2>
      </div>
   </div>
   <div class="stories-container">
      <?=$data['products']?>
   </div>

   <form action="javascript:void(0)" method="post" class="loadForm">
      <input type="hidden" name="loadLang" id="loadLang" value="<?=$_SESSION['LANG']?>" />
      <input type="hidden" name="counted_items" id="counted_items" value="6" />
      <input type="hidden" name="loadFrom" id="loadFrom" value="0" />
      <input type="hidden" name="loadTo" id="loadTo" value="6" />
      <input type="hidden" name="loadRegion" id="loadRegion" value="" />
      <input type="hidden" name="loadCity" id="loadCity" value="" />
      <input type="hidden" name="loadAge" id="loadAge" value="" />
      <input type="hidden" name="loadGender" id="loadGender" value="" />
   </form>
</main>

<?=$data['footer']?>
<script type="text/javascript">
   var scroll = true;
   $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
          if(scroll){
               scroll = false;
               var counted_items = parseInt($("#counted_items").val());
               var loadLang = $("#loadLang").val();
               var loadRegion = $("#loadRegion").val();
               var loadCity = $("#loadCity").val();
               var loadAge = $("#loadAge").val();
               var loadGender = $("#loadGender").val();

               var item = "";
               var ajaxFile = "/loadStory";
               $.ajax({
                  method: "POST",
                  url: Config.ajax + ajaxFile,
                  data: { loadFrom: counted_items, loadTo:6, loadRegion:loadRegion, loadCity:loadCity, loadAge:loadAge, loadGender:loadGender, lang:loadLang }
               }).done(function( msg ) {
                  var obj = $.parseJSON(msg);
                  if(obj.Success.Code==1){
                     var html = obj.Success.Html;
                     $("#counted_items").val(counted_items + 6);
                     $(".stories-container").append(html);
                  }
                  scroll = true;
               });               
          }
      }
   });
</script>