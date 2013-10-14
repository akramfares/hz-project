<?php include("src/utils.php"); 
$active_accueil = true;
$active_participer = false;
$active_galerie = false;
?>
<html lang="fr" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <meta name="viewport" content="width=device-width initial-scale=1.0">

        <meta name="title" content="7awli Zwin">
        <meta name="description" content="A l'occasion de  Aid Aldha, Nous vous invitons à participer au concours 7awli Zwin qui se déroulera entre le 13 et le 20 octobre. ">
        <meta name="keywords" content="" />

    	<title>
            7awli Zwin
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
        <script src="js/jquery.js"></script>
         <script type="text/javascript"  src="js/modal.js"></script>
        <link rel="canonical" href="">

        <!-- Facebook meta tags -->
        <meta property="og:title" content="7awli Zwin" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="http://7awlizwin.com/img/1_00677.jpg">
        <meta property="og:url" content="http://7awlizwin.com" />
        <meta property="og:description" content="A l'occasion de  Aid Aldha, Nous vous invitons à participer au concours 7awli Zwin qui se déroulera entre le 13 et le 20 octobre. " />

        <script type="text/javascript" src="js/jquery.js"></script>
         <script type="text/javascript" src="js/tooltip.js"></script>
           <script type="text/javascript" src="js/popover.js"></script>

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
                            au concours 7awlizwine, du 13 au 20 Octobre, pour <br />
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
                <a data-toggle="modal" href="#myModal" > <div id="mobile">&nbsp;</div></a>
				  <!-- Modal -->
				  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						  <h2 class="modal-title">7awli Video</h2>
						</div>
						<div class="modal-body">
						 <iframe class="youtube-player" type="text/html" width="560" height="420" src="http://www.youtube.com/embed/Fg-RqeEWhwc" allowfullscreen frameborder="0">
						</iframe>
						</div>
						<div class="modal-footer">
							<a  href="#" 
							  onclick="
								window.open(
								  'http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://7awlizwin.com/&p[images][0]=&p[title]=Partager&p[summary]=?u='+encodeURIComponent(location.href), 
								  'facebook-share-dialog', 
								  'width=626,height=436'); 
								return false;">
							 <button type="button" class="btn btn-primary">Partager</button>
							</a>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
						</div>
					  </div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				  </div><!-- /.modal -->
				
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
