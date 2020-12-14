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
        $oHranaVrste = wp_get_post_terms( $post->ID, 'hrana_vrsta' );
        $oHranaVrsta = "-";
            if(sizeof($oHranaVrste)>0)
                {
                    $oHranaVrsta = $oHranaVrste[0]->name;
                    echo '
                    <div class="hrana-container">
                        <div class="hrana-container-slika"><img src="'.$sIstaknutaSlika.'"></div>
                        <div class="container" style="text-align:center;">
                        <h3>'.$oHranaVrsta.'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

