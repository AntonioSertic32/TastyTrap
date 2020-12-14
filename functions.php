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
        'menu_icon' => 'dashicons-groups',
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
    $sHtml = "<ul>";
    foreach ($hranaM as $hrana)
    {
		$sHranaUrl = $hrana->guid;
		$sHranaNaziv = $hrana->post_title;
		$sHtml .= '<li class="hrana-item"><a href="'.$sHranaUrl.'">'.$sHranaNaziv.'</a></li>';
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
        'menu_icon' => 'dashicons-groups',
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
        'menu_icon' => 'dashicons-groups',
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
        'menu_icon' => 'dashicons-groups',
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

