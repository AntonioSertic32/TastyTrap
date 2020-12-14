<?php
get_header();
?>
<main>
<?php
		echo '<div style="text-align:center; font-size: 20px;"><h2 style="color: pink;">Burgeri</h2>';
		echo daj_hranu( 'burger' );
		echo '<h2 style="color: pink;">Pizze</h2>';
		echo daj_hranu( 'pizza' );
		echo '<h2 style="color: pink;">Wrapovi</h2>';
		echo daj_hranu( 'wrap' );
		echo '</div>';
?>
 </main>
<?php
get_footer();
?>
