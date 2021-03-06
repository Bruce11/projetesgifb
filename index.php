<?php
    error_reporting(E_ALL);
    ini_set("display_error",1);

    session_start();

	require "facebook-php-sdk-v4-4.0-dev/autoload.php";
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
	
	const APPID = "1431531240480284";
	const APPSECRET = "08611dedf4fdc28a5a02f465a14f6aec";
    const WEBURL = "https://projetesgifb.herokuapp.com/";

	FacebookSession::setDefaultApplication(APPID, APPSECRET);

	$helper = new FacebookRedirectLoginHelper(WEBURL);

	//$loginUrl = $helper->getLoginUrl();

    //$session = $helper->getSessionFromRedirect();

    if( isset($_SESSION) && isset($_SESSION['fb_token']) ){
        $session = new FacebookSession($_SESSION['fb_token']);
    } else {
        $session = $helper->getSessionFromRedirect();
    }
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Concours Photo ESGI</title>
		<meta name="description" content="contenu de ma page">
	</head>	
		
	<body>

        <?php
        if($session){
            $_SESSION['fb_token'] = (string) $session->getAccessToken();

            $request_user = new FacebookRequest( $session,"GET","/me");
            $request_user_executed = $request_user->execute();
            $user = $request_user_executed->getGraphObject(GraphUser::className());

            echo "Bonjour ".$user->getName();

        } else {
            $loginUrl = $helper->getLoginUrl();
            echo "<a href='".$loginUrl."'>Facebook Login</a>";
        }
        ?>

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
		
		<h1>Mon Concours Photo</h1>
		
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
		
	</body>		
	
</html>