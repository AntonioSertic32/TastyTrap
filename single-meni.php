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
              <div class="namjestanje">
                <h1>'. get_the_title( $post->ID ) .'</h1></div>
                <h3>Vrsta menija: '.$oMeniVrsta.'</h3>
                <p>'.$post->post_content.'</p>
              </div>
            </div>';
        }
  }
}
?>

<?php
if ( have_posts() )
{
  while ( have_posts() )
  {
    the_post();
        $sIstaknutaSlika = "";

        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'hrana',
          'post_status' => 'publish'
          );
          $jela = get_posts( $args );
          $sHtml = '<div class="meni_container"><div class="hrana-meni">';
          $popisJela = get_post_meta($post->ID, 'hrana_menija', true);
          
          foreach ($jela as $jelo)
            {
              $sJeloNaziv = $jelo->post_title;
              $nJeloId = $jelo->ID;
              $sJeloUrl = $jelo->guid;
              $sIstaknutaSlika = get_the_post_thumbnail_url($nJeloId);
              $jelaArray = explode(', ', $popisJela);
              $selected = "";
              foreach ($jelaArray as $oNastavnik) 
              {
                if ($oNastavnik == $sJeloNaziv)
                {
                  $sHtml .= '
                  <a href="'.$sJeloUrl.'">
                    <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="'.$sIstaknutaSlika.'" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title text-center">'.$sJeloNaziv.'</h5>
                      </div>
                    </div>
                  </a>';
                }
              }
            }
            if(sizeof($jelaArray)==1)
            {
              if ($jelaArray[0] == "")
              {
              $sHtml .= '<h2>Nema upisanih jela!</h2>';
              }
            }
            
            $sHtml .= '</div>';

            echo $sHtml;
        
  }
}
if ( have_posts() )
{
  while ( have_posts() )
  {
    the_post();
        $sIstaknutaSlika = "";

        $args = array(
          'posts_per_page' => -1,
          'post_type' => 'pice',
          'post_status' => 'publish'
          );
          $pica = get_posts( $args );
          $sHtml = '<div class="pice-meni">';
          $popispica = get_post_meta($post->ID, 'pice_menija', true);
          
          foreach ($pica as $pice)
            {
              $spiceNaziv = $pice->post_title;
              $npiceId = $pice->ID;
              $spiceUrl = $pice->guid;
              $sIstaknutaSlika = get_the_post_thumbnail_url($npiceId);
              $picaArray = explode(', ', $popispica);
              $selected = "";
              foreach ($picaArray as $oNastavnik) 
              {
                if ($oNastavnik == $spiceNaziv)
                {
                  $sHtml .= '
                  <a href="'.$spiceUrl.'">
                    <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="'.$sIstaknutaSlika.'" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">'.$spiceNaziv.'</h5>
                      </div>
                    </div>
                  </a>';
                }
              }
            }
            if(sizeof($picaArray)==1)
            {
              if ($picaArray[0] == "")
              {
              $sHtml .= '<h2>Nema upisanih pica!</h2>';
              }
            }
            
            $sHtml .= '</div></div>';

            echo $sHtml;
        
  }
}
?>


<?php
get_footer();
?>

