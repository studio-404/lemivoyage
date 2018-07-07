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

					<br />

<?php 
if($_SESSION['LANG']=="ge"):
?>
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="790px" height="500px" viewBox="0 0 790 500" enable-background="new 0 0 790 500" xml:space="preserve">

	 <rect x="177.816" y="57.531" fill="#F3F3F3" width="434.366" height="64.286" rx="5" ry="5" />
	 <text transform="matrix(1 0 0 1 305.7817 81.2817)">
		<tspan x="0" y="-5" fill="#363636" font-size="12">ევრო ინტეგრაციის კომისია</tspan>
		<tspan x="-113.766" y="17" fill="#363636" font-size="10">(</tspan>
		<tspan x="-110.436" y="17" fill="#363636" font-size="10">კომისიას თავჯდომარეობს საქართველოს პრემიერ</tspan>
		<tspan x="162.328" y="17" fill="#363636" font-size="10">-</tspan>
		<tspan x="165.658" y="17" fill="#363636" font-size="10">მინისტრი</tspan>
		<tspan x="218.265" y="17" fill="#363636" font-size="10">,</tspan>
		<tspan x="220.765" y="17" fill="#363636" font-size="10"> ხოლო წევრი</tspan>
		<tspan x="-74.93" y="29" fill="#363636" font-size="10">სამინისტროები წარმოდგენილები არიან მინისტრის დონეზე</tspan>
		<tspan x="250.036" y="29" fill="#363636" font-size="10">)</tspan>
	</text>

	<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="121.816" x2="395" y2="156.97"/>

	<rect x="58.775" y="156.97" fill="#F3F3F3" width="672.449" height="88.775" rx="5" ry="5"/>
	<text transform="matrix(1 0 0 1 90.3535 173.7661)">
		<tspan x="0" y="0" font-size="12">DCFTA-</tspan>
		<tspan x="43.336" y="0" font-size="12">ს განხორციელების ქვე კომისია</tspan>
		<tspan x="247.834" y="0" font-size="12">,</tspan>
		<tspan x="250.834" y="0" font-size="12">საქართველოს ეკონომიკისა და მდგრადი განვითარების</tspan>
		<tspan x="194.877" y="14.4" font-size="12">სამინისტროს ხელმძღვანელობით</tspan>
		<tspan x="-23.574" y="38.4" font-size="10">(</tspan>
		<tspan x="-20.244" y="38.4" font-size="10">ქვე</tspan>
		<tspan x="-2.475" y="38.4" font-size="10">-</tspan>
		<tspan x="0.855" y="38.4" font-size="10">კომისიას თავჯდომარეობს საქართველოს ეკონომიკისა და მდგრადი განვითარების სამინისტრო</tspan>
		<tspan x="514.127" y="38.4" font-size="10">,</tspan>
		<tspan x="516.627" y="38.4" font-size="10"> მინისტრის ერთერთი</tspan>
		<tspan x="-19.421" y="50.4" font-size="10">მოადგილის მეშვეობით</tspan>
		<tspan x="106.155" y="50.4" font-size="10">,</tspan>
		<tspan x="108.655" y="50.4" font-size="10"> ხოლო წევრი სამინისტროები და სხვა შესაბამის სახელმწიფო უწყებები წარმოდგენილები არიან </tspan>
		<tspan x="218.213" y="62.4" font-size="10">მინისტრის მოადგილის დონეზე</tspan>
		<tspan x="387.75" y="62.4" font-size="10">)</tspan>
	</text>
	

	<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="245.746" x2="395" y2="275.898"/>
	<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="275.898" x2="70.344" y2="275.898"/>
	<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="719.656" y1="275.898" x2="395" y2="275.898"/>

	<rect x="70.344" y="295.001" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5" onmouseenter="showRect('.r1')" onmouseleave="hideRect('.r1')" />
	<text transform="matrix(1 0 0 1 90.585 318.2266)" onmouseenter="showRect('.r1')">
		<tspan x="0" y="0" font-size="12">გარემოს დაცვის</tspan>
		<tspan x="12.703" y="14.4" font-size="12">სამინისტრო</tspan>
	</text>

	<rect x="237.594" y="295.001" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5" onmouseenter="showRect('.r2')" onmouseleave="hideRect('.r2')"/>
	<text transform="matrix(1 0 0 1 245.7437 325.4258)" font-size="12" onmouseenter="showRect('.r2')">სოფლის მეურნეობა</text>

	<rect x="404.781" y="295.001" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5" />
	<text transform="matrix(1 0 0 1 439.5684 325.4258)" font-size="12">ენერგეტიკა</text>

	<rect x="573.406" y="295.001" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5" />
	<text transform="matrix(1 0 0 1 613.0596 318.2256)">
		<tspan x="0" y="0" font-size="12">ფინანსთა </tspan>
		<tspan x="-6.709" y="14.4" font-size="12">სამინისტრო</tspan>
	</text>
	

	<rect x="70.344" y="363.501" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5"/>
	<text transform="matrix(1 0 0 1 105.4971 394.9258)" font-size="12">საქპატენტი</text>

	<rect x="237.593" y="363.602" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5"/>
	<text transform="matrix(1 0 0 1 267.8037 386.8252)">
		<tspan x="0" y="0" font-size="12">შესყიდვების </tspan>
		<tspan x="11.625" y="14.4" font-size="12">სააგენტო</tspan>
	</text>

	<rect x="404.781" y="363.602" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5"/>
	<text transform="matrix(1 0 0 1 430.334 386.8262)">
		<tspan x="0" y="0" font-size="12">კონკურენციის </tspan>
		<tspan x="16.283" y="14.4" font-size="12">სააგენტო</tspan>
	</text>

	<rect x="573.406" y="364.001" fill="#F3F3F3" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" width="146.25" height="53.449" rx="5" ry="5"/>
	<text transform="matrix(1 0 0 1 594.918 387.2256)">
		<tspan x="0" y="0" font-size="12">კომუნიკაციების</tspan>
		<tspan x="25.266" y="14.4" font-size="12">კომისია</tspan>
	</text>
	<!-- Hidden Rects START -->
	<rect x="65.336" y="355.5" fill="#FFCD00" width="360.224" height="137.73" class="r1 shadow" style="display:none" rx="5" ry="5" />
	<text transform="matrix(1 0 0 1 184.019 384.4668)" class="r1" style="display:none">
		<tspan x="0" y="0" font-size="12" stroke-width="1" stroke="#000000">ზურაბ ზურაშვილი</tspan>
		<tspan x="-109.137" y="28.8" font-size="12">საერთაშორისო ურთიერთობებისა და ევროკავშირის </tspan>
		<tspan x="-56.713" y="43.2" font-size="12">სამართლის სამმართველოს უფროსი</tspan>
		<tspan x="-39.568" y="72" font-size="12">სურსათის ეროვნული სააგენტო</tspan>
		<tspan x="-18.788" y="86.4" font-size="12">ტელ</tspan>
		<tspan x="10.813" y="86.4" font-size="12">/</tspan>
		<tspan x="14.147" y="86.4" font-size="12">ოფისი</tspan>
		<tspan x="56.722" y="86.4" font-size="12">: </tspan>
		<tspan x="63.056" y="86.4" font-size="12">+995 2919167</tspan>
	</text>
	
	<rect x="140.336" y="355.5" fill="#FFCD00" width="360.224" height="137.73" class="r2 shadow" style="display:none" rx="5" ry="5"/>
	<text transform="matrix(1 0 0 1 259.019 384.4668)" class="r2" style="display:none">
		<tspan x="0" y="0" font-size="12" stroke-width="1" stroke="#000000">ავთო ხუციშვილი</tspan>
		<tspan x="-109.137" y="28.8" font-size="12">საერთაშორისო ურთიერთობებისა და ევროკავშირის </tspan>
		<tspan x="-56.713" y="43.2" font-size="12">სამართლის სამმართველოს უფროსი</tspan>
		<tspan x="-39.568" y="72" font-size="12">სურსათის ეროვნული სააგენტო</tspan>
		<tspan x="-18.788" y="86.4" font-size="12">ტელ</tspan>
		<tspan x="10.813" y="86.4" font-size="12">/</tspan>
		<tspan x="14.147" y="86.4" font-size="12">ოფისი</tspan>
		<tspan x="56.722" y="86.4" font-size="12">: </tspan>
		<tspan x="63.056" y="86.4" font-size="12">+995 2919167</tspan>
	</text>
</svg>
	<div style="clear:both"></div>

	<section class="headerText">
		<div class="line"></div>
		<div class="title"><?=$l->translate('dcftacoordination')?></div>
	</section>
	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="790px" height="500px" viewBox="0 0 790 500" enable-background="new 0 0 790 500" xml:space="preserve">
	
		<rect x="102.143" y="24.643" fill="#F3F3F3" width="585.714" height="92.857" rx="5" ry="5" />
		<text transform="matrix(1 0 0 1 241.5752 43.4795)">
			<tspan x="0" y="0" fill="#363636" font-size="12">საქართველო ევროკავშირის ასოცირების საბჭო</tspan>
			<tspan x="-44.729" y="26.4" fill="#363636" font-size="10">(</tspan>
			<tspan x="-41.399" y="26.4" fill="#363636" font-size="10">საბჭოს მუშაობაში მონაწილეობს საქართველოს პრემიერ</tspan>
			<tspan x="265.085" y="26.4" fill="#363636" font-size="10">-</tspan>
			<tspan x="268.415" y="26.4" fill="#363636" font-size="10">მინისტი</tspan>
			<tspan x="312.521" y="26.4" fill="#363636" font-size="10">,</tspan>
			<tspan x="315.021" y="26.4" fill="#363636" font-size="10"> ხოლო</tspan>
			<tspan x="-89.266" y="38.4" fill="#363636" font-size="10">ევროკავშირის მხრიდან ევროკავშირის უმაღლესი წარმომადგენლები</tspan>
			<tspan x="282.609" y="38.4" fill="#363636" font-size="10">,</tspan>
			<tspan x="285.109" y="38.4" fill="#363636" font-size="10"> საბჭო წარმოადგენს</tspan>
			<tspan x="-93.133" y="50.4" fill="#363636" font-size="10">უმაღლეს ორგანოს რომელიც ზედამხედველობს ასოცირების შეთანხმების განხორციელებას</tspan>
			<tspan x="107.414" y="62.4" fill="#363636" font-size="10">მხარეებს შორის</tspan>
			<tspan x="196.105" y="62.4" fill="#363636" font-size="10">)</tspan>
		</text>
		
		<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="117.5" x2="395" y2="149.163"/>


		<rect x="79.286" y="149.163" fill="#F3F3F3" width="631.429" height="104.082" rx="5" ry="5"/>
		<text transform="matrix(1 0 0 1 148.8652 168.5063)">
			<tspan x="0" y="0" font-size="12">საქართველოსა და ევროკავშირის ვაჭრობის საკითხებზე მომუშავე კომიტეტი</tspan>
			<tspan x="-33.949" y="28.8" font-size="12">(</tspan>
			<tspan x="-29.953" y="28.8" font-size="12">საქართველოს მხრიდან კომიტეტის თანათავჯდომარეა საქართველოს ეკონომიკისა და</tspan>
			<tspan x="-46.313" y="43.2" font-size="12">მდგრადი განვითარების სამინისტროს წარმომადგენელი </tspan>
			<tspan x="321.029" y="43.2" font-size="12">(</tspan>
			<tspan x="325.025" y="43.2" font-size="12">მინისტრის მოადგილის დონეზე</tspan>
			<tspan x="528.469" y="43.2" font-size="12">),</tspan>
			<tspan x="535.465" y="43.2" font-size="12"> </tspan>
			<tspan x="-63.255" y="57.6" font-size="12">ხოლო წევრები არიან შესაბამისი უწყებების წარმომადგენლები საქართველოდან და შესაბამისი</tspan>
			<tspan x="98.994" y="72" font-size="12">სფეროს ექსპერტები ევროკავშირის მხრიდან</tspan>
			<tspan x="389.279" y="72" font-size="12">)</tspan>
		</text>

		<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="253.245" x2="395" y2="288.143"/>
		<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="288.143" x2="144.787" y2="288.143"/>
		<line fill="none" stroke="#F3F3F3" stroke-width="3" stroke-miterlimit="10" x1="395" y1="288.143" x2="645.214" y2="288.143"/>

		<rect x="144.787" y="308.083" fill="#F3F3F3" width="238.213" height="55.334" rx="5" ry="5"/>
		<text transform="matrix(1 0 0 1 160.7417 332.25)">
			<tspan x="0" y="0" font-size="10">ვაჭრობისა და მდგრადი განვითარების</tspan>
			<tspan x="66.223" y="12" font-size="10">ქვე კომიტეტი</tspan>
		</text>

		<rect x="407.001" y="308.083" fill="#F3F3F3" width="238.213" height="55.334" rx="5" ry="5"/>
		<text transform="matrix(1 0 0 1 436.2031 338.833)" font-size="10">საბაჟო საკითხების ქვე კომიტეტი</text>

		<rect x="144.787" y="379.417" fill="#F3F3F3" width="238.213" height="55.334" rx="5" ry="5"/>
		<text transform="matrix(1 0 0 1 167.1699 403.584)">
			<tspan x="0" y="0" font-size="10">სანიტარული და ფოტოსანიტარული </tspan>
			<tspan x="35.903" y="12" font-size="10">ზომების ქვე კომიტეტი</tspan>
		</text>

		<rect x="407.001" y="379.417" fill="#F3F3F3" width="238.213" height="55.334" rx="5" ry="5"/>
		<text transform="matrix(1 0 0 1 451.1855 404.168)">
			<tspan x="0" y="0" font-size="10">გეოგრაფიული აღნიშვნების</tspan>
			<tspan x="37.993" y="12" font-size="10">ქვე კომიტეტი</tspan>
		</text>



	 </svg>
<?php endif; ?>
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
<script>
	var showRect = function(id){
		$(id).fadeIn();
	};
	var hideRect = function(id){
		$(id).fadeOut();
	};
</script>
</body>
</html>