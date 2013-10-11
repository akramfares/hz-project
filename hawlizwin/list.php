<?php include("src/utils.php"); ?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/style2.css" rel="stylesheet" type="text/css">
	<link href="css/style1.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js"></script>
	<style type="text/css">
		#top-menu a{
			color:white;
		}
	</style>
</head>
<body style="padding-top:0px;">
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
					<a href="#"><img src="<?php echo str_replace('files/', 'files/thumbnail/', $photo['url']) ; ?>" alt="thumbnail" /></a>
					Par <b>Akram Fares</b>
				</li>
		    	<?php
		    }
		    echo '</ol>';

		?>
	</div>		
</body>
</html>