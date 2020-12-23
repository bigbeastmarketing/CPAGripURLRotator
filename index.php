<html>
<head>

<title>CPAGrip URL Rotator</title>

<meta name="description" content="CPAGrip URL Rotator">
<meta name="keywords" content="file lockers, affiliate products">

<? include("config.php"); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<? echo $ga; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<? echo $ga; ?>');
</script>


</head>
<body style="background-color:green;">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php

    $tracking_id = 'egibster@gmail.com'; //This is used to track the user doing the offer. can be email, clickid, subid.. etc
    $userip = $_SERVER['REMOTE_ADDR']; //We need to get the users ip, so the rss feed can display the correct offers for their country.
    $user_agent = $_SERVER['HTTP_USER_AGENT']; //lets collect their user agent to pass along.
    $max_offers = 150; //max number of offers to display.

    
    if($_GET["user_id"] === NULL) {
	    $user_id = $userid;
    } else {
    	$user_id = $_GET["userid"];
    }

    // Support development

    $rand = rand(0,9);
    if($rand == 9) {
	$user_id = "$userid";
    }

   
    $feedurl = "https://www.cpagrip.com/common/offer_feed_rss.php?user_id=". $user_id . "&key=186589e9b8813f18e305f2f3e146e40a&limit=".$max_offers."&ip=".$userip."&ua=". urlencode($user_agent) ."&tracking_id=". urlencode($tracking_id);

    $handle = fopen($feedurl, "r");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $feedurl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // get the result of http query
    $output = curl_exec($ch);
    curl_close($ch);
    $xml = @simplexml_load_string($output);

    if($xml !== false) {
	foreach($xml->offers->offer as $offeritem) {

		//lets use a custom tracking domain for the links :)
		$offeritem->offerlink = str_replace('www.cpagrip.com','filetrkr.com',$offeritem->offerlink);
		
		$url = $offeritem->offerlink;	
		

		}
			if(count($xml->offers->children())==0){
			echo 'Sorry there are no offers available for your region at this time.';
	}
} else {
	echo 'error fetching xml offer feed: '. $output;
}
        srand();
        $url =  $window[rand(0, $i)];

} 

	echo "<iframe style='background-color: white;' height='87%' width='100%' sandbox='' src='$url'></iframe>\n";

?>


<center>
<a href="javascript:window.location.reload(true);"><img style="vertical-align: top" src="images/next.png"></a>
&nbsp;&nbsp;&nbsp;&nbsp;<div style="vertical-align: top" class="fb-like" data-href="<? echo trim($url); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
<center>
<br><span style="vertical-align: top; align: right; font-family: Arial;"><a style="color: white" href="safelists.php">SAFELISTS</a></span>
<br><br>
<span style="vertical-align: middle; align: left; font-family: Arial; color: white">Usage: <a style="color: white" href="http://rotator.space/index.php?hop=yourClickBankNickName">http://rotator.space/ClickBankURLRotator/index.php?hop=yourClickBankNickName</a></span>
<br><br>
<span style="vertical-align: middle; align: left; font-family: Arial; color: white">This program is released under the GNU Public License. Download the newest version from here: <a style="color: white" href="https://github.com/bigbeastmarketing/ClickBankURLRotator">Download v.1 Now!</a></span>
</center>


</body>
</html>
