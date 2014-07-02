<?php


$content = file_get_contents("avril.txt");
$content=preg_replace('/\s\s+/', '', $content); 
$chaine = utf8_decode($content);
$pieces=array();
if(!empty($content)){
 //foreach($content as $phrase){
 
 //$chaine = utf8_decode($content->text);
$aremplacer = array("@",",",".",";",":","!","?","(",")","[","]","{","}","'"," ");
$enremplacement = " "; 
$sansponctuation = trim(str_replace($aremplacer, $enremplacement, $chaine));
$tab = explode(" ", $sansponctuation);
$pieces = array_merge($pieces,$tab);
	}
//}


$map = array();
$current_value=0;

for ($i=0;$i<count($pieces);$i++) {
	if ($pieces[$i] != "" ) {
		if (array_key_exists($pieces[$i], $map)) {
			$current_value = $map[$pieces[$i]];
			$map[$pieces[$i]] = $current_value+1; 
			} else {
			$map[$pieces[$i]] = 1; 
			}
	}
}

reset($map);

$mapx = array();
	while ($occurence = current($map)) {
		if ($occurence > 50 && strlen(key($map)) > 4  && (key($map)) != 'the' && (key($map)) != 'http' && 
		(key($map)) != 'pour' && (key($map)) != 'and' && (key($map)) != 'you' && (key($map)) != 'pas' && (key($map)) != 'for'
		&& (key($map)) != '//t' && (key($map)) != 'that' && (key($map)) != 'cette' && (key($map)) != 'with' && (key($map)) != 'this'
		&& (key($map)) != 'co/Fma66VC8ZV' && (key($map)) != 'avec' && (key($map)) != 'some' && (key($map)) != 'your'
		&& (key($map)) != 'dans' && (key($map)) != '2013' && (key($map)) != 'étre') {
		   $mapx[key($map)] = $occurence;
		}
		next($map);
		
	}

		
?>

<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="jquery.awesomeCloud-0.2.min.js"></script>
		<style type="text/css">
			.wordcloud {
				border: 1px solid #036;
				height: 7in;
				margin: 0.5in auto;
				padding: 0;
				page-break-after: always;
				page-break-inside: avoid;
				width: 7in;
			}
		</style>
	</head>
	<body>
		<div role="main">
			<p>Square, automatic scaling, print-ready, randomized word order</p>
			<div id="wordcloud1" class="wordcloud">
	<?php
	reset($mapx); 
		
	while ($occurence = current($mapx))  {  ?> 
	<span data-weight=<?php echo $occurence; ?> ><?php echo utf8_encode(key($mapx));  ?></span>
		<?php next($mapx); 
	} ?>
			</div>
			<p>Circle, manual scaling, normalized weighting</p>
			<div id="wordcloud2" class="wordcloud">
			<?php
			reset($mapx);
			while ($occurence = current($mapx)) {?>
	<span data-weight=<?php echo $occurence; ?> ><?php echo utf8_encode(key($mapx));  ?></span>
		<?php next($mapx);
	} ?>
			</div>
			<p>Star, densely packed, manual scaling, normalized weighting, print-ready</p>
			<div id="wordcloud3" class="wordcloud">
			<?php
				reset($mapx);
				while ($occurence = current($mapx)) {?>
				<span data-weight=<?php echo $occurence; ?> ><?php echo utf8_encode(key($mapx));  ?></span>
				<?php next($mapx);
			} ?>
			</div>
		</div>
		<footer>
			<p>Licensed under the <a href="http://www.gnu.org/licenses/gpl.html">GPL v3</a></p>
		</footer>
		<script>
			$(document).ready(function(){
				$("#wordcloud1").awesomeCloud({
					"size" : {
						"grid" : 16,
						"normalize" : false
					},
					"options" : {
						"color" : "random-dark",
						"rotationRatio" : 0.35,
						"printMultiplier" : 3,
						"sort" : "random"
					},
					"font" : "'Times New Roman', Times, serif",
					"shape" : "square"
				});
				$("#wordcloud2").awesomeCloud({
					"size" : {
						"grid" : 9,
						"factor" : 1
					},
					"options" : {
						"color" : "random-dark",
						"rotationRatio" : 0.35
					},
					"font" : "'Times New Roman', Times, serif",
					"shape" : "circle"
				});
				$("#wordcloud3").awesomeCloud({
					"size" : {
						"grid" : 1,
						"factor" : 3
					},
					"color" : {
						"background" : "#036"
					},
					"options" : {
						"color" : "random-light",
						"rotationRatio" : 0.5,
						"printMultiplier" : 3
					},
					"font" : "'Times New Roman', Times, serif",
					"shape" : "star"
				});
			});
		</script>
		<!--[if lt IE 7 ]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
	</body>
</html>

				
				
				
				
				
				
				
				
				
				
				
				
