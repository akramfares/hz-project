<?php include("src/utils.php"); ?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js"></script>

</head>
<body>
<?php
    if($_POST){
        $photo = $_POST["photo"];
        $prix = $_POST["prix"];
        $ville = $_POST["ville"];
        $description = $_POST["description"];

        $stmt = $dbh->prepare("INSERT INTO  `hawlizwin`.`photos` (`id` , `userid` , `url` , `prix` , `ville` , `description` , `vote` , `date` ) VALUES (NULL ,  '2',  '$photo',  '$prix',  '$ville',  '$description',  '', CURRENT_TIMESTAMP );"); 

        $stmt->execute();

    }

?>
				
</body>
</html>