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
        $oPiceVrste = wp_get_post_terms( $post->ID, 'pice_vrsta' );
        $oPiceVrsta = "-";

        $proteini = get_post_meta($post->ID, 'proteini', true);
        if ($proteini == "") 
        { 
          $proteini = 0;
        }
        $kalorije = get_post_meta($post->ID, 'kalorije', true);
        if ($kalorije == "") 
        { 
          $kalorije = 0;
        }
        $ugljikohidrati = get_post_meta($post->ID, 'ugljikohidrati', true);
        if ($ugljikohidrati == "") 
        { 
          $ugljikohidrati = 0;
        }
        $masti = get_post_meta($post->ID, 'masti', true);
        if ($masti == "") 
        { 
          $masti = 0;
        }

        if(sizeof($oPiceVrste)>0)
        {
            $oPiceVrsta = $oPiceVrste[0]->name;
            echo '
            <div class="pice-container">
                <div class="pice-container-slika">
                  <div class="pozadinska_boja"></div>
                  <img src="'.$sIstaknutaSlika.'">
                </div>
                <div class="container" style="text-align:center;">
                <div class="namjestanje">
                  <h1>'. get_the_title( $post->ID ) .'</h1></div>
                  <h3>Vrsta pića: '.$oPiceVrsta.'</h3>
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

