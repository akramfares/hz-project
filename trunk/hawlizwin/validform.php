<?php include("src/utils.php"); ?>
<?php include("fb-login.php"); ?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="js/jquery.js"></script>

</head>
<body>
<?php
    print_r($user_profile);

    if($_POST){

        $nom = $user_profile["name"];
        $email = $user_profile["email"];
        $username = $user_profile["username"];
        $photo = "https://graph.facebook.com/".$user."/picture";
        $ville = $user_profile["location"]["name"];
        if($user_profile["gender"] == "male") $sexe = 0;
        else $sexe = 1;
        $ip = $_SERVER["REMOTE_ADDR"];

        $stmt = $dbh->prepare("INSERT INTO `users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `username`, `twitter_oauth_token`, `twitter_oauth_token_secret`, `nom`, `sexe`, `photo`, `ville`, `date`, `ip`) VALUES (NULL, '$email', NULL, NULL, '$username', NULL, NULL, '$nom', '$sexe', '$photo', '$ville', CURRENT_TIMESTAMP, '$ip');");
        $stmt->execute();

        $sth = $dbh->prepare("SELECT * FROM users WHERE email ='$email'");
        $sth->execute();
        $user = $sth->fetch();
        $userid = $user["id"];

        $photo = $_POST["photo"];
        $prix = $_POST["prix"];
        $ville = $_POST["ville"];
        $description = $_POST["description"];



        $stmt = $dbh->prepare("INSERT INTO  `photos` (`id` , `userid` , `url` , `prix` , `ville` , `description` , `vote` , `date` ) VALUES (NULL ,  '$userid',  '$photo',  '$prix',  '$ville',  '$description',  '', CURRENT_TIMESTAMP );"); 

        $stmt->execute();

        
    }

?>
				
</body>
</html>