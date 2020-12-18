<?php
get_header();
?>

<?php
$sImageUrl = get_template_directory_uri().'/img/pozadina.jpg';
echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Piće</h1>
              <span class="subheading">Osvježavajuće!</span>
            </div>
          </div>
        </div>
      </div>
</header>';
?>

<?php
echo '<div class="container-fluid text-center">
		<div class="pice-vrsta-item">
			    <h2>Hladna pića</h2>';
				echo daj_pice( 'hladno-pice' );
				echo '<h2>Topla pića</h2>';
				echo daj_pice( 'toplo-pice' );
echo '</div></div>';
?>

<?php
get_footer();
?>
