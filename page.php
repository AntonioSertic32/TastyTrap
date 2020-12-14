<?php
get_header();

if ( have_posts() )
{
while ( have_posts() )
{
the_post();
$sIstaknutaSlika = get_template_directory_uri().'/img/pozadina.jpg';
if(get_the_post_thumbnail_url($post->ID))
{
    $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
    // echo '<img style="max-width: 30%;" src="'.$sIstaknutaSlika.'" alt="">';
}

?>

 <header class="masthead" style="background-image: url(<?php echo $sIstaknutaSlika; ?>)">

  <?php echo'    <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>'; echo the_title(); echo '</h1>
            </div>
          </div>
        </div>
      </div>
</header>';
?>
<main id="mainStr">
	<?php 
	if(is_home() || is_front_page()) {
	echo '<div class="col-md-3 col-sm-3 col-xs-12" style="float:right">
	        <div class="footer-content">
	            <div class="footer-head">';
	                dynamic_sidebar('glavni-sidebar');
	            echo '</div>
	        </div>
	    </div>';
	}
    ?>
<?php 
echo '<div style="text-align:center; font-size: 20px;"><h2 style="color: pink;">Burgeri</h2>';
echo daj_hranu( 'burger' );
echo '<h2 style="color: pink;">Pizze</h2>';
echo daj_hranu( 'pizza' );
echo '<h2 style="color: pink;">Wrapovi</h2>';
echo daj_hranu( 'wrap' );
echo '</div>';
}
}
?>
</main>
<?php
get_footer();
?>
