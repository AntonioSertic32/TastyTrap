<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tasty Trap®</title>
	<?php wp_head(); ?>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  </head>

  <body>

	<!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="index.php"><?php echo get_bloginfo(); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php
                        $args = array(
                            'theme_location'  =>  'glavni-menu',
                            'menu_id'       =>  'glavni-menu',
                            'menu_class'    =>  'navbar-nav ml-auto',
                            'container'     =>  'div',
                            'container_class' =>  'collapse navbar-collapse',
                            'container_id'  => 'navbarReponsive'
                        );
                        wp_nav_menu( $args );

                    ?>   
                </div>
            </div>
        </nav> 
