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
                    
                   <a href="list.php" id="social" ><img src="img/social_btn.png"></a>
                

 
                </li>
            </ul>
            <div class="clear"></div>
        </nav>
    </header>