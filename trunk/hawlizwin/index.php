<?php include("src/utils.php"); 
$active_accueil = true;
$active_participer = false;
$active_galerie = false;
?>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->

<html class="no-js" lang="fr">
    <head>
    	<meta charset="utf-8">
        <!-- This makes sure the latest version of IE is used in versions of IE that contain multiple rendering engines. Even if a site visitor is using IE8 or IE9, it's possible that they're not using the latest rendering engine their browser contains. To fix this, use: -->
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->

        <meta name="viewport" content="width=device-width initial-scale=1.0">

        <meta name="title" content="">
        <meta name="description" content="">
        <meta name="keywords" content="" />

    	<title>
            Bienvenue - 7awliZwin.com
        </title>
        
        <link rel="icon" href="" type="image/x-icon">
        <link rel="shortcut icon" href="" type="image/x-icon">
        
        <link rel="image_src" href="" />
        
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
        <link href="css/style1.css" rel="stylesheet" type="text/css">
        <link href="css/style2.css" rel="stylesheet" type="text/css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap styles -->
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <link rel="canonical" href="">


    	<!-- IE Fix for HTML5 Tags -->
    	<!--[if lt IE 9]>
    		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    	<![endif]-->

        <!-- Facebook meta tags -->
        <meta property="og:title" content="" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="">
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:locale" content="fr_FR" />

        <!-- Twitter card - Mus validate after -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
        <meta name="twitter:creator" content="">
        <meta name="twitter:image:src" content="">
        <meta name="twitter:domain" content="">
        <meta name="twitter:app:name:iphone" content="">
        <meta name="twitter:app:name:ipad" content="">
        <meta name="twitter:app:name:googleplay" content="">
        <meta name="twitter:app:url:iphone" content="">
        <meta name="twitter:app:url:ipad" content="">
        <meta name="twitter:app:url:googleplay" content="">
        <meta name="twitter:app:id:iphone" content="">
        <meta name="twitter:app:id:ipad" content="">
        <meta name="twitter:app:id:googleplay" content="">
        <script type="text/javascript" src="js/jquery.js"></script>

        <style type="text/css">*{color:white;}</style>
        <?php include_once("src/mixpanel.php") ?>  
        <script type="text/javascript">mixpanel.track("Landing page view");</script>
    </head>
    <body>
        <noscript>
            <div style="background-color: #FF8700;text-align:center;line-height:2em;color:#FFF;">
                Javascript est désactivé sur votre navigateur. Notez que cela pourrait réduire votre expérience utilisateur.
            </div>
        </noscript>
        <div id="wrapper">
            <?php include("header.php"); ?>
            <div id="main">
                <div id="content">
                    <div class="index-block">
                        <h2>Capturez</h2>
                        <p>
                            la photo de votre 7awli avec votre téléphone <br />
                            ou votre appareil photo.
                        </p>
                    </div>
                    <div class="index-block">
                        <h2>Participez</h2>
                        <p>
                            au concours 7awlizwine, du 11 au 17 Octobre, pour <br />
                            découvrir le plus beau 7awli.
                        </p>
                    </div>
                    <div class="index-block">
                        <h2>Partagez & Gagnez</h2>
                        <p>
                            un bon d'achat de 1500 DHs grâce aux<br/>
                            votes de vos amis
                        </p>
                    </div>
                </div>
                <div id="mobile">&nbsp;</div>
                <div class="clear"></div>
            </div>
            <div class="push"></div>
        </div>
        <footer id="footer">
            <div>
                <p>
                    Commencez dès maintenant par vous inscrire en ajoutant la photo de votre 7awli
                    <a class="footer-button participer" href="ajouter.php"><img src="img/participer_btn.png"></a>
                </p>
            </div>
        </footer>

        <?php include_once("src/analytics.php") ?>  
    </body>
</html>
