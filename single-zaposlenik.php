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
        $oZaposlenikVrste = wp_get_post_terms( $post->ID, 'zaposlenik_titula' );
        $oZaposlenikVrsta = "-";
            if(sizeof($oZaposlenikVrste)>0)
                {
                    $oZaposlenikVrsta = $oZaposlenikVrste[0]->name;
                    echo '
                    <div class="zaposlenik-container">
                        <div class="zaposlenik-container-slika">
                          <div class="pozadinska_boja"></div>
                          <img src="'.$sIstaknutaSlika.'">
                        </div>
                        <div class="container" style="text-align:center;">
                        <h3>'.$oZaposlenikVrsta.'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

