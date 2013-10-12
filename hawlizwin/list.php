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
</head>
<body>
	<?php include("header.php"); ?>
    <div id="list-photo">
    	<h1>7wala zwinine</h1>
		<?php
		    $sth = $dbh->prepare("SELECT * FROM photos");
		    $sth->execute();

		    /* Récupération de toutes les lignes d'un jeu de résultats */
		    $result = $sth->fetchAll();
		    echo '<ol class="thumb-grid group">';
		    foreach ($result as $photo) {
		    	?>
				<li>
					<a data-toggle="modal" href="#myModal" ><img src="<?php echo str_replace('files/', 'files/thumbnail/', $photo['url']) ; ?>" alt="thumbnail" /></a>
					Par <b>Akram Fares</b>
				</li>
		     
			              <!-- Modal -->
			  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			          <h4 class="modal-title"> 7wala dial Akram Fares</h4>
			        </div>
			        <div class="modal-body">
			           
                        <img src="<?php echo $photo['url']; ?>" alt="thumbnail" style="width: 100%;" />

			            
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Ferme</button>
			         
			        </div>
			      </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			  </div><!-- /.modal -->	
			           

		    	<?php
		    }
		    echo '</ol>';

		?>
	</div>
	<?php include_once("src/analytics.php") ?>	
</body>
</html>