<?php

	require "facebook-php-sdk-v4-4.0-dev/autoload.php"

	use Facebook\FacebookSession;
	
	const APPID = "1431531240480284";
	const APPSECRET = "08611dedf4fdc28a5a02f465a14f6aec";
	
	FacebookSession::setDefaultApplication(APPID, APPSECRET);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Concours Photo ESGI</title>
		<meta name="description" content="contenu de ma page">
	</head>	
		
	<body>
		<script>
		  window.fbAsyncInit = function() {
			FB.init({
			  appId      : '<?php echo APPID; ?>',
			  xfbml      : true,
			  version    : 'v2.3'
			});
		  };

		  (function(d, s, id){
			 var js, fjs = d.getElementsByTagName(s)[0];
			 if (d.getElementById(id)) {return;}
			 js = d.createElement(s); js.id = id;
			 js.src = "//connect.facebook.net/en_US/sdk.js";
			 fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>	
		
		<h1>Hello World</h1>
		
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
		
	</body>		
	
</html>