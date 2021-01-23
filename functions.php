<?php

//INIT TEME
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		register_nav_menus( array(
			'glavni-menu' => "Glavni navigacijski izbornik",
			'sporedni-menu' => "Izbornik u podnožju",
		) );
		add_theme_support( 'custom-background', apply_filters
			(
				'test_custom_background_args', array
				(
					'default-color' => 'ffffff',
					'default-image' => '',
				) 	
			) 
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );

function aktiviraj_sidebar()
{
	register_sidebar(
		array (
			'name' => "Footer sidebar 1",
			'id' => 'footer-sidebar1',
			'description' => "Footer sidebar 1",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 2",
			'id' => 'footer-sidebar2',
			'description' => "Footer sidebar 2",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

	register_sidebar(
		array (
			'name' => "Footer sidebar 3",
			'id' => 'footer-sidebar3',
			'description' => "Footer sidebar 3",
			'before_widget' => '<div class="footer-sidebar">',
			'after_widget' => "</div>",
			'before_title' => '<h4 class="footer-sidebar-title">',
			'after_title' => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'aktiviraj_sidebar' );

//UCITAVANJE CSS DATOTEKA
function UcitajCssTeme()
{	
	wp_enqueue_style( 'clean-blog-css', get_template_directory_uri() . '/css/clean-blog.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css' );
	wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'UcitajCssTeme' );
//UCITAVANJE JS DATOTEKA
function UcitajJsTeme()
{		
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script('fontawesome-js', get_template_directory_uri().'/vendor/fontawesome-free/js/all.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-js', get_template_directory_uri().'/vendor/jquery/jquery.min.js', array('jquery'), true);	
	wp_enqueue_style( 'clean-blog-js', get_template_directory_uri() . '/js/clean-blog.min.js' );
	wp_enqueue_script('glavni-js', get_template_directory_uri().'/js/skripta.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'UcitajJsTeme' );


/* Hrana */
function registriraj_hrana_cpt() {
    $labels = array(
        'name' => _x( 'Hrana', 'Post Type General Name', 'vsmti' ),
        'singular_name' => _x( 'Hrana', 'Post Type Singular Name', 'vsmti' ),
        'menu_name' => __( 'Hrana', 'vsmti' ),
        'name_admin_bar' => __( 'Hrana', 'vsmti' ),
        'archives' => __( 'Hrana arhiva', 'vsmti' ),
        'attributes' => __( 'Atributi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski element', 'vsmti' ),
        'all_items' => __( 'Sva hrana', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novu hranu', 'vsmti' ),
        'add_new' => __( 'Dodaj novu', 'vsmti' ),
        'new_item' => __( 'Nova hrana', 'vsmti' ),
        'edit_item' => __( 'Uredi hranu', 'vsmti' ),
        'update_item' => __( 'Ažuriraj hranu', 'vsmti' ),
        'view_item' => __( 'Pogledaj hranu', 'vsmti' ),
        'view_items' => __( 'Pogledaj hranu', 'vsmti' ),
        'search_items' => __( 'Pretraži hranu', 'vsmti' ),
        'not_found' => __( 'Nije pronađeno', 'vsmti' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vsmti' ),
        'featured_image' => __( 'Glavna slika', 'vsmti' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'vsmti' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'vsmti' ),
        'insert_into_item' => __( 'Umentni', 'vsmti' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
        'items_list' => __( 'Lista', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija među hranom', 'vsmti' ),
        'filter_items_list' => __( 'Filtriranje hrane', 'vsmti' ),
    );
    $args = array(
        'label' => __( 'Hrana', 'vsmti' ),
        'description' => __( 'Hrana post type', 'vsmti' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-drumstick',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'hrana', $args );
}
add_action( 'init', 'registriraj_hrana_cpt', 0 );

/* Hrana - Vrsta */
function registriraj_taksonomiju_hrana_vrsta() {
    $labels = array(
        'name' => _x( 'Vrsta', 'Taxonomy General Name', 'vsmti' ),
        'singular_name' => _x( 'Vrsta', 'Taxonomy Singular Name', 'vsmti' ),
        'menu_name' => __( 'Vrsta', 'vsmti' ),
        'all_items' => __( 'Sve vrste', 'vsmti' ),
        'parent_item' => __( 'Roditeljska vrsta', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljska vrsta', 'vsmti' ),
        'new_item_name' => __( 'Nova vrsta', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novu vrstu', 'vsmti' ),
        'edit_item' => __( 'Uredi vrstu', 'vsmti' ),
        'update_item' => __( 'Ažuiriraj vrstu', 'vsmti' ),
        'view_item' => __( 'Pogledaj vrstu', 'vsmti' ),
        'separate_items_with_commas' => __( 'Odvojite vrste sa zarezima', 'vsmti' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni vrstu', 'vsmti' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vsmti' ),
        'popular_items' => __( 'Popularne vrste', 'vsmti' ),
        'search_items' => __( 'Pretraga', 'vsmti' ),
        'not_found' => __( 'Nema rezultata', 'vsmti' ),
        'no_terms' => __( 'Nema vrsti', 'vsmti' ),
        'items_list' => __( 'Lista vrsti', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'hrana_vrsta', array( 'hrana' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_hrana_vrsta', 0 );

function daj_hranu( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'hrana',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'hrana_vrsta',
		'field' => 'slug',
		'terms' => $slug
    )));
    $hranaM = get_posts( $args );
    $sHtml = "<ul class='hrana-item-ul'>";
    foreach ($hranaM as $hrana)
    {
        $nHranaId = $hrana->ID;
		$sHranaUrl = $hrana->guid;
        $sHranaNaziv = $hrana->post_title;
        $sHranaImg = get_the_post_thumbnail_url($nHranaId);

        $sHtml .= '
        <a href="'.$sHranaUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sHranaImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sHranaNaziv.'</h5>
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

/* Pića */
function registriraj_pice_cpt() {
    $labels = array(
        'name' => _x( 'Pića', 'Post Type General Name', 'vsmti' ),
        'singular_name' => _x( 'Piće', 'Post Type Singular Name', 'vsmti' ),
        'menu_name' => __( 'Pića', 'vsmti' ),
        'name_admin_bar' => __( 'Pića', 'vsmti' ),
        'archives' => __( 'Pića arhiva', 'vsmti' ),
        'attributes' => __( 'Atributi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski element', 'vsmti' ),
        'all_items' => __( 'Sva pića', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novo piće', 'vsmti' ),
        'add_new' => __( 'Dodaj novo', 'vsmti' ),
        'new_item' => __( 'Novo piće', 'vsmti' ),
        'edit_item' => __( 'Uredi piće', 'vsmti' ),
        'update_item' => __( 'Ažuriraj piće', 'vsmti' ),
        'view_item' => __( 'Pogledaj piće', 'vsmti' ),
        'view_items' => __( 'Pogledaj pića', 'vsmti' ),
        'search_items' => __( 'Pretraži pića', 'vsmti' ),
        'not_found' => __( 'Nije pronađeno', 'vsmti' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vsmti' ),
        'featured_image' => __( 'Glavna slika', 'vsmti' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'vsmti' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'vsmti' ),
        'insert_into_item' => __( 'Umentni', 'vsmti' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
        'items_list' => __( 'Lista', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija među pićima', 'vsmti' ),
        'filter_items_list' => __( 'Filtriranje pića', 'vsmti' ),
    );
    $args = array(
        'label' => __( 'Piće', 'vsmti' ),
        'description' => __( 'Piće post type', 'vsmti' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-coffee',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'pice', $args );
}
add_action( 'init', 'registriraj_pice_cpt', 0 );

/* Pića - Vrsta */
function registriraj_taksonomiju_pice_vrsta() {
    $labels = array(
        'name' => _x( 'Vrsta', 'Taxonomy General Name', 'vsmti' ),
        'singular_name' => _x( 'Vrsta', 'Taxonomy Singular Name', 'vsmti' ),
        'menu_name' => __( 'Vrsta', 'vsmti' ),
        'all_items' => __( 'Sve vrste', 'vsmti' ),
        'parent_item' => __( 'Roditeljska vrsta', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljska vrsta', 'vsmti' ),
        'new_item_name' => __( 'Nova vrsta', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novu vrstu', 'vsmti' ),
        'edit_item' => __( 'Uredi vrstu', 'vsmti' ),
        'update_item' => __( 'Ažuiriraj vrstu', 'vsmti' ),
        'view_item' => __( 'Pogledaj vrstu', 'vsmti' ),
        'separate_items_with_commas' => __( 'Odvojite vrste sa zarezima', 'vsmti' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni vrstu', 'vsmti' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vsmti' ),
        'popular_items' => __( 'Popularne vrste', 'vsmti' ),
        'search_items' => __( 'Pretraga', 'vsmti' ),
        'not_found' => __( 'Nema rezultata', 'vsmti' ),
        'no_terms' => __( 'Nema vrsti', 'vsmti' ),
        'items_list' => __( 'Lista vrsti', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'pice_vrsta', array( 'pice' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_pice_vrsta', 0 );

function daj_pice( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'pice',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'pice_vrsta',
		'field' => 'slug',
		'terms' => $slug
    )));
    $piceM = get_posts( $args );
    $sHtml = "<ul class='pice-item-ul'>";
    foreach ($piceM as $pice)
    {
        $nPiceId = $pice->ID;
		$sPiceUrl = $pice->guid;
        $sPiceNaziv = $pice->post_title;
        $sPiceImg = get_the_post_thumbnail_url($nPiceId);

        $sHtml .= '
        <a href="'.$sPiceUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sPiceImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sPiceNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

/* Vijesti */
function registriraj_vijest_cpt() {
    $labels = array(
        'name' => _x( 'Vijesti', 'Post Type General Name', 'vsmti' ),
        'singular_name' => _x( 'Vijest', 'Post Type Singular Name', 'vsmti' ),
        'menu_name' => __( 'Vijesti', 'vsmti' ),
        'name_admin_bar' => __( 'Vijesti', 'vsmti' ),
        'archives' => __( 'Vijesti arhiva', 'vsmti' ),
        'attributes' => __( 'Atributi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski element', 'vsmti' ),
        'all_items' => __( 'Sve vijesti', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novu vijest', 'vsmti' ),
        'add_new' => __( 'Dodaj novu', 'vsmti' ),
        'new_item' => __( 'Nova vijest', 'vsmti' ),
        'edit_item' => __( 'Uredi vijest', 'vsmti' ),
        'update_item' => __( 'Ažuriraj vijest', 'vsmti' ),
        'view_item' => __( 'Pogledaj vijest', 'vsmti' ),
        'view_items' => __( 'Pogledaj vijesti', 'vsmti' ),
        'search_items' => __( 'Pretraži vijesti', 'vsmti' ),
        'not_found' => __( 'Nije pronađeno', 'vsmti' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vsmti' ),
        'featured_image' => __( 'Glavna slika', 'vsmti' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'vsmti' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'vsmti' ),
        'insert_into_item' => __( 'Umentni', 'vsmti' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
        'items_list' => __( 'Lista', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija među vijestima', 'vsmti' ),
        'filter_items_list' => __( 'Filtriranje vijesti', 'vsmti' ),
    );
    $args = array(
        'label' => __( 'Vijest', 'vsmti' ),
        'description' => __( 'Vijest post type', 'vsmti' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-analytics',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'vijest', $args );
}
add_action( 'init', 'registriraj_vijest_cpt', 0 );

/* Vijesti - Tip */
function registriraj_taksonomiju_vijest_tip() {
    $labels = array(
        'name' => _x( 'Tip', 'Taxonomy General Name', 'vsmti' ),
        'singular_name' => _x( 'Tip', 'Taxonomy Singular Name', 'vsmti' ),
        'menu_name' => __( 'Tip', 'vsmti' ),
        'all_items' => __( 'Svi tipovi', 'vsmti' ),
        'parent_item' => __( 'Roditeljski tipovi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski tip', 'vsmti' ),
        'new_item_name' => __( 'Novi tip', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novi tip', 'vsmti' ),
        'edit_item' => __( 'Uredi tip', 'vsmti' ),
        'update_item' => __( 'Ažuiriraj tip', 'vsmti' ),
        'view_item' => __( 'Pogledaj tip', 'vsmti' ),
        'separate_items_with_commas' => __( 'Odvojite tipove sa zarezima', 'vsmti' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni tip', 'vsmti' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vsmti' ),
        'popular_items' => __( 'Popularni tipovi', 'vsmti' ),
        'search_items' => __( 'Pretraga', 'vsmti' ),
        'not_found' => __( 'Nema rezultata', 'vsmti' ),
        'no_terms' => __( 'Nema tipova', 'vsmti' ),
        'items_list' => __( 'Lista tipova', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'vijest_tip', array( 'vijest' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_vijest_tip', 0 );


function daj_vijest( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'vijest',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'vijest_tip',
		'field' => 'slug',
		'terms' => $slug
    )));
    $vijestM = get_posts( $args );
    $sHtml = "<ul class='vijest-item-ul'>";
    foreach ($vijestM as $vijest)
    {
        $nVijestId = $vijest->ID;
		$sVijestUrl = $vijest->guid;
        $sVijestNaziv = $vijest->post_title;
        $sVijestImg = get_the_post_thumbnail_url($nVijestId);

        $sHtml .= '
        <a href="'.$sVijestUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sVijestImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sVijestNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

/* Zaposlenici */
function registriraj_zaposlenik_cpt() {
    $labels = array(
        'name' => _x( 'Zaposlenici', 'Post Type General Name', 'vsmti' ),
        'singular_name' => _x( 'Zaposlenik', 'Post Type Singular Name', 'vsmti' ),
        'menu_name' => __( 'Zaposlenici', 'vsmti' ),
        'name_admin_bar' => __( 'Zaposlenici', 'vsmti' ),
        'archives' => __( 'Zaposlenici arhiva', 'vsmti' ),
        'attributes' => __( 'Atributi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski element', 'vsmti' ),
        'all_items' => __( 'Svi zaposlenici', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novog zaposlenika', 'vsmti' ),
        'add_new' => __( 'Dodaj novog', 'vsmti' ),
        'new_item' => __( 'Novi zaposlenik', 'vsmti' ),
        'edit_item' => __( 'Uredi zaposlenika', 'vsmti' ),
        'update_item' => __( 'Ažuriraj zaposlenika', 'vsmti' ),
        'view_item' => __( 'Pogledaj zaposlenika', 'vsmti' ),
        'view_items' => __( 'Pogledaj zaposlenike', 'vsmti' ),
        'search_items' => __( 'Pretraži zaposlenika', 'vsmti' ),
        'not_found' => __( 'Nije pronađeno', 'vsmti' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vsmti' ),
        'featured_image' => __( 'Glavna slika', 'vsmti' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'vsmti' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'vsmti' ),
        'insert_into_item' => __( 'Umentni', 'vsmti' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
        'items_list' => __( 'Lista', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija među zaposlenicima', 'vsmti' ),
        'filter_items_list' => __( 'Filtriranje zaposlenika', 'vsmti' ),
    );
    $args = array(
        'label' => __( 'Zaposlenik', 'vsmti' ),
        'description' => __( 'Zaposlenik post type', 'vsmti' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'zaposlenik', $args );
}
add_action( 'init', 'registriraj_zaposlenik_cpt', 0 );

/* Zaposlenik - Titula */
function registriraj_taksonomiju_zaposlenik_titula() {
    $labels = array(
        'name' => _x( 'Titula', 'Taxonomy General Name', 'vsmti' ),
        'singular_name' => _x( 'Titula', 'Taxonomy Singular Name', 'vsmti' ),
        'menu_name' => __( 'Titula', 'vsmti' ),
        'all_items' => __( 'Sve titule', 'vsmti' ),
        'parent_item' => __( 'Roditeljska titula', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljska titula', 'vsmti' ),
        'new_item_name' => __( 'Nova titula', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novu titulu', 'vsmti' ),
        'edit_item' => __( 'Uredi titulu', 'vsmti' ),
        'update_item' => __( 'Ažuiriraj titulu', 'vsmti' ),
        'view_item' => __( 'Pogledaj titulu', 'vsmti' ),
        'separate_items_with_commas' => __( 'Odvojite titule sa zarezima', 'vsmti' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni titulu', 'vsmti' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vsmti' ),
        'popular_items' => __( 'Popularne titule', 'vsmti' ),
        'search_items' => __( 'Pretraga', 'vsmti' ),
        'not_found' => __( 'Nema rezultata', 'vsmti' ),
        'no_terms' => __( 'Nema titula', 'vsmti' ),
        'items_list' => __( 'Lista titula', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'zaposlenik_titula', array( 'zaposlenik' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_zaposlenik_titula', 0 );


function daj_zaposlenika( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'zaposlenik',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'zaposlenik_titula',
		'field' => 'slug',
		'terms' => $slug
    )));
    $zaposlenikM = get_posts( $args );
    $sHtml = "<ul class='zaposlenik-item-ul'>";
    foreach ($zaposlenikM as $zaposlenik)
    {
        $nZaposlenikId = $zaposlenik->ID;
		$sZaposlenikUrl = $zaposlenik->guid;
        $sZaposlenikNaziv = $zaposlenik->post_title;
        $sZaposlenikImg = get_the_post_thumbnail_url($nZaposlenikId);

        $sHtml .= '
        <a href="'.$sZaposlenikUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sZaposlenikImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sZaposlenikNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

/* Meniji */
function registriraj_zaposlenik_meniji_cpt() {
    $labels = array(
        'name' => _x( 'Meniji', 'Post Type General Name', 'vsmti' ),
        'singular_name' => _x( 'Meni', 'Post Type Singular Name', 'vsmti' ),
        'menu_name' => __( 'Meniji', 'vsmti' ),
        'name_admin_bar' => __( 'Meniji', 'vsmti' ),
        'archives' => __( 'Meniji arhiva', 'vsmti' ),
        'attributes' => __( 'Atributi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski element', 'vsmti' ),
        'all_items' => __( 'Svi meniji', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novoi meni', 'vsmti' ),
        'add_new' => __( 'Dodaj novi', 'vsmti' ),
        'new_item' => __( 'Novi meni', 'vsmti' ),
        'edit_item' => __( 'Uredi meni', 'vsmti' ),
        'update_item' => __( 'Ažuriraj meni', 'vsmti' ),
        'view_item' => __( 'Pogledaj meni', 'vsmti' ),
        'view_items' => __( 'Pogledaj menije', 'vsmti' ),
        'search_items' => __( 'Pretraži meni', 'vsmti' ),
        'not_found' => __( 'Nije pronađeno', 'vsmti' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vsmti' ),
        'featured_image' => __( 'Glavna slika', 'vsmti' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'vsmti' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'vsmti' ),
        'insert_into_item' => __( 'Umentni', 'vsmti' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
        'items_list' => __( 'Lista', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija među menijima', 'vsmti' ),
        'filter_items_list' => __( 'Filtriranje menija', 'vsmti' ),
    );
    $args = array(
        'label' => __( 'Meni', 'vsmti' ),
        'description' => __( 'Meni post type', 'vsmti' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-food',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'meni', $args );
}
add_action( 'init', 'registriraj_zaposlenik_meniji_cpt', 0 );

/* Meni - Vrsta */
function registriraj_taksonomiju_meni_vrsta() {
    $labels = array(
        'name' => _x( 'Vrsta', 'Taxonomy General Name', 'vsmti' ),
        'singular_name' => _x( 'Vrsta', 'Taxonomy Singular Name', 'vsmti' ),
        'menu_name' => __( 'Vrsta', 'vsmti' ),
        'all_items' => __( 'Sve vrste', 'vsmti' ),
        'parent_item' => __( 'Roditeljska vrsta', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljska vrsta', 'vsmti' ),
        'new_item_name' => __( 'Nova vrsta', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novu vrstu', 'vsmti' ),
        'edit_item' => __( 'Uredi vrstu', 'vsmti' ),
        'update_item' => __( 'Ažuiriraj vrstu', 'vsmti' ),
        'view_item' => __( 'Pogledaj vrstu', 'vsmti' ),
        'separate_items_with_commas' => __( 'Odvojite vrste sa zarezima', 'vsmti' ),
        'add_or_remove_items' => __( 'Dodaj ili ukloni vrstu', 'vsmti' ),
        'choose_from_most_used' => __( 'Odaberi među najčešće korištenima', 'vsmti' ),
        'popular_items' => __( 'Popularne vrste', 'vsmti' ),
        'search_items' => __( 'Pretraga', 'vsmti' ),
        'not_found' => __( 'Nema rezultata', 'vsmti' ),
        'no_terms' => __( 'Nema vrsti', 'vsmti' ),
        'items_list' => __( 'Lista vrsti', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija', 'vsmti' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy( 'meni_vrsta', array( 'meni' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_meni_vrsta', 0 );


function daj_meni( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'meni',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'meni_vrsta',
		'field' => 'slug',
		'terms' => $slug
    )));
    $meniM = get_posts( $args );
    $sHtml = "<ul class='meni-item-ul'>";
    foreach ($meniM as $meni)
    {
        $nMeniId = $meni->ID;
		$sMeniUrl = $meni->guid;
        $sMeniNaziv = $meni->post_title;
        $sMeniImg = get_the_post_thumbnail_url($nMeniId);

        $sHtml .= '
        <a href="'.$sMeniUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sMeniImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sMeniNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}




/* Resorani */
function registriraj_resorani_cpt() {
    $labels = array(
        'name' => _x( 'Restorani', 'Post Type General Name', 'vsmti' ),
        'singular_name' => _x( 'Restoran', 'Post Type Singular Name', 'vsmti' ),
        'menu_name' => __( 'Restorani', 'vsmti' ),
        'name_admin_bar' => __( 'Restorani', 'vsmti' ),
        'archives' => __( 'Restorani arhiva', 'vsmti' ),
        'attributes' => __( 'Atributi', 'vsmti' ),
        'parent_item_colon' => __( 'Roditeljski element', 'vsmti' ),
        'all_items' => __( 'Svi restorani', 'vsmti' ),
        'add_new_item' => __( 'Dodaj novi restoran', 'vsmti' ),
        'add_new' => __( 'Dodaj novi', 'vsmti' ),
        'new_item' => __( 'Novi restoran', 'vsmti' ),
        'edit_item' => __( 'Uredi restoran', 'vsmti' ),
        'update_item' => __( 'Ažuriraj restoran', 'vsmti' ),
        'view_item' => __( 'Pogledaj restoran', 'vsmti' ),
        'view_items' => __( 'Pogledaj restorane', 'vsmti' ),
        'search_items' => __( 'Pretraži restorane', 'vsmti' ),
        'not_found' => __( 'Nije pronađeno', 'vsmti' ),
        'not_found_in_trash' => __( 'Nije pronađeno u smeću', 'vsmti' ),
        'featured_image' => __( 'Glavna slika', 'vsmti' ),
        'set_featured_image' => __( 'Postavi glavnu sliku', 'vsmti' ),
        'remove_featured_image' => __( 'Ukloni glavnu sliku', 'vsmti' ),
        'use_featured_image' => __( 'Postavi za glavnu sliku', 'vsmti' ),
        'insert_into_item' => __( 'Umentni', 'vsmti' ),
        'uploaded_to_this_item' => __( 'Preneseno', 'vsmti' ),
        'items_list' => __( 'Lista', 'vsmti' ),
        'items_list_navigation' => __( 'Navigacija među restoranima', 'vsmti' ),
        'filter_items_list' => __( 'Filtriranje restorana', 'vsmti' ),
    );
    $args = array(
        'label' => __( 'Restoran', 'vsmti' ),
        'description' => __( 'Restoran post type', 'vsmti' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-store',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'restorani', $args );
}
add_action( 'init', 'registriraj_resorani_cpt', 0 );

function daj_restorane()
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'restorani',
		'post_status' => 'publish',
		'tax_query' => array());
    $Restorani = get_posts( $args );

    $array = array();

    foreach ($Restorani as $restoran)
    {
        $restoranId = $restoran->ID;
		$resoranUrl = $restoran->guid;
        $restoranNaziv = $restoran->post_title;

        $lat = get_post_meta($restoranId, 'lat', true);
        $lng = get_post_meta($restoranId, 'lng', true);

        $object = (object) [
            'lat' => $lat,
            'lng' => $lng,
            'naziv_postaje'=> $restoranNaziv,
            'url'=> $resoranUrl,
        ];

        array_push($array, $object);
    }
    
    return $array;
}

// ------------------------------ >>
// ------------------------------------ >>

// NUTRITIVNE VRIJEDNOSTI

// ------------------------------------ >>
// ------------------------------ >>

function add_meta_box_nutritivna_vrijednost()
{
    add_meta_box( 'hrana_kalorije', 'Kalorije', 'html_meta_box_kalorije', 'hrana');
    add_meta_box( 'hrana_proteini', 'Proteini', 'html_meta_box_proteini', 'hrana');
    add_meta_box( 'hrana_ugljikohidrati', 'Ugljikohi', 'html_meta_box_ugljikohidrati', 'hrana');
    add_meta_box( 'hrana_masti', 'Masti', 'html_meta_box_masti', 'hrana');

    add_meta_box( 'pice_kalorije', 'Kalorije', 'html_meta_box_kalorije', 'pice');
    add_meta_box( 'pice_proteini', 'Proteini', 'html_meta_box_proteini', 'pice');
    add_meta_box( 'pice_ugljikohidrati', 'Ugljikohi', 'html_meta_box_ugljikohidrati', 'pice');
    add_meta_box( 'pice_masti', 'Masti', 'html_meta_box_masti', 'pice');

    add_meta_box( 'meni_hrana', 'Hrana', 'html_meta_box_hrana', 'meni');
    add_meta_box( 'meni_pice', 'Pice', 'html_meta_box_pice', 'meni');

    add_meta_box( 'restoran_adresa', 'Adresa', 'html_meta_box_adresa', 'restorani');
    add_meta_box( 'restoran_telefon', 'Telefon', 'html_meta_box_telefon', 'restorani');
    add_meta_box( 'restoran_lat', 'Lat', 'html_meta_box_lat', 'restorani');
    add_meta_box( 'restoran_lng', 'Lng', 'html_meta_box_lng', 'restorani');
}


// KALORIJE
function html_meta_box_kalorije($post)
{
    wp_nonce_field('spremi_kalorije', 'kalorije_nonce');
    $kalorije = get_post_meta($post->ID, 'kalorije', true);
    echo '
    <div>
        <div>
            <label for="kalorije">Kalorije: </label>
            <input type="number" step="any" id="kalorije" name="kalorije" value="'.$kalorije.'" />
        </div>
        <br/>
    </div>';
}
function spremi_kalorije($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_kalorije_nonce = ( isset( $_POST[ 'kalorije_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'kalorije_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_kalorije_nonce)
    {
        return;
    }
    if(!empty($_POST['kalorije']))
    {
        update_post_meta($post_id, 'kalorije',
        $_POST['kalorije']);
    }
    else
    {
        delete_post_meta($post_id, 'kalorije');
    }
}

// PROTEINI
function html_meta_box_proteini($post)
{
    wp_nonce_field('spremi_proteine', 'proteini_nonce');
    $proteini = get_post_meta($post->ID, 'proteini', true);
    echo '
    <div>
        <div>
            <label for="proteini">Proteini: </label>
            <input type="number" step="any" id="proteini" name="proteini" value="'.$proteini.'" />
        </div>
        <br/>
    </div>';
}
function spremi_proteine($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_proteini_nonce = ( isset( $_POST[ 'proteini_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'proteini_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_proteini_nonce)
    {
        return;
    }
    if(!empty($_POST['proteini']))
    {
        update_post_meta($post_id, 'proteini',
        $_POST['proteini']);
    }
    else
    {
        delete_post_meta($post_id, 'proteini');
    }
}

// UGLJIKOHIDRATI
function html_meta_box_ugljikohidrati($post)
{
    wp_nonce_field('spremi_ugljikohidrate', 'ugljikohidrati_nonce');
    $ugljikohidrati = get_post_meta($post->ID, 'ugljikohidrati', true);
    echo '
    <div>
        <div>
            <label for="ugljikohidrati">Ugljikohidrati: </label>
            <input type="number" step="any" id="ugljikohidrati" name="ugljikohidrati" value="'.$ugljikohidrati.'" />
        </div>
        <br/>
    </div>';
}
function spremi_ugljikohidrate($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_ugljikohidrati_nonce = ( isset( $_POST[ 'ugljikohidrati_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'ugljikohidrati_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_ugljikohidrati_nonce)
    {
        return;
    }
    if(!empty($_POST['ugljikohidrati']))
    {
        update_post_meta($post_id, 'ugljikohidrati',
        $_POST['ugljikohidrati']);
    }
    else
    {
        delete_post_meta($post_id, 'ugljikohidrati');
    }
}

// MASTI
function html_meta_box_masti($post)
{
    wp_nonce_field('spremi_masti', 'masti_nonce');
    $masti = get_post_meta($post->ID, 'masti', true);
    echo '
    <div>
        <div>
            <label for="masti">Masti: </label>
            <input type="number" step="any" id="masti" name="masti" value="'.$masti.'" />
        </div>
        <br/>
    </div>';
}
function spremi_masti($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_masti_nonce = ( isset( $_POST[ 'masti_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'masti_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_masti_nonce)
    {
        return;
    }
    if(!empty($_POST['masti']))
    {
        update_post_meta($post_id, 'masti',
        $_POST['masti']);
    }
    else
    {
        delete_post_meta($post_id, 'masti');
    }
}
 
// ADRESA
function html_meta_box_adresa($post)
{
    wp_nonce_field('spremi_adresu', 'adresa_nonce');
    $adresa = get_post_meta($post->ID, 'adresa', true);
    echo '
    <div>
        <div>
            <label for="adresa">Adresa: </label>
            <input type="text" id="adresa" name="adresa" value="'.$adresa.'" />
        </div>
        <br/>
    </div>';
}

function spremi_adresu($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_adresa_nonce = ( isset( $_POST[ 'adresa_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'adresa_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_adresa_nonce)
    {
        return;
    }
    if(!empty($_POST['adresa']))
    {
        update_post_meta($post_id, 'adresa',
        $_POST['adresa']);
    }
    else
    {
        delete_post_meta($post_id, 'adresa');
    }
}

// TELEFON
function html_meta_box_telefon($post)
{
    wp_nonce_field('spremi_telefon', 'telefon_nonce');
    $telefon = get_post_meta($post->ID, 'telefon', true);
    echo '
    <div>
        <div>
            <label for="telefon">Telefon: </label>
            <input type="text" id="telefon" name="telefon" value="'.$telefon.'" />
        </div>
        <br/>
    </div>';
}

function spremi_telefon($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_telefon_nonce = ( isset( $_POST[ 'telefon_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'telefon_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_telefon_nonce)
    {
        return;
    }
    if(!empty($_POST['telefon']))
    {
        update_post_meta($post_id, 'telefon',
        $_POST['telefon']);
    }
    else
    {
        delete_post_meta($post_id, 'telefon');
    }
}

// LAT
function html_meta_box_lat($post)
{
    wp_nonce_field('spremi_lat', 'lat_nonce');
    $lat = get_post_meta($post->ID, 'lat', true);
    echo '
    <div>
        <div>
            <label for="lat">Latituda: </label>
            <input type="text" id="lat" name="lat" value="'.$lat.'" />
        </div>
        <br/>
    </div>';
}

function spremi_lat($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_lat_nonce = ( isset( $_POST[ 'lat_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'lat_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_lat_nonce)
    {
        return;
    }
    if(!empty($_POST['lat']))
    {
        update_post_meta($post_id, 'lat',
        $_POST['lat']);
    }
    else
    {
        delete_post_meta($post_id, 'lat');
    }
}

// LNG
function html_meta_box_lng($post)
{
    wp_nonce_field('spremi_lng', 'lng_nonce');
    $lng = get_post_meta($post->ID, 'lng', true);
    echo '
    <div>
        <div>
            <label for="lng">Longituda: </label>
            <input type="text" id="lng" name="lng" value="'.$lng.'" />
        </div>
        <br/>
    </div>';
}

function spremi_lng($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_lng_nonce = ( isset( $_POST[ 'lng_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'lng_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    if ( $is_autosave || $is_revision || !$is_valid_lng_nonce)
    {
        return;
    }
    if(!empty($_POST['lng']))
    {
        update_post_meta($post_id, 'lng',
        $_POST['lng']);
    }
    else
    {
        delete_post_meta($post_id, 'lng');
    }
}

add_action( 'add_meta_boxes', 'add_meta_box_nutritivna_vrijednost' );
add_action( 'save_post', 'spremi_kalorije' );
add_action( 'save_post', 'spremi_proteine' );
add_action( 'save_post', 'spremi_ugljikohidrate' );
add_action( 'save_post', 'spremi_masti' );
add_action( 'save_post', 'spremi_adresu' );
add_action( 'save_post', 'spremi_telefon' );
add_action( 'save_post', 'spremi_lat' );
add_action( 'save_post', 'spremi_lng' );

// Hrana

function html_meta_box_hrana($post)
{
    wp_nonce_field('spremi_hranu', 'hrana_menija_nonce');
    //dohvaćanje meta vrijednosti
    $popisjela = get_post_meta($post->ID, 'hrana_menija', true);
    echo '
    <div>
    <div>
    <label for="hrana_menija">Hrana: </label>
    <select id="hrana_menija" name="hrana_menija[]" multiple>
            '.
            $args = array(
            'posts_per_page' => -1,
            'post_type' => 'hrana',
            'post_status' => 'publish'
            );
            $jela = get_posts( $args );
            $sHtml = "";

            foreach ($jela as $jelo)
                {
                    $sjeloNaziv = $jelo->post_title;
                    $jelaArray = explode(', ', $popisjela);
                    $selected = "";
                    foreach ($jelaArray as $ojelo) 
                    {
                        
                        if ($ojelo == $sjeloNaziv)
                        {
                            $selected = "selected";
                        }
                    }

                    
                    $sHtml .= '<option value="'.$sjeloNaziv.'" '. $selected .'>'.$sjeloNaziv.'</option>';
                }
            echo $sHtml
            .'
    </select>
    </div>
    <br/>
    </div>';
}

function spremi_hranu($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce_jelo_menija = ( isset( $_POST[ 'hrana_menija_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'hrana_menija_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce_jelo_menija)
    {
        return;
    }
    if(!empty($_POST['hrana_menija']))
    {
        if (is_array($_POST[ 'hrana_menija' ]))
        {
            $jela = implode(", ", $_POST[ 'hrana_menija' ]);
        }
        else
        {
            $jela = $_POST[ 'hrana_menija' ];
        }
        update_post_meta($post_id, 'hrana_menija',
        $jela);
    }
    else
    {
        delete_post_meta($post_id, 'hrana_menija');
    }
}

add_action( 'save_post', 'spremi_hranu' );


// Pice

function html_meta_box_pice($post)
{
    wp_nonce_field('spremi_pice', 'pice_menija_nonce');
    //dohvaćanje meta vrijednosti
    $popispica = get_post_meta($post->ID, 'pice_menija', true);
    echo '
    <div>
    <div>
    <label for="pice_menija">Pice: </label>
    <select id="pice_menija" name="pice_menija[]" multiple>
            '.
            $args = array(
            'posts_per_page' => -1,
            'post_type' => 'pice',
            'post_status' => 'publish'
            );
            $pica = get_posts( $args );
            $sHtml = "";

            foreach ($pica as $pice)
                {
                    $spiceNaziv = $pice->post_title;
                    $picaArray = explode(', ', $popispica);
                    $selected = "";
                    foreach ($picaArray as $opice) 
                    {
                        
                        if ($opice == $spiceNaziv)
                        {
                            $selected = "selected";
                        }
                    }

                    
                    $sHtml .= '<option value="'.$spiceNaziv.'" '. $selected .'>'.$spiceNaziv.'</option>';
                }
            echo $sHtml
            .'
    </select>
    </div>
    <br/>
    </div>';
}

function spremi_pice($post_id)
{
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce_pice_menija = ( isset( $_POST[ 'pice_menija_nonce' ] ) &&
        wp_verify_nonce($_POST[ 'pice_menija_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    if ( $is_autosave || $is_revision || !$is_valid_nonce_pice_menija)
    {
        return;
    }
    if(!empty($_POST['pice_menija']))
    {
        if (is_array($_POST[ 'pice_menija' ]))
        {
            $pica = implode(", ", $_POST[ 'pice_menija' ]);
        }
        else
        {
            $pica = $_POST[ 'pice_menija' ];
        }
        update_post_meta($post_id, 'pice_menija',
        $pica);
    }
    else
    {
        delete_post_meta($post_id, 'pice_menija');
    }
}

add_action( 'save_post', 'spremi_pice' );


function daj_zadnje_vijesti() 
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'vijest',
		'post_status' => 'publish',
		'tax_query' => array(
    ));
    $vijestM = get_posts( $args );
    $sHtml = "<ul class='vijest-item-ul'>";
    $brojac = 0;
    foreach ($vijestM as $vijest)
    {
        $brojac++;
        if($brojac == 4) {
        break;
        }
        $nVijestId = $vijest->ID;
		$sVijestUrl = $vijest->guid;
        $sVijestNaziv = $vijest->post_title;
        $sVijestImg = get_the_post_thumbnail_url($nVijestId);

        $sHtml .= '
        <a href="'.$sVijestUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sVijestImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sVijestNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

function daj_zadnje_menije()
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'meni',
		'post_status' => 'publish',
		'tax_query' => array(
    ));
    $meniM = get_posts( $args );
    $sHtml = "<ul class='meni-item-ul'>";
    $brojac = 0;
    foreach ($meniM as $meni)
    {
        $brojac++;
        if($brojac == 3) {
        break;
        }
        $nMeniId = $meni->ID;
		$sMeniUrl = $meni->guid;
        $sMeniNaziv = $meni->post_title;
        $sMeniImg = get_the_post_thumbnail_url($nMeniId);

        $sHtml .= '
        <a href="'.$sMeniUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sMeniImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sMeniNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

