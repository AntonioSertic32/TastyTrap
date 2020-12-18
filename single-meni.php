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
        $oMeniVrste = wp_get_post_terms( $post->ID, 'meni_vrsta' );
        $oMeniVrsta = "-";
            if(sizeof($oMeniVrste)>0)
                {
                    $oMeniVrsta = $oMeniVrste[0]->name;
                    echo '
                    <div class="meni-container">
                        <div class="meni-container-slika">
                          <div class="pozadinska_boja"></div>
                          <img src="'.$sIstaknutaSlika.'">
                        </div>
                        <div class="container" style="text-align:center;">
                        <h3>'.$oMeniVrsta.'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

