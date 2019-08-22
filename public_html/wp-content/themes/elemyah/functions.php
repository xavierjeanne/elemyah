<?php
/*
  Created by Pierre Bernardeau.
  For Influa
  Date: 13/09/2018
  Time: 09:14
  
        _
    ,--'_`--.    
  ,/( \   / )\.  
 //  \ \_/ /  \\ 
|/___/     \___\|
((___       ___))    Join the Empire !!!  ﴾̵ ̵◎̵ ̵﴿
|\   \  _  /   /|
 \\  / / \ \  // 
  `\(_/___\_)/'
    `--._.--'
  
 */


// CSS
// Définition du dossier contenant les CSS
add_filter( 'stylesheet_directory_uri', 'mm_stylesheet_directory_uri', 10, 2 );
function mm_stylesheet_directory_uri( $stylesheet_dir_uri, $stylesheet ) {
	return $stylesheet_dir_uri . '/assets/css';
}

// Définition du fichier style
add_filter( 'stylesheet_uri', 'mm_stylesheet_uri', 10, 2 );
function mm_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {
	return $stylesheet_dir_uri . '/styles.css';
}

// Définition des CSS externes à charger
function custom_styles() {
	wp_register_style( 'fontawesome', '//use.fontawesome.com/releases/v5.3.1/css/all.css', false, '5.3.1' );
	wp_enqueue_style( 'fontawesome' );
	wp_register_style( 'caveat', '//fonts.googleapis.com/css?family=Caveat' );
	wp_enqueue_style( 'caveat' );
	wp_register_style( 'barlow', '//fonts.googleapis.com/css?family=Barlow' );
	wp_enqueue_style( 'barlow' );

}

add_action( 'wp_enqueue_scripts', 'custom_styles' );

// JAVASCRIPT

function custom_scripts() {
//    wp_deregister_script( 'bootstrap' );
	// wp_register_script( 'jquery', '//code.jquery.com/jquery-1.11.0.min.js', false, '1.11.0', true );
 //  	wp_enqueue_script( 'jquery' );
	// wp_register_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', false, '1.8.1', true );
 //   	wp_enqueue_script( 'slick' );
	
   
}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// THEME SUPPORT

// Custom logo
add_theme_support( 'custom-logo' );###

// Post Thumbnails
function custom_theme_features() {
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'custom_theme_features' );

// Navigation Menus
function custom_navigation_menus() {

	$locations = array(
		'menu'    => 'Menu Principal',
		'top'     => 'Menu Top',
		'footer1' => 'Menu Footer1',
		'footer2' => 'Menu Footer2',
		'footer3' => 'Menu Footer3',
		'footer4' => 'Menu Footer4'
	);
	register_nav_menus( $locations );
}

add_action( 'init', 'custom_navigation_menus' );

// Ajouter le lien pour récupérer le mot de passe, si l'utilisateur ne s'en souvient plus
add_filter( 'login_form_bottom', 'lien_mot_de_passe_perdu' );
function lien_mot_de_passe_perdu( $formbottom ) {
	$formbottom .= '<a href="' . wp_lostpassword_url() . '">Mot de passe perdu ?</a>';

	return $formbottom;
}

// Modifier la taille de l'extrait
function strip_string( $chaine, $limit ) {
	$chaine       = strip_tags( $chaine );
	$tablo_mots   = explode( ' ', $chaine );
	$return_final = "";
	foreach ( $tablo_mots as $mot ) {
		if ( strlen( $return_final ) + strlen( $mot ) > $limit ) {
			$return_final .= '...';
			break;
		} else {
			if ( empty( $return_final ) ) {
				$return_final .= $mot;
			} else {
				$return_final .= ' ' . $mot;
			}
		}
	}

	return $return_final;
}

add_filter( 'excerpt_length', 'new_excerpt_length' );


//Nettoyer noms de fichiers avec caractères spéciaux
function super_sanitize_file_name( $filename ) {
	$sanitized_filename = remove_accents( $filename ); // Convert to ASCII
	// Standard replacements
	$invalid            = array(
		' '   => '-',
		'%20' => '-',
		'_'   => '-',
	);
	$sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
	$sanitized_filename = preg_replace( '/[^A-Za-z0-9-\. ]/', '', $sanitized_filename ); // Remove all non-alphanumeric except .
	$sanitized_filename = preg_replace( '/\.(?=.*\.)/', '', $sanitized_filename ); // Remove all but last .
	$sanitized_filename = preg_replace( '/-+/', '-', $sanitized_filename ); // Replace any more than one - in a row
	$sanitized_filename = str_replace( '-.', '.', $sanitized_filename ); // Remove last - if at the end
	$sanitized_filename = strtolower( $sanitized_filename ); // Lowercase

	return $sanitized_filename;
}

add_filter( 'sanitize_file_name', 'super_sanitize_file_name', 10, 1 );

/**
 * Ajout automatique des fichiers CSS & JS
 */
function styles_scripts_theme() {
	if ( is_dir( get_template_directory() . '/assets/css' ) ) {
		$allCSS  = array_diff( scandir( get_template_directory() . '/assets/css' ), array( '..', '.' ) );
		$counter = 1;
		foreach ( $allCSS as $singleCSS ) {
			if ( pathinfo( $singleCSS, PATHINFO_EXTENSION ) == "css" ) {
				wp_enqueue_style( 'style-' . $counter, get_template_directory_uri() . '/assets/css/' . $singleCSS, array(), '1.0.0', false );
				$counter ++;
			}
		}
	}
	if ( is_dir( get_template_directory() . '/assets/js' ) ) {
		$allJS   = array_diff( scandir( get_template_directory() . '/assets/js' ), array( '..', '.' ) );
		$counter = 1;
		foreach ( $allJS as $singleJS ) {
			if ( pathinfo( $singleJS, PATHINFO_EXTENSION ) == "js" ) {
				wp_enqueue_script( 'script-' . $counter, get_template_directory_uri() . '/assets/js/' . $singleJS, array(), '1.0.0', true );
				$counter ++;
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'styles_scripts_theme' );

//get_the_content mais avec le formatage html
function get_the_content_with_formatting( $more_link_text = '(more...)', $stripteaser = 0, $more_file = '' ) {
	$content = get_the_content( $more_link_text, $stripteaser, $more_file );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	return $content;
}

/* Register Sidebar sans les H2 */
register_sidebar( array(
	'id'            => 'sidebar',
	'name'          => 'Sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'before_title'  => '<div class="widgettitle">',
	'after_title'   => '</div>',
	'after_widget'  => '</div>',
) );

// Ajout d'une page d'options ACF
if ( function_exists( 'acf_add_options_page' ) ) {
	// Page principale
	acf_add_options_page( array(
		'page_title' => 'Options',
		'menu_title' => 'Options',
		'menu_slug'  => 'options-generales',
		'capability' => 'edit_posts',
		'redirect'   => true
	) );

	// Couleurs
	acf_add_options_sub_page( array(
		'page_title'  => 'Documents de location',
		'menu_title'  => 'Documents de location',
		'parent_slug' => 'options-generales',
		'icon_url'    => 'dashicons-admin-appearance'
	) );
}


//Multilingue
add_action( 'after_setup_theme', 'my_theme_setup' );
function my_theme_setup() {
	load_theme_textdomain( 'dh', get_template_directory() . '/languages' );
}


//Récupère le logo du site
function get_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imagelogo      = wp_get_attachment_image_src( $custom_logo_id, 'full' );

	return $imagelogo[0];
}
// Récupère le svg correspondant
function getsvg( $svg ) {
	$out = '';
	if ( $svg ) {
		$out = get_template_part( 'parts/svg/' . $svg );
	}
	return $out;
}

function get_img( $img ) {
	return bloginfo( 'template_url' ) . '/assets/img/' . $img;
}

function bandeau(){
	ob_start();
	get_template_part('parts/bandeau');
	return ob_get_clean();
}
add_shortcode('bandeau','bandeau');

