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

        $proteini = get_post_meta($post->ID, 'proteini', true);
        $kalorije = get_post_meta($post->ID, 'kalorije', true);
        $ugljikohidrati = get_post_meta($post->ID, 'ugljikohidrati', true);
        $masti = get_post_meta($post->ID, 'masti', true);

        if(sizeof($oHranaVrste)>0)
        {
            $oHranaVrsta = $oHranaVrste[0]->name;
            echo '
            <div class="hrana-container">
                <div class="hrana-container-slika">
                  <div class="pozadinska_boja"></div>
                  <img src="'.$sIstaknutaSlika.'">
                </div>
                <div class="container" style="text-align:center;">
                  <div class="namjestanje">
                  <h1>'. get_the_title( $post->ID ) .'</h1></div>
                  <h3>Vrsta jela: '.$oHranaVrsta.'</h3>
                  '.$post->post_content.'

                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Kalorije</th>
                        <th scope="col">Proteini</th>
                        <th scope="col">Ugljikohidrati</th>
                        <th scope="col">Masti</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>'.$kalorije.'Kcal</td>
                        <td>'.$proteini.'Kcal</td>
                        <td>'.$ugljikohidrati.'Kcal</td>
                        <td>'.$masti.'Kcal</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>';
        }

  }
}

get_footer();
?>

