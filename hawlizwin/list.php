<?php include("src/utils.php"); 
$active_accueil = false;
$active_participer = false;
$active_galerie = true;
?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Galerie des 7awlis - 7awliZwin.com</title>
	<link href="css/style2.css" rel="stylesheet" type="text/css">
	<link href="css/style1.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script type="text/javascript"  src="js/modal.js"></script>
	<style type="text/css">
		#top-menu a{
			color:white;
		}
	</style>
	<?php include_once("src/mixpanel.php") ?>  
	<?php include("fb-login.php"); ?>


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

	<?php include("header.php"); ?>
    <div id="list-photo">
    	<h1>Participations <span>Votez pour votre 7awli préféré et tentez votre chance de gagner un coupon cadeau. <i>Aid Moubarak Said !</i> </span></h1>
    	<div class="separator"></div>
    	<?php if (!$user): ?>
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
		<?php
			// paging code
			// Query to count rows.
			$sth = $dbh->prepare("SELECT * FROM photos");
		    $sth->execute();

		    /* Récupération de toutes les lignes d'un jeu de résultats */
		    $num_rows = $sth->rowCount();
			$items = 8; // number of items per page.
			$nrpage_amount = $num_rows/$items;
			$page_amount = ceil($num_rows/$items);
			$page_amount = $page_amount-1;
			$p = 0;
			if(isset($_GET['p'])) $p = $_GET['p'];
			$page = mysql_real_escape_string($p);
			if($page < "1"){
				$page = "0";
			}
			$p_num = $items*$page;
			//end paging code
		    $sth = $dbh->prepare("SELECT * FROM photos ORDER BY id DESC LIMIT $p_num , $items");
		    $sth->execute();

		    /* Récupération de toutes les lignes d'un jeu de résultats */
		    $result = $sth->fetchAll();
		    echo '<div><ol class="thumb-grid group" style="padding-left: 1px;">';
		    $i = 0;
		    foreach ($result as $photo) {

		    	?>
				<li <?php if($i==4){
					echo 'style="margin:0 0px 17px 0px;"';
					$i=0;
				} ?>>
					<a data-toggle="modal" href="#myModal<?php echo $photo['id']; ?>" >
						<img src="<?php echo str_replace('files/', 'files/thumbnail/', $photo['url']) ; ?>" alt="thumbnail" />
					</a>
					<div class="infos-photo">
						<span style="color:#c2c0c0">de</span> <b>
						<?php 
							$sth = $dbh->prepare("SELECT * FROM users WHERE id =". $photo['userid']);
		    				$sth->execute();
		    				$user = $sth->fetch();
		    				echo $user["nom"];
						?></b>

							<?php 

								$fql = 'SELECT url, share_count, like_count, comment_count, total_count
							        FROM link_stat WHERE url="http://stackoverflow.com"';
							$json = file_get_contents('https://api.facebook.com/method/fql.query?format=json&query=' . urlencode($fql));
							$data = json_decode($json);
							if ($user): 
							?>
							<div style="float:right; margin-top: -3px;" class="fb-like" data-href="http://7awlizwin.com/participation.php?id=<?php echo $photo['id'] ?>" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
						<?php else: ?>
						<div style="float:right; margin-top: 0px; color:#c2c0c0">
							<?php echo  $data[0]->like_count; ?>
						</div>
						<?php endif; ?>
					</div>
				</li>
		     
			              <!-- Modal -->
			  <div class="modal fade" id="myModal<?php echo $photo['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title"> 7awli de <?php echo $user["nom"]; ?></h4>
			        </div>
			        <div class="modal-body">
			           
                        <img src="<?php echo $photo['url']; ?>" alt="thumbnail" style="width: 100%;" />

			            
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
			         
			        </div>
			      </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			  </div><!-- /.modal -->	
			           

		    	<?php
		    	$i++;
		    }
		    echo '</ol></div><div class="clearfix"></div>';

			function paging(){
				global $num_rows;
				global $page;
				global $page_amount;
				global $section;
				if($page_amount != "0"){
					echo '<nav class="page"><ul>';
						if($page != "0"){
							$prev = $page-1;
							echo '<li class="page-prev"><a href="list.php?p='.$prev.'">← Précédent</a></li>';
						}
						for ( $counter = 0; $counter <= $page_amount; $counter += 1) {
							echo '<li><a href="list.php?p='.$counter;
							if($counter == $page) echo '" class="active';
							echo '">';
							echo $counter+1;
							echo "</a></li>";
						}
						if($page < $page_amount){
							$next = $page+1;
							echo '<li class="page-next"><a href="list.php?p='.$next.'">Suivant →</a></li>';
						}
					echo "</ul></nav>";
				}
			}
			// call on Pagination with function
			paging();

		?>


	</div>
	<?php include_once("src/analytics.php") ?>	
</body>
</html>