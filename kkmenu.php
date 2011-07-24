<?php 

// customizing the menu bar //
 
// Recreate the Thematic Access with menu-primary and menu-secondary
function childtheme_page_menu() { 

/*
?>  
    <div id="access">
        <div class="skip-link"><a href="#content" title="<?php _e('Skip navigation to the content', 'thematic'); ?>"><?php _e('Skip to content', 'thematic'); ?></a></div>
        <?php wp_page_menu('exclude=124,118,128&menu_class=menu menu-primary'); ?>
        <div class="menu">
            <ul class="sf-menu sf-js-enabled sf-shadow">
                <?php wp_list_pages('title_li=&exclude=124,118,128'); ?>
            </ul>
        </div>
    </div><!-- #access -->
<?php 
*/
  // put the footer menu in
  $args = array(
    'theme_location'  => 'header-menu',
    'container'       => 'div', 
    'container_class' => 'menu_footer',
    'menu_id'         => 'footer-menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'depth'           => 1,
   );
   
  wp_nav_menu($args);


}


/**
 * These register_nav_menu callbacks add menus to the 
 * "Theme Locations" metabox in the Menus admin page.
 */
function register_services_menu() {
  register_nav_menu('services_menu', __('Services Menu'));
}
//add_action('init','register_services_menu');

function register_products_menu() {
  register_nav_menu('products_menu', __('Products Menu'));
}
//add_action('init','register_products_menu');

//remove_action('init','register_haircare_menu');
function register_haircare_menu() {

  register_nav_menu('haircare_menu', __('Hair Care Menu'));
}
//add_action('init','register_haircare_menu');


if (is_nav_menu('hair-care')) {
  //wp_delete_nav_menu('hair-care');
} 


//wp_create_nav_menu('Hair Care', array('slug' => 'hair-care'));
//wp_create_nav_menu('Hair Care');
//wp_create_nav_menu('Products');
//wp_create_nav_menu('Services');


/*
$kk_menu_haircare = wp_get_nav_menu_object('hair-care');
//echo "Hair Care id: ".$kk_menu_haircare->term_id;
$menu = array( 'menu-item-type' => 'custom', 'menu-item-url' => get_home_url('/'), 
               'menu-item-title' => 'Home', 'menu-item-status' => 'publish',
               'menu-item-description' => 'The Home menu.' );
$menu_item_db_id = wp_update_nav_menu_item( $kk_menu_haircare->term_id, 0, $menu );
//echo "menu_item_db_id: ".$menu_item_db_id;

*/

function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}
add_action( 'init', 'register_my_menus' );


?>