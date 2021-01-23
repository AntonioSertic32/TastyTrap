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
            <div class="container-fluid"><div class="vijest-item-ul" style="padding-top: 50px;">
        <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
            ?>
                
                <a href="<?php the_permalink(); ?>">
                    <div class="card" style="min-height: 364px;">
                        <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php the_title(); ?></h5>
                            
                        </div>
                    </div>
                </a>
            <?php
        }
        ?>
        
        </div></div>
        <?php
    }else{
    ?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="container text-center" style="font-size: 40px; margin-top:10%">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>

          <img src="<?php echo $errorImg; ?>">
        </div>
<?php } ?>

<?php get_footer(); ?>