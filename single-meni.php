<?php
  get_header();
?>

<?php
  $global_kalorije = 0.0;
  $global_proteini = 0.0;
  $global_ugljikohidrati = 0.0;
  $global_masti = 0.0;

  $hrana_kalorije = 0.0;
  $hrana_proteini = 0.0;
  $hrana_ugljikohidrati = 0.0;
  $hrana_masti = 0.0;

  $pice_kalorije = 0.0;
  $pice_proteini = 0.0;
  $pice_ugljikohidrati = 0.0;
  $pice_masti = 0.0;
?>

<?
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
                  $kalorije = get_post_meta($jelo->ID, 'kalorije', true);
                  if(is_numeric($kalorije)) {
                    $global_kalorije += $kalorije;
                    $hrana_kalorije += $kalorije;
                  }

                  $proteini = get_post_meta($jelo->ID, 'proteini', true);
                  if(is_numeric($proteini)) {
                    $global_proteini += $proteini;
                    $hrana_proteini += $proteini;
                  }

                  $ugljikohidrati = get_post_meta($jelo->ID, 'ugljikohidrati', true);
                  if(is_numeric($ugljikohidrati)) {
                    $global_ugljikohidrati += $ugljikohidrati;
                    $hrana_ugljikohidrati += $ugljikohidrati;
                  }

                  $masti = get_post_meta($jelo->ID, 'masti', true);
                  if(is_numeric($masti)) {
                    $global_masti += $masti;
                    $hrana_masti += $masti;
                  }

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
          $sHtml = '';
          $popispica = get_post_meta($post->ID, 'pice_menija', true);

          $picaArray = explode(', ', $popispica);
          if(sizeof($picaArray)==1)
            {
              if ($picaArray[0] == "")
              {
              }
              else {

                $sHtml = '<div class="pice-meni">';
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
                      $kalorije = get_post_meta($pice->ID, 'kalorije', true);
                      if(is_numeric($kalorije)) {
                        $global_kalorije += $kalorije;
                        $pice_kalorije += $kalorije;
                      }

                      $proteini = get_post_meta($pice->ID, 'proteini', true);
                      if(is_numeric($proteini)) {
                        $global_proteini += $proteini;
                        $pice_proteini += $proteini;
                      }

                      $ugljikohidrati = get_post_meta($pice->ID, 'ugljikohidrati', true);
                      if(is_numeric($ugljikohidrati)) {
                        $global_ugljikohidrati += $ugljikohidrati;
                        $pice_ugljikohidrati += $ugljikohidrati;
                      }

                      $masti = get_post_meta($pice->ID, 'masti', true);
                      if(is_numeric($masti)) {
                        $global_masti += $masti;
                        $pice_masti += $masti;
                      }

                      $sHtml .= '
                      <a href="'.$spiceUrl.'">
                        <div class="card" style="width: 18rem; height: 100%;">
                          <img class="card-img-top" src="'.$sIstaknutaSlika.'" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title text-center">'.$spiceNaziv.'</h5>
                          </div>
                        </div>
                      </a>';
                    }
                  }
                }
              }
            }
            $sHtml .= '</div></div>
            <div class="container" style="text-align:center; padding-bottom: 50px;">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" style="width: 200px;"></th>
                    <th scope="col">Kalorije</th>
                    <th scope="col">Proteini</th>
                    <th scope="col">Ugljikohidrati</th>
                    <th scope="col">Masti</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <td>Hrana</td>
                    <td>'.$hrana_kalorije.'Kcal</td>
                    <td>'.$hrana_proteini.'Kcal</td>
                    <td>'.$hrana_ugljikohidrati.'Kcal</td>
                    <td>'.$hrana_masti.'Kcal</td>
                  </tr>
                  <tr>
                    <td>Piće</td>
                    <td>'.$pice_kalorije.'Kcal</td>
                    <td>'.$pice_proteini.'Kcal</td>
                    <td>'.$pice_ugljikohidrati.'Kcal</td>
                    <td>'.$pice_masti.'Kcal</td>
                  </tr>
                  <tr style="font-weight:bold">
                    <td>Sveukupno</td>
                    <td>'.$global_kalorije.'Kcal</td>
                    <td>'.$global_proteini.'Kcal</td>
                    <td>'.$global_ugljikohidrati.'Kcal</td>
                    <td>'.$global_masti.'Kcal</td>
                  </tr>

                </tbody>
              </table>
            </div>';

            echo $sHtml;
        
  }
}
?>


<?php
get_footer();
?>

