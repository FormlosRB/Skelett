<!DOCTYPE html>
<html>

<head>
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
		
		<header>
		    <div class="header_inner">
               <nav id="meta-nav-wrapper">
                    <?php wp_nav_menu( array( 
                        'theme_location' => 'meta_nav',
                        ) );
                    ?>
                </nav>
                <nav id="main-nav">
                    <a href="<?php echo home_url(); ?>" id="logo"><img src="<?php

                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        echo $image[0];

                    ?>" title="<?php bloginfo( 'name' ); ?>" /></a>
                    <?php wp_nav_menu( array(
                            'theme_location' => 'main_nav',
                        ));
                    ?>
                </nav>
                <div class="clear"></div>
			</div>
		</header>
		<div id="main">