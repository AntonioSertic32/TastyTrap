<?php
get_header();
$sImageUrl = get_template_directory_uri().'/img/pozadina.jpg';
echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Tasty Trap®</h1>
              <span class="subheading">JE MJESTO ZA BESKRAJNE UŽITKE.</span>
              <span class="subheading">Naše proizvode možeš prilagoditi kako god želiš. Dodaj, oduzmi, udvostruči… Može!</span>
            </div>
          </div>
        </div>
      </div>
</header>';
?>

<?php
echo '<div class="container-fluid text-center">
		<div class="vijest-vrsta-item">
			    <h2>Najnovije vijesti!</h2>';
				echo daj_zadnje_vijesti();
echo '</div></div>';
?>

<?php
echo '<div class="container-fluid text-center" style="margin-top: -100px;">
		<div class="zaposlenik-vrsta-item">
			    <h2>Novi meniji u ponudi!</h2>';
				echo daj_zadnje_menije();
echo '</div></div>';
?>

<?php 
get_footer();
?>
