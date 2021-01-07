<?php
    get_header();
?>
    <?php
if ( have_posts() )
{
  while ( have_posts() )
  {
    the_post();
        $sIstaknutaSlika = "";
        $sNaslov = "test";

        $sIstaknutaSlika = "";
        if( get_the_post_thumbnail_url($post->ID) )
        {
          $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
        }
        $oVijestVrste = wp_get_post_terms( $post->ID, 'vijest_tip' );
        $oVijestVrsta = "-";
            if(sizeof($oVijestVrste)>0)
                {
                    $oVijestVrsta = $oVijestVrste[0]->name;
                    echo '
                    <div class="vijest-container">
                        <div class="vijest-container-slika">
                          <img src="'.$sIstaknutaSlika.'">
                        </div>
                        <div class="container" style="text-align:center;">
                        <h3>'. get_the_title( $post->ID ) .'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

