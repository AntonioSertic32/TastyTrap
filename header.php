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

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJA7L1TTwb-J3CZzyAULzHUvlTLKRUnuc&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    
    <script>
        /*
        https://developers.google.com/maps/documentation/javascript/examples/event-closure

        45.814496419596274, 15.979447419766723
        45.816646771484834, 16.00006144330335
        45.804886317491196, 15.984524429228696
        45.59429627069257, 18.770362243367025
        45.201030142807575, 18.141914874676033*/
        /*
        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: { lat: -25.363882, lng: 131.044922 },
            });
            const bounds = {
                north: -25.363882,
                south: -31.203405,
                east: 131.044922,
                west: 125.244141,
            };
            // Display the area between the location southWest and northEast.
            map.fitBounds(bounds);
            // Add 5 markers to map at random locations.
            // For each of these markers, give them a title with their index, and when
            // they are clicked they should open an infowindow with text from a secret
            // message.
            const secretMessages = ["This", "is", "the", "secret", "message"];
            const lngSpan = bounds.east - bounds.west;
            const latSpan = bounds.north - bounds.south;

            for (let i = 0; i < secretMessages.length; ++i) {
                const marker = new google.maps.Marker({
                position: {
                    lat: bounds.south + latSpan * Math.random(),
                    lng: bounds.west + lngSpan * Math.random(),
                },
                map: map,
                });
                attachSecretMessage(marker, secretMessages[i]);
            }
        }

        // Attaches an info window to a marker with the provided message. When the
        // marker is clicked, the info window will open with the secret message.
        function attachSecretMessage(marker, secretMessage) {
            const infowindow = new google.maps.InfoWindow({
                content: secretMessage,
            });
            marker.addListener("click", () => {
                infowindow.open(marker.get("map"), marker);
            });
        }*/

    </script>

  </head>

  <body>

	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <img class="navbar-logo" src="http://localhost/TastyTrap/logo.png" alt="logo">
            <a class="navbar-brand" href="index.php"><?php echo get_bloginfo(); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php
                    $args = array(
                        'theme_location'  =>  'glavni-menu',
                        'menu_id'       =>  'glavni-menu',
                        'menu_class'    =>  'navbar-nav ml-auto menu_klasa',
                        'container'     =>  'div',
                        'container_class' =>  'collapse navbar-collapse',
                        'container_id'  => 'navbarReponsive'
                    );
                    wp_nav_menu( $args );
                    get_search_form();
                ?>   
            </div>
    </nav>