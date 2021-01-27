<?php
/**
 * The template for displaying Search Results pages.
 *
 */
?>

<?php 
get_header(); 
$sImageUrl = get_template_directory_uri().'/img/pozadina.jpg';
$errorImg = get_template_directory_uri().'/img/404.png';
?>

<?php
    $s=get_search_query();
    $args = array(
        's' =>$s
    );
    // The Query
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        //_e("<h2 style='font-weight:bold;color:#000;margin-top:200px;text-align:center;'>Rezultati pretrage: ".get_query_var('s')."</h2>");

        echo '<header class="masthead" style="background-image: url('.$sImageUrl.')">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                    <div class="col-lg-10 col-md-10 mx-auto">
                        <div class="site-heading">
                        <h1>Rezultati pretrage: <br> '.get_query_var('s'). '</h1>
                        </div>
                    </div>
                    </div>
                </div>
            </header>';
        ?>
            <div class="container-fluid" style="padding-top: 50px;">

        <?php 
            $args = array(
                'public'   => true,
                '_builtin' => false,
            );
            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'
            $post_types = get_post_types( $args, $output, $operator ); 

            foreach ( $post_types  as $post_type ) {
                $brojac = 0;
                $sHTML = "";
                
                $sHTML .='<div class="vijest-vrsta-item"><h2 style="text-align: center;text-transform: capitalize;">' . $post_type . '</h2><div class="vijest-item-ul">';

                while ( $the_query->have_posts() ) {
                    
                    $the_query->the_post();

                    if(get_post_type($the_query->ID) == $post_type) {
                        $brojac++;

                        $sHTML .= '<a href="'.get_permalink( $post->ID).'">
                                        <div class="card" style="min-height: 364px;">
                                            <img class="card-img-top" src="'. get_the_post_thumbnail_url($post->ID) .'" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">'. get_the_title($post->ID) .'</h5>
                                            </div>
                                        </div>
                                    </a>';
                    }
                }
                $sHTML .= '</div></div>';
                if($brojac == 0){
                    continue;
                }
                else {
                    echo $sHTML;
                }
            }
        ?>
        
        </div>
        <?php
    }else{
    ?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="container text-center" style="font-size: 40px; margin-top:10%">
          <p>Žao nam je, ali nije pronađen niti jedan rezultat vaše pretrage. Molimo vas da pokušate sa drugačijim unosom.</p>

          <img src="<?php echo $errorImg; ?>">
        </div>
<?php } ?>

<?php get_footer(); ?>