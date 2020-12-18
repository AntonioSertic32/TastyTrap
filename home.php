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
get_footer();
?>
