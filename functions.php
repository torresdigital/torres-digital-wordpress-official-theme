<?php /* Theme Name: 🌟Torres Digital®

Theme URI: https://www.facebook.com/torresdigital/

    Author: Torres Digital® | Sites → Lojas Virtuais e e-Commerce
    Author URI: https://www.facebook.com/torresdigital/

    Description: Somos uma Agência Gaúcha que trabalha com Desenvolvimento Web voltado para todos os Nichos do Mercado tais como os de insumos, commodities, pequenos, médios e grandes Lojistas que desejam alcançar mais Clientes através do e-Commerce: Sites, Aplicativos, Lojas Virtuais, Marketplaces, WordPress e Woocommerce, integrados com os Principais Cartões e Soluções de Pagamentos do Brasil e do Mundo; tais como Cielo, CyberSource, PagSeguro, Stripe, Vindi, MasterCard, Visa, American Express, outros.

    Torres Digital também conta com toda uma Equipe e um Know-how forte, amplo, e moderno e conceitual para a organização e criação de todo um Portifólio para Publicidade e Propaganda.

    www.torresdigital.tk * Menos é mais.

    Text Domain: torresdigital
    Template: torresdigital
    Version: 2.0 *//*

License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Tags: child theme, woocommerce
Text Domain: torresdigital
This theme, like WordPress, is licensed under the GPL. Use it to make something cool, have fun, and share what you’ve learned with others.  */

/*All Begin*/

/****
    * Chamando o Tema Pai * Quema Labs
    */

function child_shophistic_theme_enqueue_styles() {

    //First we load Bootstrap from parent, then parent styles and then child styles
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array( 'bootstrap' ) );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );

}
add_action( 'wp_enqueue_scripts', 'child_shophistic_theme_enqueue_styles' );


/****
    * Chamando o Logo
    ************************************/
function themename_custom_logo_setup() {
    $defaults = array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

function my_excerpt_length($length) {
    return 110;
}

/**
Once you've done that, your theme will be almost ready. The last preparation step is to tell the theme where you want the menus to show up. You do this in the relevant theme file. So, for example, we might want our header menu to be in header.php. So open up that file in the theme editor, and decide where you want to put your menu. The code to use here is wp_nav_menu which we will need once for each menu location. So, add this code -

        Display Menus on Theme
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

    */

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'top-menu' => __( 'Top Menu' ),
            'extra-menu' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );





/** REVISAR

wp_enqueue_script( 'my-responive-menu', get_template_directory_uri() . '/js/bigSlide.min.js', array(), '20161214', true );

**/




/**
 * Generate breadcrumbs
 * @author CodexWorld
 * @authorURL www.codexworld.com
 */
function get_breadcrumb() {
    echo ':: <a href="'.home_url().'" rel="nofollow">index</a> ::';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/**
    * Change the login page icon and URL to our site instead of WordPress.org
    */
add_filter( 'login_headerurl', 'xs_login_headerurl' );
function xs_login_headerurl( $url ) {
    return esc_url(  '/'  );
}
add_filter( 'login_headertitle', 'xs_login_headertitle' );
function xs_login_headertitle( $title ) {
    return get_bloginfo ( 'name' ) . ' – ' . get_bloginfo ( 'description' );
}


/* Outros */

/** Font Awesome, by Torres Digital */
function theme_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'my-child-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'child-style',
                     get_stylesheet_directory_uri() . '/style.css',
                     array( $parent_style )
                    );
}
    /** Font Awesome, by Torres Digital 2020 */
    add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

        function tthq_add_custom_fa_css() {
        wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}













/**
     * Order product collections by stock status, instock products first.
     * https://stackoverflow.com/questions/25113581/show-out-of-stock-products-at-the-end-in-woocommerce
     */
class iWC_Orderby_Stock_Status
{

    public function __construct()
    {
        // Check if WooCommerce is active
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            add_filter('posts_clauses', array($this, 'order_by_stock_status'), 2000);
        }
    }

    public function order_by_stock_status($posts_clauses)
    {
        global $wpdb;
        // only change query on WooCommerce loops
        if (is_woocommerce() && (is_shop() || is_product_category() || is_product_tag())) {
            $posts_clauses['join'] .= " INNER JOIN $wpdb->postmeta istockstatus ON ($wpdb->posts.ID = istockstatus.post_id) ";
            $posts_clauses['orderby'] = " istockstatus.meta_value ASC, " . $posts_clauses['orderby'];
            $posts_clauses['where'] = " AND istockstatus.meta_key = '_stock_status' AND istockstatus.meta_value <> '' " . $posts_clauses['where'];
        }
        return $posts_clauses;
    }
}

new iWC_Orderby_Stock_Status;


// CUSTOM ADMIN MENU LINK FOR ALL SETTINGS
function all_settings_link() {
    add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
}
add_action('admin_menu', 'all_settings_link');

// Carregando o jQuery a partir da CDN do Google

// even more smart jquery inclusion :)
add_action( 'init', 'jquery_register' );

// register from google and for footer
function jquery_register() {

    if ( !is_admin() ) {

        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' ), false, null, true );
        wp_enqueue_script( 'jquery' );
    }
}


/*teste de custom post type*/

    /*
Plugin Name: My Custom Post Types
Description: Add post types for movies and movie reviews
Author: Liam Carberry
*/

    // Hook <strong>lc_custom_post_movie()</strong> to the init action hook
    add_action( 'init', 'lc_custom_post_movie' );

// The custom function to register a movie post type
function lc_custom_post_movie() {

    // Set the labels, this variable is used in the $args array
    $labels = array(
        'name'               => __( 'Movies' ),
        'singular_name'      => __( 'Movie' ),
        'add_new'            => __( 'Add New Movie' ),
        'add_new_item'       => __( 'Add New Movie' ),
        'edit_item'          => __( 'Edit Movie' ),
        'new_item'           => __( 'New Movie' ),
        'all_items'          => __( 'All Movies' ),
        'view_item'          => __( 'View Movie' ),
        'search_items'       => __( 'Search Movies' ),
        'featured_image'     => 'Poster',
        'set_featured_image' => 'Add Poster'
    );

    // The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'Holds our movies and movie specific data',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'has_archive'       => true,
        'query_var'         => 'film'
    );

    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type( 'movie', $args);
}

// Hook <strong>lc_custom_post_movie_reviews()</strong> to the init action hook
add_action( 'init', 'lc_custom_post_movie_reviews' );

// The custom function to register a movie review post type
function lc_custom_post_movie_reviews() {

    // Set the labels, this variable is used in the $args array
    $labels = array(
        'name'               => __( 'Movie Reviews' ),
        'singular_name'      => __( 'Movie Review' ),
        'add_new'            => __( 'Add New Movie Review' ),
        'add_new_item'       => __( 'Add New Movie Review' ),
        'edit_item'          => __( 'Edit Movie Review' ),
        'new_item'           => __( 'New Movie Review' ),
        'all_items'          => __( 'All Movie Reviews' ),
        'view_item'          => __( 'View Movie Reviews' ),
        'search_items'       => __( 'Search Movie Reviews' )
    );

    // The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'Holds our movie reviews',
        'public'            => true,
        'menu_position'     => 6,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'has_archive'       => true
    );

    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // $args array goes in parameter 2.
    register_post_type( 'review', $args);
}



/**Filters excerpt  */

/*add_filter('excerpt_length', 'my_excerpt_length');
/*
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 600,
		'single_image_width'    => 600,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/****
    * Chamando o Tema Pai * v2
    *
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );



/****
    * Chamando o Tema Pai * v1
    *
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// even more smart jquery inclusion :)
add_action( 'init', 'jquery_register' );

// register from google and for footer
function jquery_register() {

if ( !is_admin() ) {

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' ), false, null, true );
    wp_enqueue_script( 'jquery' );
        }
    }


/* registrando scripts *
add_action("wp_enqueue_scripts", "scripts");
function myscripts() {
    wp_register_script('tdwct',
                        get_template_directory_uri() .'/js/scripts.js',   //
                        array ('jquery', 'jquery-ui'),                  //depends on these, however, they are registered by core already, so no need to enqueue them.
                        false, false);
    wp_enqueue_script('tdwct');

}

/****
    * Registrando Scripts v.2 *
    */

/* Registrando Scripts v.2 *
function my_enqueue_scripts()
{
    wp_register_script( 'first', get_template_directory_uri() . 'js/first.js' );

    wp_enqueue_script( 'second', get_template_directory_uri() . 'js/second.js', array( 'first' ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );

*/


/****
    * Registrando Scripts v.3 *
    */

/* Registrando Scripts v.3 *

function myscripts() {
    //get some external script that is needed for this script
    wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js');
    $script = get_template_directory_uri() . '/library/myscript.js';
    wp_register_script('myfirstscript',
                        $script,
                        array ('jquery', 'jquery-ui'),
                        false, false);
    //always enqueue the script after registering or nothing will happen
    wp_enqueue_script('fullpage-slimscroll');

}
add_action("wp_enqueue_scripts", "myscripts");




    /*

    function child_shophistic_theme_enqueue_styles() {

	//First we load Bootstrap from parent, then parent styles and then child styles
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array( 'bootstrap' ) );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'parent-style' ) );

    }
    add_action( 'wp_enqueue_scripts', 'child_shophistic_theme_enqueue_styles' );

    register_sidebar( array(
    'name' => 'Footer Sidebar 1',
    'id' => 'footer-sidebar-1',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 2',
    'id' => 'footer-sidebar-2',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 3',
    'id' => 'footer-sidebar-3',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
    register_sidebar( array(
    'name' => 'Footer Sidebar 4',
    'id' => 'footer-sidebar-4',
    'description' => 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );


    function my_login_logo_one() {  ?>
        <style type="text/css">
        body.login div#login h1 a {
            background-image: url(/wp-content/uploads/2018/10/logo-sites-torresdigital.png);
            background-size: 70%;
            width: 100%;
            height: 237px;
            text-align: center;
            position: relative;
            margin: 0 auto;
            left: 17px;
                                    }
        </style>
    <?php  } add_action( 'login_enqueue_scripts', 'my_login_logo_one' ); */


