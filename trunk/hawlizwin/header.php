<header id="header">

        <div id="logo" itemscope itemtype="http://schema.org/Organization">
            <a href="." class="logo" itemprop="url">
                <img itemprop="logo" src="logo.png" alt="" />
            </a>
        </div>
        
        <nav id="menu" class="nav">
            <ul id="top-menu">
                <li><a href="index.php" class="<?php if($active_accueil) echo "active"; ?>">Accueil</a></li>
                <li><a href="ajouter.php" class="<?php if($active_participer) echo "active"; ?> participer">Participer</a></li>
                <li><a href="list.php" class="<?php if($active_galerie) echo "active"; ?> galerie">Galerie</a></li>
                
                <li>
                    
                   <a href="#" id="example" rel="popover"  ><img src="img/social_btn.png"></a>
                
                 <script>
				  
				 $('#example').popover({
				  placement: 'bottom',
				  title: 'Partager ',
				  html: true,
				  content: '<button class="btn"><a name="fb_share" type="box_count" share_url="http://7awlizwin.com/index.php">Partager</a></button>'
				});
                </script>
                
                <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
 
                </li>
            </ul>
            <div class="clear"></div>
        </nav>
    </header>