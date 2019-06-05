<!DOCTYPE html>
<html>
<head>
	<title>Booking Page</title>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/attstyles.css">
    <link rel="stylesheet" type="text/css" href="/css/bookingstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Glegoo' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Carrois Gothic SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
    <meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
/>

    <style>
    	
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="prevselections">
			<div id="prev-pkg">
				<h2></h2>
			</div>
			<div id="prev-unit">
				<h1>Booking Page</h1>
			</div>
			<div id="prev-aescopt">
				<h2></h2>
			</div>
			
			<div id="prev-numrooms">
				<h2></h2>
			</div>
			<div id="prev-unit1sdate">
				<h2></h2>
			</div>
			<div id="prev-unit1nights">
				<h2></h2>
				<h2></h2>
			</div>
			<div id="prev-unit2nights">
				<h2></h2>
				<h2></h2>
				<h2></h2>
			</div>
		</div>
		<form action="inc/checkout.php" method="POST">
			<input type="hidden" name="temp" id="temp" value="">
			<input type="hidden" name="unit1" id="unit1">
			<input type="hidden" name="unit2" id="unit2">
			<input type="hidden" name="unit1nights" value="1" id="unit1nights">
			<input type="hidden" name="unit2nights" value="1" id="unit2nights">
			<input type="hidden" name="pkg" id="pkg">
			<input type="hidden" name="numrooms" id="numrooms" value="1">
			<input type="hidden" name="bedtypecnd" id="bedtypecnd" value="0">
			<input type="hidden" name="bedtypehtl" id="bedtypehtl" value="0">
			<input type="hidden" name="unit1sdate" id="unit1sdate">
			<input type="hidden" name="unit2sdate" id="unit2sdate">
			<input type="hidden" name="unit1edate" id="unit1edate">
			<input type="hidden" name="unit2edate" id="unit2edate">
			<input type="hidden" name="goption" id="goption" value="0">
			<input type="hidden" name="escopt1" id="escopt1" value="0">
			<input type="hidden" name="escopt2" id="escopt2" value="0">
			<input type="hidden" name="escopt3" id="escopt3" value="0">
			<input type="hidden" name="escattsel" id="escattsel" value="1">
			<input type="hidden" name="numadults" id="numadults" value="1">
			<input type="hidden" name="numchildren" id="numchildren" value="0">
			<input type="hidden" name="attbundlemain" id="attbundlemain" value="0">
			<input type="hidden" name="attbundlece" id="attbundlece" value="0">
			<input type="hidden" name="att1" id="att1" value="0"> 
			<input type="hidden" name="att2" id="att2" value="0">
			<input type="hidden" name="att3" id="att3" value="0">
			<input type="hidden" name="att4" id="att4" value="0">
			<input type="hidden" name="att5" id="att5" value="0">
			<input type="hidden" name="att6" id="att6" value="0">
			<input type="hidden" name="att7" id="att7" value="0">
			<input type="hidden" name="att8" id="att8" value="0">
			<input type="hidden" name="att9" id="att9" value="0">
			<input type="hidden" name="att10" id="att10" value="0">
			<input type="hidden" name="att11" id="att11" value="0">
			<input type="hidden" name="att12" id="att12" value="0">
			<input type="hidden" name="att13" id="att13" value="0">
			<input type="hidden" name="att14" id="att14" value="0">
			<input type="hidden" name="att15" id="att15" value="0">
			<div id="activeoptiondiv" class="actoptdiv-pkgselect">
				<div class="pkgopt pkg-not-active" id="cde">
					<h2>ALL OUT ESCAPE</h2>
					<h4>$1100 for housing +</h4>
					<h4>$142/adult & $130/child for attractions</h4>
					<h4>Includes boa tour</h4>
				</div>
				<div class="pkgopt pkg-not-active" id="pcf">
					<h2>FAMILY PEACEFUL ESCAPE</h2>
					<h4>Huancaro Condo - $130/night</h4>
					<h4>Huayabamba Lodge- $105/night</h4>
					<h4>Includes 24/7 Travel advisor + airport transport</h4>
				</div>
				<div class="pkgopt pkg-not-active" id="fam">
					<h2>PAIR PEACEFUL ESCAPE</h2>
					<h4>Huancaro Condo - $110/night</h4>
					<h4>Huayabamba Lodge- $85/night</h4> 
					<h4>Includes 24/7 Travel advisor + airport transport</h4>
				</div>
				<div class="pkgopt pkg-not-active" id="pvt">
					<h2>FAMILY ESCAPE</h2>
					<h4>Huancaro Condo - $85/night</h4>
					<h4>Huayabamba Lodge- $65/night</h4>
					<h4>+$20 Fee if booking attractions</h4>
				</div>
				<div class="pkgopt pkg-not-active" id="sng">
					<h2>PAIR ESCAPE</h2>
					<h4>Huancaro Condo - $65/night</h4>
					<h4>Huayabamba Lodge- $45/night</h4>
					<h4>+$20 Fee if booking attractions</h4>
				</div>
				</div>
	  		<div id="activeoptcontbutton">
	  		CONTINUE</div>
		</form>
	</div>
	<script type="text/javascript" src="js/bkpg.js"></script>
	<script type="text/javascript">
	if(top.location != window.location) {
	    window.location = '/inc/error_iframe.php';
	}
	</script>
</body>
</html>