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
  //remove_action('thematic_header','thematic_access', 9);
}
add_action('init','remove_thematic_actions');
add_action('thematic_header','add_custom_logo', 3);
//add_action('thematic_header','childtheme_page_menu', 9);



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
    'taxonomies'  => array('post_tag'),
    'supports'    => $supports
    )
  );
}
add_action( 'init', 'kk_create_service_type' );



function remove_widgetized_area($content) {
  unset($content['Secondary Aside']);
  return $content;
}
add_filter('thematic_widgetized_areas', 'remove_widgetized_area');



//customizar footer
function kk_footer($thm_footertext) {

  $thm_footertext = <<<EOF
<div>Copyright © 2009-[the-year] <a title="Katherine Kendall Salon & Spa" href="http://katherinekendall.com/">Katherine Kendall Salon & Spa</a> - All Rights Reserved 
</div>
<div><a href="http://katherinekendall.com/terms-conditions/">Terms & Conditions</a> 
| <a href="http://katherinekendall.com/privacy-policy/">Privacy Policy</a> 
| <a href="http://katherinekendall.com/disclaimer">Disclaimer</a>. 
Some logos , images and products are under copyright owned by their respective owners. 
Site by by <a href="http://inventiumsystems.com/">Inventium Systems</a>.</div>
EOF;
  return $thm_footertext;
}
add_filter('thematic_footertext', 'kk_footer');

function kk_format_link($url, $anchor, $class = '', $title = '') {
    $link = <<<EOL
    <a href="$url" class="$class" title="$title">$anchor</a>
EOL;
    return $link;
}

define('KK_TEMPLATEPATH', get_theme_root() . '/kkelegant');

if (file_exists(KK_TEMPLATEPATH . '/kkshortcodes.php')) {
  include(KK_TEMPLATEPATH . '/kkshortcodes.php');
}


if (file_exists(KK_TEMPLATEPATH . '/kkoptions.php')) {
  include(KK_TEMPLATEPATH . '/kkoptions.php');
}

if (file_exists(KK_TEMPLATEPATH . '/kerastase-widget.php')) {
  include(KK_TEMPLATEPATH . '/kerastase-widget.php');
}

if (file_exists(KK_TEMPLATEPATH . '/kkmenu.php')) {
//  include(KK_TEMPLATEPATH . '/kkmenu.php');
}

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );


/****  Admin bar convenience ***/


/**
 * Checks if we should add links to the bar.
 */
function pbd_admin_bar_init() {
  // Is the user sufficiently leveled, or has the bar been disabled?
  if (!is_super_admin() || !is_admin_bar_showing() )
    return;
 
  // Good to go, lets do this!
  add_action('admin_bar_menu', 'pbd_admin_bar_links', 1000);
  add_action('admin_bar_menu', 'pbd_remove_default_links', 1000);
}

add_action('admin_bar_init', 'pbd_admin_bar_init');



/**
 * Adds links to the bar.
 */
function pbd_admin_bar_links() {

  global $wp_admin_bar;
  
  $adminurl = get_bloginfo('url');
  // Links to add, in the form: 'Label' => 'URL'
  $links = array(
    'Change haircut prices' => get_bloginfo('url') .'/wp-admin/themes.php?page=kkoptions.php#kkhaircuts',
    'Change waxing prices' => get_bloginfo('url') .'/wp-admin/themes.php?page=kkoptions.php#kkwaxing',
    'Change massage prices' => get_bloginfo('url') .'/wp-admin/themes.php?page=kkoptions.php#kkmassage',
    'Change face and body prices' => get_bloginfo('url') .'/wp-admin/themes.php?page=kkoptions.php#kkfaceandbody'
    );
  
    // Add the Parent link.
  $wp_admin_bar->add_menu( array(
    'title' => 'Salon Prices',
    'href' => false,
    'id' => 'pbd_links'
  ));
 
  /**
   * Add the submenu links.
   */
  foreach ($links as $label => $url) {
    $wp_admin_bar->add_menu( array(
      'title' => $label,
      'href' => $url,
      'parent' => 'pbd_links',
      'meta' => array('target' => '_blank')
    ));
  }

  $wp_admin_bar->add_menu(  array(
      'title' => 'News item',
      'href' => $adminurl . '/wp-admin/post-new.php',
      'parent' => 'new-content'
    ));
}


/**
 * Remove default admin links.
 */
function pbd_remove_default_links() {
  global $wp_admin_bar;
 
  /* Array of links to remove. Choose from:
  'my-account-with-avatar', 'my-account', 'my-blogs', 'edit', 'new-content', 'comments', 'appearance', 'updates', 'get-shortlink'
   */
  $remove = array('appearance', 'comments');
 
  if(empty($remove) )
    return;
 
  foreach($remove as $item) {
    $wp_admin_bar->remove_menu($item);  
  }

  $wp_admin_bar->remove_menu('new-plugin');
  $wp_admin_bar->remove_menu('new-media');
  $wp_admin_bar->remove_menu('new-link');
  $wp_admin_bar->remove_menu('new-user');
  $wp_admin_bar->remove_menu('new-theme');
  $wp_admin_bar->remove_menu('new-post');

}
  
  


