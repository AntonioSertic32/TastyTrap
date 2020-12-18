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
              <h1>Vijesti</h1>
              <span class="subheading">Najnovije vijesti!</span>
            </div>
          </div>
        </div>
      </div>
</header>';
?>

<?php
echo '<div class="container-fluid text-center">
		<div class="vijest-vrsta-item">
			    <h2>Hrana</h2>';
				echo daj_vijest( 'hrana' );
				echo '<h2>Restorani</h2>';
				echo daj_vijest( 'restorani' );
				echo '<h2>Nagradni natječaji</h2>';
				echo daj_vijest( 'nagradni-natjecaji' );
echo '</div></div>';
?>

<?php
get_footer();
?>
