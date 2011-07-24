<?php

$kk_options_file = 'themes.php?page=smalloptions.php';


function kk_create_default_options_small() {

  $options = array ('womens_haircut'     => '50-70',
                    'mens_haircut'       => '60'
                   );
    
  return $options;
}

function kk_set_default_options_small() {
  
  $options = kk_create_default_options_small();
  update_option('kkelegant_options_small', $options);
} 


function kk_add_options_small() {
  
  $options = get_option('kkelegant_options_small');
  
  if (false === $options) {
    kk_set_default_options_small();
  } else {
    $default_options = kk_create_default_options_small();
    $merged_options = wp_parse_args($options, $default_options);
    update_option('kkelegant_options_small', $merged_options);
  }
} 

function kk_mens_haircut_small() {

  $options = get_option('kkelegant_options_small');
  echo "
  <input id='kk_mens_haircut' name='kkelegant_options_small[mens_haircut]' size='20' type='text' value='{$options['mens_haircut']}' />
  ";
}

function kk_haircut_text_small() {?>
<p>Some text here.</p>
<?php
}

function kk_register_mysettings_small() {

   global $kk_options_file;

   register_setting('kkelegant_options_group_small', 'kkelegant_options_small');
   add_settings_section('kkhaircuts', 'Hair Cuts', 'kk_haircut_text_small', $kk_options_file);
   add_settings_field('mens_haircut', "Men's hair cut" ,'kk_mens_haircut_small', $kk_options_file, 'kkhaircuts');        
}

function kk_postbox_fields_small($id, $title, $content, $section) {
  global $kk_options_file;
?>

      <div id="<?php echo $id; ?>" class="postbox">
        <div class="handlediv" title="Click to toggle"><br /></div>
        <h3 class="hndle"><span><?php echo $title; ?></span></h3>
        <div class="inside smalloptions">
           <?php echo $content; ?>
           <table class="form-table">
             <?php echo $kk_options_file ?>
             <?php do_settings_fields($kk_options_file, $section); ?>
          </table>
        </div>
      </div>
<?php   
}
  
 

/**
 * The problem here is that using options.php
 * will get the options saved, but it doesn't
 * redirect back to the correct page afterwards.
 * Will have to cut this down further and use the 
 * do_settings stuff, kill the postbox. 
 */ 
function kk_pricing_admin_small() {?>
  
  <?php global $kk_options_file; ?>
  
  <div class="wrap">
              
    <h2>Katherine Kendall Pricing Small</h2>
    
    <!--form method="post" action="themes.php?page=<?php echo $kk_options_file ?>"-->
    <form method="post" action="options.php">

        <div class="metabox-holder">
          <div class="postbox-container" style="width: 50%;">
            <div class="meta-box-sortables ui-sortable">

              <?php //wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false ); ?>
              <?php settings_fields('kkelegant_options_group_small'); $options = get_option('kkelegant_options_small');?>
              <?php //wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>
                
              <?php kk_postbox_fields_small('kkhaircuts', 'Hair Cuts', 'Foo bar', 'kkhaircuts'); ?>
                    
              <p class="submit">
                <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
              </p>
            </div>
          </div>
       </div>   
       
    </form>
  </div><!--.wrap-->
<?php  
}


function kk_admin_init_small() {
 
  wp_enqueue_style('dashboard');
  wp_enqueue_style('wp-admin');
  wp_enqueue_script('postbox');
  wp_enqueue_script('dashboard');
}

function kk_add_theme_admin_small() {
  
  global $kk_options_file;
  
  $pagenow = add_theme_page("KK Pricing", "KK Pricing", 'edit_themes', basename(__FILE__), 'kk_pricing_admin_small');
  //$pagenow = add_theme_page("KK Small Options", "KK Small Options", 'administrator', $kk_options_file, 'kk_pricing_admin_small');
  echo $pagenow;
}

add_action('admin_menu','kk_add_theme_admin_small');
add_action('admin_init','kk_register_mysettings_small');
add_action('admin_init','kk_add_options_small');
add_action('admin_init','kk_admin_init_small');

?>