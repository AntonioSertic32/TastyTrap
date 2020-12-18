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
              <h1>Meniji</h1>
              <span class="subheading">Svi meniji na jednom mjestu!</span>
            </div>
          </div>
        </div>
      </div>
</header>';
?>

<?php
echo '<div class="container-fluid text-center">
		<div class="zaposlenik-vrsta-item">
			    <h2>Doručak</h2>';
				echo daj_meni( 'dorucak' );
				echo '<h2>Ručak</h2>';
				echo daj_meni( 'rucak' );
				echo '<h2>Međuobrok</h2>';
                echo daj_meni( 'meduobrok' );
                echo '<h2>Večera</h2>';
				echo daj_meni( 'vecera' );
echo '</div></div>';
?>

<?php
get_footer();
?>
