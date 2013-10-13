<?php include("src/utils.php"); ?>
<?php include("fb-login.php"); ?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="Refresh" content="0;url=http://localhost/Pricyme/hawlizwin/list.php">
	<title></title>
	<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
        <?php

        $nom = $user_profile["name"];
        $email = $user_profile["email"];
        $username = $user_profile["username"];
        $photo = "https://graph.facebook.com/".$user."/picture";
        $ville = $user_profile["location"]["name"];
        if($user_profile["gender"] == "male") $sexe = 0;
        else $sexe = 1;
        $ip = $_SERVER["REMOTE_ADDR"];

        $stmt = $dbh->prepare("SELECT * FROM users WHERE email LIKE '$email'");
        $stmt->execute();
        $count = $stmt->rowCount();

        if($count == 0){
            $stmt = $dbh->prepare("INSERT INTO `users` (`id`, `email`, `oauth_uid`, `oauth_provider`, `username`, `twitter_oauth_token`, `twitter_oauth_token_secret`, `nom`, `sexe`, `photo`, `ville`, `date`, `ip`) VALUES (NULL, '$email', NULL, NULL, '$username', NULL, NULL, '$nom', '$sexe', '$photo', '$ville', CURRENT_TIMESTAMP, '$ip');");
            $stmt->execute();
        }


?>
				
</body>
</html>