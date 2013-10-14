<?php include("src/utils.php"); 
$active_accueil = false;
$active_participer = true;
$active_galerie = false;
?>
<?php include("fb-login.php"); ?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Participer - 7awliZwin.com</title>
    <link href="css/style1.css" rel="stylesheet" type="text/css">
    <link href="css/style2.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("header.php"); 
    if(isset($_GET["id"])) $id = htmlentities($_GET["id"]);
    else exit;

    $stmt = $dbh->prepare("SELECT * FROM photos WHERE id = $id");
    $stmt->execute();
    $photo = $stmt->fetch();
    $sth = $dbh->prepare("SELECT * FROM users WHERE id =". $photo['userid']);
    $sth->execute();
    $userp = $sth->fetch();

    ?>

    <!-- for Facebook -->          
    <meta property="og:title" content="7awli Zwin" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?php echo $photo["url"]; ?>" />
    <meta property="og:url" content="<?php echo SITEURI; ?>/participation.php?id=<?php echo $photo["id"]; ?>" />
    <meta property="og:description" content="7awli Zwin de <?php echo $userp["nom"]; ?>, Votez et partagez pour m'aider à gagner" />

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Generic page styles -->
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="css/jquery.fileupload.css">

    <script src="js/jquery.js"></script>
    <script type="text/javascript"  src="js/modal.js"></script>
    <style type="text/css">
        ul, ol {
            margin-bottom: 0px;
        }
    </style>
<?php include_once("src/mixpanel.php") ?>  
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ba2f5604-210d-437a-beb8-a48bcecb9324", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</head>
<body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1&appId=201216620060701";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div id="list-photo" style="padding-bottom:30px; padding-left:20px">

        <?php if (!$user): 
            $loginUrl = $facebook->getLoginUrl(
                array('scope' => 'email',
                'redirect_uri' => 'http://7awlizwin.com/participation.php?id='.$photo["id"])
              );
        ?>
            <div id="connect" style="margin-top:12px">
            <a href="<?php echo $loginUrl; ?>" class="fb-button-container-reg">
                <div class="pluginSkinLight">
                    <div class="pluginLoginButton pluginLoginButtonXlarge">
                        <div>
                            <div class="pluginFaviconButton pluginFaviconButtonXlarge" id="u4wmlh_1">
                                <table class="uiGrid" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <i class="pluginFaviconButtonIcon img sp_login-button sx_login-button_xlarge"></i>
                                                <i class="pluginFaviconButtonIconActive img sp_login-button sx_login-button_xlargea"></i>
                                            </td>
                                            <td>
                                                <span class="pluginFaviconButtonBorder">
                                                    <span class="pluginFaviconButtonText fwb">Se connecter avec Facebook pour voter</span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </a>
          </div>
      <?php endif; ?>

        
            <div style="width:100%; text-align:center; margin-top:28px; margin-bottom:23px;"><img src="img/etape3.png"></div>
            <div style="width:100%; text-align:center; margin-bottom:23px;"><img src="img/separator.png"></div>

            <div class="row">
              <div class="col-md-6" style="width:390px">
                <div style="display:table; height:309px; overflow: hidden; width: 100%; background-color: white; border: solid 1px #E5E5E5; border-radius: 4px;"> 
                    <div style="display:table-cell; vertical-align:middle; width:100%; margin:0 auto; text-align:center; ">
                      
                        <img src="<?php echo $photo["url"]; ?>" style="max-width: 390px;
max-height: 400px;">
                        
                   </div> 
                </div> 
                
              </div>
              <div class="col-md-6">
                <div style="display:table; height:309px; overflow: hidden; width: 100%; "> 
                    <div style="display:table-cell; vertical-align:middle; width:100%; margin:0 auto; padding-top:12px">
                        <span style="color:#626262; font-size:20px;">Participation de <b style="color:#81b971; font-size:20px;"> </span>
                        <?php echo $userp["nom"]; ?></b>
                        <p style="color:#c2c0c0; margin-top:12px;">Marché : <?php 
                            $sth = $dbh->prepare("SELECT * FROM ville WHERE id =". $photo['ville']);
                            $sth->execute();
                            $ville = $sth->fetch();
                            echo utf8_encode($ville["ville"]);
                        ?>
                    </p>
                    <img src="img/separator.png">
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-4" style="text-align:center">
                            

                            <?php 
                            if ($user): 
                            ?>
                            <div class="fb-like" data-href="http://7awlizwin.com/participation.php?id=<?php echo $photo['id'] ?>" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="true" data-send="false"></div>
                        <?php else: 
                        $fql = 'SELECT url, share_count, like_count, comment_count, total_count
                                    FROM link_stat WHERE url="http://7awlizwin.com/participation.php?id='.$photo['id'].'"';
                            $json = file_get_contents('https://api.facebook.com/method/fql.query?format=json&query=' . urlencode($fql));
                            $data = json_decode($json);
                        ?>
                        <div style="margin-top: 0px; color:#c2c0c0">
                            Nombre de votes : <?php echo  $data[0]->like_count; ?>
                        </div>
                        <?php endif; ?>
                        </div>
                        <div class="col-md-4" style="text-align:center">
                            <a data-toggle="modal" href="#myModal" class="btn btn-success fileinput-button" style="width:80%">
                                <span>Partager</span>
                            </a>

                            <!-- Modal -->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title"> Partager</h4>
                                </div>
                                <div class="modal-body">
                                   
                                   <span class='st_facebook_vcount' displayText='Facebook'></span>
                                    <span class='st_email_vcount' displayText='Email'></span>
                                    <span class='st_twitter_vcount' displayText='Tweet'></span>
                                    <span class='st_pinterest_vcount' displayText='Pinterest'></span>
                                    <span class='st_googleplus_vcount' displayText='Google +'></span>

                                    
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                 
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

                        </div>
                    </div>
                
              </div>
              </div>
              </div>
            </div>
    </div>
          
<?php include_once("src/analytics.php") ?>  

</body>
</html>