<?php
get_header();
?>

<script>

function initMap() {
  var myLatLng = {lat: 45.554295891511565, lng: 18.699458831163877};
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: myLatLng
  });
  
  var ajaxUrl="<?php echo get_site_url()."/wp-admin/admin-ajax.php?action=daj_restorane"; ?>";

  jQuery.getJSON(ajaxUrl, function(data){

    for (var i = 0; i < data.length; i++) 
    {
      var aPostaja = data[i];
      var marker = new google.maps.Marker({
        position: {lat: parseFloat(aPostaja.lat), lng: parseFloat(aPostaja.lng)},
        map: map,
        title: aPostaja.naziv_postaje,
      });
      attachSecretMessage(marker);
      
      function attachSecretMessage(marker) {
        const infowindow = new google.maps.InfoWindow({
            content:  '<h2 id="firstHeading" class="firstHeading">'+ aPostaja.naziv_postaje +'</h2> <hr>' +
                      '<p style="font-size: 20px; padding-bottom: 0;">Adresa: <b style="font-weight: 700;">'+ aPostaja.adresa +'</b>' +
                      '<p style="font-size: 20px; padding-bottom: 0;">Telefon: <b style="font-weight: 700;">'+ aPostaja.telefon +'</b>',
        });
        marker.addListener("click", () => {
            infowindow.open(marker.get("map"), marker);
        });
      }
    }  
  });
}

</script>

<?php
if($post->ID == 320) {
  $sImageUrl = get_template_directory_uri().'/img/pozadina.jpg';
  echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
              <div class="site-heading">
                <h1>Kako do nas?</h1>
                <span class="subheading"></span>
              </div>
            </div>
          </div>
        </div>
  </header>';

    echo '<div class="page"><div> <br/>';
    if ( have_posts() )
    {
        while ( have_posts() )
        {
            the_post();
            
            $sIstaknutaSlika = "";
            if( get_the_post_thumbnail_url($post->ID) )
            {
                $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
            }
            else
            {
                $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
            }
            echo '<div class="row">'.the_content().'</div>';
        }
    }
  echo '<br/><br/><br/></div></div>';
}
else{
  $sImageUrl = get_template_directory_uri().'/img/pozadina.jpg';
  echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-10 mx-auto">
              <div class="site-heading">
                <h1>O nama</h1>
                <span class="subheading"></span>
              </div>
            </div>
          </div>
        </div>
  </header>';
  echo '<div class="page"><div class="container"> <br/>';
      if ( have_posts() )
      {
          while ( have_posts() )
          {
              the_post();
              
              $sIstaknutaSlika = "";
              if( get_the_post_thumbnail_url($post->ID) )
              {
                  $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
              }
              else
              {
                  $sIstaknutaSlika = get_template_directory_uri(). '/img/home-bg.jpg';
              }
              echo '<div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-6" style="text-align:;">'.the_content().'</div>
                      <div class="col-md-3"></div>
                  </div>';
          }
      }
  echo '<br/><br/><br/></div></div>';
  }
?>


<?php
get_footer();
?>
