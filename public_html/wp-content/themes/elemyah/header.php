<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-XXXXXXX', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>"> 
                 <img  src="<?= get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>">  
            </a>
            </div>
			<?php
			wp_nav_menu( array(
					'menu'              => 'menu1',
					'theme_location'    => 'menu1',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse',
					'container_id'      => 'site-navbar-collapse-1',
					'menu_class'        => 'nav navbar-nav mainmenu'
				)
			);
			?>
        </div>
    </nav>
</header>