<?php 
require_once("app/functions/l.php"); 
require_once("app/functions/string.php"); 
require_once("app/functions/strip_output.php"); 
$l = new functions\l(); 
$string = new functions\string(); 
echo $data['headerModule']; 
echo $data['headertop']; 
?>


<section class="myslider">
   <section id="carousel-example-generic" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
      <?php 
      if($data["slider"]["count"]>0){
         for ($x=0; $x<$data["slider"]["count"]; $x++) {
            $act = ($x==0) ? " class='active'" : "";
            printf(
               "<li data-target=\"#carousel-example-generic\" data-slide-to=\"%d\"%s></li>",
               $x,
               $act
            );
         }
      }
      ?>
     </ol>

    <section class="carousel-inner" role="listbox">
       <?=$data["slider"]["list"]?>
    </section>

    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
       <span class="fa fa-chevron-left" aria-hidden="true"></span>    
    </a>

     <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
       <span class="fa fa-chevron-right" aria-hidden="true"></span>
      </a>
   </section>

   <section class="searchBox">
      <section class="quote" title="<?=htmlentities(strip_tags($data["slogan"]["description"]))?>"><?=$string->cut(strip_tags($data["slogan"]["description"]), 110)?></section>
      <section class="search">
         <input type="hidden" class="destinationSelect" value="" />
         <select class="selectpicker dest" data-live-search="true">
           <option value=""><?=$l->translate("destination")?></option>
           <?=$data["destinationsOptions"]?>
         </select>

         <input type="hidden" class="advantureTypeSelect" value="" />
         <select class="selectpicker adv" data-live-search="true">
           <option value=""><?=$l->translate("advantureType")?></option>
           <?=$data["tourtypesOptions"]?>
         </select>

         <section class="dateBox">
            <input type="text" class="form-control date datepickerArrival" value="" placeholder="<?=$l->translate("arrival")?>" readonly="readonly" />
         </section>
         <section class="dateBox">
            <input type="text" class="form-control date datepickerDeparture" value="" placeholder="<?=$l->translate("departure")?>" readonly="readonly" />
         </section>
             
         <script type="text/javascript">
            $('.dest').on('changed.bs.select', function (e) {
                $(".destinationSelect").val(e.target.value);
            });

            $('.adv').on('changed.bs.select', function (e) {
                $(".advantureTypeSelect").val(e.target.value);
            });

            // $(".date").datepicker({
            //    format: 'dd/mm/yyyy', 
            //    autoclose: true
            // });

            var currentDay = new Date();
            currentDay.setDate(currentDay.getDate()+<?=Config::DATEPICKER_DAYS?>);
            var nextDay = currentDay.getDate()+"/"+(currentDay.getMonth()+1)+"/"+currentDay.getFullYear();

            $(".date").datepicker({
              format: 'dd/mm/yyyy', 
              startDate:nextDay,
              autoclose: true
            });

         </script>

         <section class="dateBox button">
            <input type="button" class="form-control sliderSearchButton" value="<?=$l->translate("search")?>" />
         </section>

      </section>
   </section>

</section>


<main>
   <section class="center">
      <section class="title"><?=$l->translate("specialoffers")?></section>

      <section class="rowBox">    
        <?=$data["selectSpecial"]?>
      </section>
      
      <section class="clearer"></section>
      <section class="title"><?=$l->translate("toptravels")?></section>
      <section class="topTravelsSlider">
         <section class="owl-carousel">
           <?=$data["toptravels"]?>           
         </section>
      </section>
      <script type="text/javascript">
      $(".owl-carousel").owlCarousel({
          loop:true,
          margin:10,
          margin: 40,
          nav: true,
          navText:["",""],
          responsive:{
              0:{
                  items:1                 
              },
              600:{
                  items:2
              },
              1000:{
                  items:3
              }
          }
      });
      </script>

      <section class="clearer"></section>
      <section class="title"><?=$l->translate("ourdestinations")?></section>


      <section class="destination">
         <section class="col-md-8 leftside">
          <?php 
          // http://lemi.404.ge/fr/image/loadimage?f=http://lemi.404.ge/public/filemanager/1.jpg&w=480&h=400
          ?>
            <object id="svgContainer" width="100%" type="image/svg+xml" data="<?=Config::PUBLIC_FOLDER?>img/georgiaSouthOssetiaHigh.svg"></object>
            
            <script src="<?=Config::PUBLIC_FOLDER?>js/web/svgMap.min.js" type="text/javascript" charset="utf-8"></script>
            <script type="text/javascript">
               var texts = [ <?php foreach($data["destinations"] as $dest) : 
               $photo = (isset($dest["photo"]) && $dest["photo"]!="") ? "<img src=\"".Config::WEBSITE.$_SESSION["LANG"]."/image/loadimage?f=".Config::WEBSITE_.$dest["photo"]."&w=300&h=200"."\" alt=\"".strip_tags($dest['title'])."\" width=\"100%\" style=\"margin-bottom: 10px\" />" : "";
               ?>
                     [<?=json_encode(strip_tags($dest['title']))?>, <?=json_encode(strip_tags($dest['description'], "<p><a><strong><img>").$photo)?>, "<?=Config::WEBSITE.$_SESSION['LANG'].'/tours/?destination='.(int)$dest['idx']?>"],
                   <?php endforeach; ?>];
               loadTheSvg(texts);      
            </script>
         </section>
         <section class="col-md-4 rightside">
            <section class="region-description">
               <h3 class="r-title"><?=$l->translate("georgia")?></h3>
               <section class="r-text text">
                  <p><?=strip_tags($l->translate("georgiaText"))?></p>
               </section>
               <section class="link">
                  <a href="<?=Config::WEBSITE.$_SESSION['LANG']?>/tours" class="r-link"><i class="fa fa-list" aria-hidden="true"></i> <?=$l->translate("tourlist")?></a>
               </section>
            </section>
         </section>
         <section class="clearer"></section>
      </section>

   </section>
</main>
<?php if($data["emailComfirmed"]==true) : ?>
<script type="text/javascript">
  $(document).ready(function(){
    $(".theTitle").html("<?=$l->translate("message")?>");
    $(".theMessage").html("<?=$l->translate("emailconfirmed")?>");
    $(".modal").modal("show");
    setTimeout(function(){
      location.href = "/";
    }, 1500);
  });
</script>
<?php endif; ?>

<?=$data['footer']?>