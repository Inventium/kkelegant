<?php

// http://themeshaper.com/forums/

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => true
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');


// From http://themeshaper.com/forums/topic/thematic-0976-is-online-important-release-notes
// Unleash the power of Thematic's dynamic classes
define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
define('THEMATIC_COMPATIBLE_FEEDLINKS', true);


function add_custom_logo() {?>
<a title="Katherine Kendall Salon and Spa" 
   href="<?php echo get_bloginfo('siteurl'); ?>">
  <img src="<?php echo get_stylesheet_directory_uri() ?>/images/kkbanner.png" 
       alt="Katherine Kendall Salon and Spa"/>
</a>
<?php

}



// Remove default Thematic actions
function remove_thematic_actions() {
	remove_action('thematic_header','thematic_blogtitle', 3);
	remove_action('thematic_header','thematic_blogdescription', 5);
  remove_action('thematic_header','thematic_access', 9);
}
add_action('init','remove_thematic_actions');
add_action('thematic_header','add_custom_logo', 3);
add_action('thematic_header','childtheme_page_menu', 9);



function billboard_shortcode($atts, $content=null) {

  extract(shortcode_atts(array("billboard" => ''), $atts));
  $billboard = <<<EOF
<div class="billboard">
$content    
</div>
EOF;
  return $billboard;
}
add_shortcode('billboard','billboard_shortcode');



function kk_create_product_type() {

  $supports = array(
  'thumbnail', 
  'custom-fields', 
  'excerpt', 
  'title', 
  'editor', 
  'revisions');
  
  $labels = array(
    'name'               => __('Products' ),
    'singular_name'      => __('Product' ),
    'add_new'            => __('Add Product'),
    'add_new_item'       => __('Add New Product'),
    'edit'               => __('Edit'),
    'edit_item'          => __('Edit Product'),
    'new_item'           => __('New Product'),
    'view'               => __('View Product'),
    'view_item'          => __('View Product'),
    'search_items'       => __('Search Products'),
    'not_found'          => __('No Products Found'),
    'not_found_in_trash' => __('No Products Found in Trash'),
    'parent'             => __('Parent Product')
  );
  
  register_post_type( 'product',
  array(
    'labels'        => $labels,
    'public'        => true,
    'has_archive'   => true,
    'description'   => "Products and other items published and available for sale",
    'menu_position' => 5,
    'taxonomies'    => array('post_tags'),
    'supports'      => $supports 
  )
  );
}
add_action( 'init', 'kk_create_product_type' );


function kk_create_brands() {

 $labels = array(
    'name'              => _x( 'Brands', 'taxonomy general name' ),
    'singular_name'     => _x( 'Brand', 'taxonomy singular name' ),
    'search_items'      => __( 'Brand' ),
    'all_items'         => __( 'All Brands' ),
    'parent_item'       => __( 'Parent Brand' ),
    'parent_item_colon' => __( 'Parent Brand:' ),
    'edit_item'         => __( 'Edit Brand' ),
    'update_item'       => __( 'Update Brand' ),
    'add_new_item'      => __( 'Add New Brand' ),
    'new_item_name'     => __( 'New Brand Name' ),
  );  

  register_taxonomy('brand','product',array(
    'hierarchical' => true,
    'labels' => $labels
  ));
}
add_action( 'init', 'kk_create_brands' );




function kk_create_service_type() {

  $supports = array(
    'thumbnail', 
    'custom-fields', 
    'excerpt', 
    'title', 
    'editor', 
    'revisions');
  

  register_post_type( 'service',
    array(
      'labels'        => array(
      'name'          => __('Services'),
      'singular_name' => __('Service'),
      'add_new'       => __('Add Service'),
      'add_new_item'  => __('Add New Service')
      ),
    'public'      => true,
    'has_archive' => true,
    'taxonomies'  => array('post_tag')
    )
  );
}
add_action( 'init', 'kk_create_service_type' );


/*
//customizar footer
function kk_footer($thm_footertext) {

  $thm_footertext = <<<EOF
<div>Copyright © 2009-[the-year] <a title="Katherine Kendall Salon & Spa" href="http://katherinekendall.com/">Katherine Kendall Salon & Spa</a> - All Rights Reserved - <a title="RSS" href="http://katherinekendall.com/feed/rss/">Entries (RSS)</a></div>
<div><a href="http://katherinekendall.com/terms-conditions/">Terms & Conditions</a> | <a href="http://katherinekendall.com/privacy-policy/">Privacy Policy</a> | <a href="http://katherinekendall.com/disclaimer">Disclaimer</a></div>
<br/>
<div>Some logos , images and products are under copyright owned by their respective owners</div><br/>
<div>Site by by <a href="http://inventiumsystems.com/">Inventium Systems</a>. Graphics by <a href="http://robertokoci.com/">Red Diamond Studio</a>.</div>
EOF;
  return $thm_footertext;
}
add_filter('thematic_footertext', 'kk_footer');
*/



define('KK_TEMPLATEPATH', get_theme_root() . '/kkelegant');

if (file_exists(KK_TEMPLATEPATH . '/kkshortcodes.php')) {
  include(KK_TEMPLATEPATH . '/kkshortcodes.php');
}


if (file_exists(KK_TEMPLATEPATH . '/kkoptions.php')) {
  include(KK_TEMPLATEPATH . '/kkoptions.php');
}


if (file_exists(KK_TEMPLATEPATH . '/kkmenu.php')) {
  include(KK_TEMPLATEPATH . '/kkmenu.php');
}

