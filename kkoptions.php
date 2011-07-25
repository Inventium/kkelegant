<?php

$kk_options_file = 'kkoptions.php';


function kk_create_default_options() {
  
  $description = <<<EOD
hRecipe plugin for WordPress makes it easy 
to add search engine friendly formatting to 
your recipes and blog posts. If you find this
entry in your options table, and you do not 
have hRecipe installed, you may delete it.
If you intend on (re)installing hRecipe in 
the future, it should be safe to leave this
in your WordPress options table.
EOD;

  $url = <<<EOD
http://hrecipe.com/
EOD;

  $options = array ('description'        => $description,
                    'url'                => $url,
                    'womens_haircut'     => '50-70',
                    'mens_haircut'       => '50',
                    'color_touchup'      => '70',
                    'solid_color'        => '120',
                    'partialhilite'      => '115',
                    'fullhilite'         => '155',
                    'perm'               => '120',
                    'treatment'          => '35',
                    'washstyle'          => '45',
                    'updo'               => '75',
                    'browlashtint'       => '25 each',
                    'eyebrows'           => '20',
                    'eyebrowsupperlip'   => '30',
                    'brazilian'          => '65+',
                    'standardbikini'     => '35',
                    'extendedbikini'     => '45',
                    'fullleg'            => '70',
                    'lowerleg'           => '30',
                    'upperleg'           => '40',
                    'underarm'           => '20',
                    'fullarm'            => '30+',
                    'forearm'            => '20',
                    'lip'                => '12',
                    'chin'               => '12',
                    'fullface'           => '25',
                    'fullfaceeyebrow'    => '35+',
                    'upperback'          => '30',
                    'lowerback'          => '30',
                    'fullback'           => '60',
                    'chest'              => '40',
                    'massage90'          => '125',
                    'massage60'          => '80',
                    'massage30'          => '55',
                    'microzone30'        => '25',
                    'facial30'           => '55',
                    'facial60'           => '80',
                    'facial75'           => '90',
                    'back30'             => '60',
                    'bodymasque60'       => '95',
                    'bodyglow30'         => '60');
    
  return $options;
}

function kk_set_default_options() {
  
  $options = kk_create_default_options();
  update_option('kkelegant_options', $options);
} 


function kk_add_options() {
  
  // http://codex.wordpress.org/Function_Reference/get_option
  $options = get_option('kkelegant_options');
  
  if (false === $options) {
    kk_set_default_options();
  } else {
    //We have the current user-adjusted $options
    //Grab the default options, which may be extended from 
    //from version to version.
    $default_options = kk_create_default_options();
    //Make merged options using wp_parse_args
    $merged_options = wp_parse_args($options, $default_options);
    //Update the options table using merged options
    update_option('kkelegant_options', $merged_options);
  }
} 


/**
 * Administration page for handling pricing options.
 */

function kk_womens_haircut() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_womens_haircut' name='kkelegant_options[womens_haircut]' size='20' type='text' value='{$options['womens_haircut']}' />
  ";
}

function kk_mens_haircut() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_mens_haircut' name='kkelegant_options[mens_haircut]' size='20' type='text' value='{$options['mens_haircut']}' />
  ";
}

function kk_color_touchup() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_color_touchup' name='kkelegant_options[color_touchup]' size='20' type='text' value='{$options['color_touchup']}' />
  ";
}

function kk_solid_color() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_solid_color' name='kkelegant_options[solid_color]' size='20' type='text' value='{$options['solid_color']}' />
  ";
}

function kk_partial_hilite() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_partial_hilite' name='kkelegant_options[partialhilite]' size='20' type='text' value='{$options['partialhilite']}' />
  ";
}

function kk_full_hilite() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_full_hilite' name='kkelegant_options[fullhilite]' size='20' type='text' value='{$options['fullhilite']}' />
  ";
}

function kk_perm() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_perm' name='kkelegant_options[perm]' size='20' type='text' value='{$options['perm']}' />
  ";
}

function kk_treatment() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_treatment' name='kkelegant_options[treatment]' size='20' type='text' value='{$options['treatment']}' />
  ";
}

function kk_washstyle() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_washstyle' name='kkelegant_options[washstyle]' size='20' type='text' value='{$options['washstyle']}' />
  ";
}

function kk_updo() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_updo' name='kkelegant_options[updo]' size='20' type='text' value='{$options['updo']}' />
  ";
}

function kk_browlashtint() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_browlashtint' name='kkelegant_options[browlashtint]' size='20' type='text' value='{$options['browlashtint']}' />
  ";
}

function kk_eyebrows() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_eyebrows' name='kkelegant_options[eyebrows]' size='20' type='text' value='{$options['eyebrows']}' />
  ";
}

function kk_eyebrowsupperlip() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_eyebrowsupperlip' name='kkelegant_options[eyebrowsupperlip]' size='20' type='text' value='{$options['eyebrowsupperlip']}' />
  ";
}

function kk_brazilian() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_brazilian' name='kkelegant_options[brazilian]' size='20' type='text' value='{$options['brazilian']}' />
  ";
}

function kk_standardbikini() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_standardbikini' name='kkelegant_options[standardbikini]' size='20' type='text' value='{$options['standardbikini']}' />
  ";
}

function kk_extendedbikini() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_extendedbikini' name='kkelegant_options[extendedbikini]' size='20' type='text' value='{$options['extendedbikini']}' />
  ";
}

function kk_fullleg() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_fullleg' name='kkelegant_options[fullleg]' size='20' type='text' value='{$options['fullleg']}' />
  ";
}

function kk_lowerleg() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_lowerleg' name='kkelegant_options[lowerleg]' size='20' type='text' value='{$options['lowerleg']}' />
  ";
}

function kk_upperleg() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_upperleg' name='kkelegant_options[upperleg]' size='20' type='text' value='{$options['upperleg']}' />
  ";
}

function kk_underarm() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_underarm' name='kkelegant_options[underarm]' size='20' type='text' value='{$options['underarm']}' />
  ";
}

function kk_fullarm() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_fullarm' name='kkelegant_options[fullarm]' size='20' type='text' value='{$options['fullarm']}' />
  ";
}

function kk_forearm() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_forearm' name='kkelegant_options[forearm]' size='20' type='text' value='{$options['forearm']}' />
  ";
}

function kk_lip() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_lip' name='kkelegant_options[lip]' size='20' type='text' value='{$options['lip']}' />
  ";
}

function kk_chin() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_chin' name='kkelegant_options[chin]' size='20' type='text' value='{$options['chin']}' />
  ";
}

function kk_fullface() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_fullface' name='kkelegant_options[fullface]' size='20' type='text' value='{$options['fullface']}' />
  ";
}

function kk_fullfaceeyebrow() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_fullfaceeyebrow' name='kkelegant_options[fullfaceeyebrow]' size='20' type='text' value='{$options['fullfaceeyebrow']}' />
  ";
}

function kk_upperback() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_upperback' name='kkelegant_options[upperback]' size='20' type='text' value='{$options['upperback']}' />
  ";
}

function kk_lowerback() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_lowerback' name='kkelegant_options[lowerback]' size='20' type='text' value='{$options['lowerback']}' />
  ";
}

function kk_fullback() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_fullback' name='kkelegant_options[fullback]' size='20' type='text' value='{$options['fullback']}' />
  ";
}

function kk_chest() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_chest' name='kkelegant_options[chest]' size='20' type='text' value='{$options['chest']}' />
  ";
}

function kk_massage90() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_massage90' name='kkelegant_options[massage90]' size='20' type='text' value='{$options['massage90']}' />
  ";
}

function kk_massage60() {

  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_massage60' name='kkelegant_options[massage60]' size='20' type='text' value='{$options['massage60']}' />
  ";
}


function kk_massage30() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_massage30' name='kkelegant_options[massage30]' size='20' type='text' value='{$options['massage30']}' />
  ";
}


function kk_microzone30() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_microzone30' name='kkelegant_options[microzone30]' size='20' type='text' value='{$options['microzone30']}' />
  ";
}


function kk_facial30() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_facial30' name='kkelegant_options[facial30]' size='20' type='text' value='{$options['facial30']}' />
  ";
}

function kk_facial60() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_facial60' name='kkelegant_options[facial60]' size='20' type='text' value='{$options['facial60']}' />
  ";
}


function kk_facial75() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_facial75' name='kkelegant_options[facial75]' size='20' type='text' value='{$options['facial75']}' />
  ";
}


function kk_back30() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_back30' name='kkelegant_options[back30]' size='20' type='text' value='{$options['back30']}' />
  ";
}

function kk_bodymasque60() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_bodymasque60' name='kkelegant_options[bodymasque60]' size='20' type='text' value='{$options['bodymasque60']}' />
  ";
}

function kk_bodyglow30() {
  $options = get_option('kkelegant_options');
  echo "
  <input id='kk_bodyglow30' name='kkelegant_options[bodyglow30]' size='20' type='text' value='{$options['bodyglow30']}' />
  ";
}


function kk_haircut_text() {?>
function kk_haircut_text() {?>
<p>Some text here.</p>
<?php
}

function kk_register_mysettings() {

   global $kk_options_file;

   register_setting('kkelegant_options_group', 'kkelegant_options');

   add_settings_section('kkhaircuts', 'Hair Cuts', 'kk_haircut_section_text', $kk_options_file);
   add_settings_field('womens_haircut', "Women's hair cut" ,'kk_womens_haircut', $kk_options_file, 'kkhaircuts');
   add_settings_field('mens_haircut', "Men's hair cut" ,'kk_mens_haircut', $kk_options_file, 'kkhaircuts');
   add_settings_field('color_touchup', "Color Touch Up" ,'kk_color_touchup', $kk_options_file, 'kkhaircuts');
   add_settings_field('solid_color', "Solid Color" ,'kk_solid_color', $kk_options_file, 'kkhaircuts');
   add_settings_field('partial_hilite', "Partial Hi Lite" ,'kk_partial_hilite', $kk_options_file, 'kkhaircuts');
   add_settings_field('full_hilite', "Full Hi Lite" ,'kk_full_hilite', $kk_options_file, 'kkhaircuts');
   add_settings_field('perm', "Perm" ,'kk_perm', $kk_options_file, 'kkhaircuts');
   add_settings_field('treatment', "Treatment" ,'kk_treatment', $kk_options_file, 'kkhaircuts');
   add_settings_field('washstyle', "Wash & Style" ,'kk_washstyle', $kk_options_file, 'kkhaircuts');
   add_settings_field('updo', "Updo" ,'kk_updo', $kk_options_file, 'kkhaircuts');
   
   add_settings_section('kkwaxing', 'Waxing', 'kk_waxing_section_text', $kk_options_file);        
   add_settings_field('browlashtint', "Brow or lash tint" ,'kk_browlashtint', $kk_options_file, 'kkwaxing');
   add_settings_field('eyebrows', "Eyebrows" ,'kk_eyebrows', $kk_options_file, 'kkwaxing');
   add_settings_field('eyebrowsupperlip', "Eyebrows & upper lip" ,'kk_eyebrowsupperlip', $kk_options_file, 'kkwaxing');
   add_settings_field('brazilian', "Brazilian" ,'kk_brazilian', $kk_options_file, 'kkwaxing');
   add_settings_field('standardbikini', "Standard Bikini" ,'kk_standardbikini', $kk_options_file, 'kkwaxing');
   add_settings_field('extendedbikini', "Extended Bikini" ,'kk_extendedbikini', $kk_options_file, 'kkwaxing');
   add_settings_field('fullleg', "Full leg" ,'kk_fullleg', $kk_options_file, 'kkwaxing');
   add_settings_field('lowerleg', "Lower leg" ,'kk_lowerleg', $kk_options_file, 'kkwaxing');
   add_settings_field('upperleg', "Upper leg" ,'kk_upperleg', $kk_options_file, 'kkwaxing');
   add_settings_field('underarm', "Under arm" ,'kk_underarm', $kk_options_file, 'kkwaxing');
   add_settings_field('fullarm', "Full arm" ,'kk_fullarm', $kk_options_file, 'kkwaxing');
   add_settings_field('forearm', "Fore arm" ,'kk_forearm', $kk_options_file, 'kkwaxing');
   add_settings_field('lip', "Lip" ,'kk_lip', $kk_options_file, 'kkwaxing');
   add_settings_field('chin', "Chin" ,'kk_chin', $kk_options_file, 'kkwaxing');
   add_settings_field('fullface', "Full face" ,'kk_fullface', $kk_options_file, 'kkwaxing');
   add_settings_field('fullfaceeyebrow', "Full face & eyebrow" ,'kk_fullfaceeyebrow', $kk_options_file, 'kkwaxing');
   add_settings_field('upperback', "Upper back" ,'kk_upperback', $kk_options_file, 'kkwaxing');
   add_settings_field('lowerback', "Lower back" ,'kk_lowerback', $kk_options_file, 'kkwaxing');
   add_settings_field('fullback', "Full back" ,'kk_fullback', $kk_options_file, 'kkwaxing');
   add_settings_field('chest', "Chest" ,'kk_chest', $kk_options_file, 'kkwaxing');
      

   add_settings_section('kkmassage', 'Massages', 'kk_massage_section_text', $kk_options_file);
   add_settings_field('massage90', "Massage - 90 m" ,'kk_massage90', $kk_options_file, 'kkmassage');
   add_settings_field('massage60', "Massage - 60 m" ,'kk_massage60', $kk_options_file, 'kkmassage');
   add_settings_field('massage30', "Massage - 30 m" ,'kk_massage30', $kk_options_file, 'kkmassage');


   add_settings_section('kkfaceandbody', '', 'kk_faceandbody_text', $kk_options_file);
   add_settings_field('microzone30', "Microzone - 30 m" ,'kk_microzone30', $kk_options_file, 'kkfaceandbody');
   add_settings_field('facial30', "Facial - 30 m" ,'kk_facial30', $kk_options_file, 'kkfaceandbody');
   add_settings_field('facial60', "Facial - 60 m" ,'kk_facial60', $kk_options_file, 'kkfaceandbody');
   add_settings_field('facial75', "Facial - 75 m" ,'kk_facial75', $kk_options_file, 'kkfaceandbody');
   add_settings_field('back30', "Back - 30 m" ,'kk_back30', $kk_options_file, 'kkfaceandbody');
   add_settings_field('bodymasque60', "Body Masque - 60 m" ,'kk_bodymasque60', $kk_options_file, 'kkfaceandbody');
   add_settings_field('bodyglow30', "Body Glow - 30 m" ,'kk_bodyglow0', $kk_options_file, 'kkfaceandbody');

   //add_settings_section('kkspecialties', '', 'kk_specialties_text', $kk_options_file);
}

function kk_postbox_fields($id, $title, $content, $section) {
  global $kk_options_file;
?>

      <div id="<?php echo $id; ?>" class="postbox">
        <div class="handlediv" title="Click to toggle"><br /></div>
        <h3 class="hndle"><span><?php echo $title; ?></span></h3>
        <div class="inside kkelegant">
           <?php echo $content; ?>
           <table class="form-table">
             <?php //echo $kk_options_file ?>
             <?php do_settings_fields($kk_options_file, $section); ?>
          </table>
        </div>
      </div>
<?php   
}
  

function kk_haircut_section_text() {

  $sectiontext = <<<EOP
<p>
Set all your haircut prices here.
</p>
EOP;
  return $sectiontext;
}

function kk_waxing_section_text() {

  $sectiontext = <<<EOP
<p>
Set all your Waxing prices here.
</p>
EOP;
  return $sectiontext;
}

function kk_massage_section_text() {

  $sectiontext = <<<EOP
<p>
Set all your Massage prices here.
</p>
EOP;
  return $sectiontext;
}

function kk_facebody_section_text() {

  $sectiontext = <<<EOP
<p>
Set all your Face & Body prices here.
</p>
EOP;
  return $sectiontext;
}

function kk_specialties_section_text() {

  $sectiontext = <<<EOP
<p>
Set all your Specialties prices here.
</p>
EOP;
  return $sectiontext;
}




function kk_options_save_button() {
?>
  <p class="submit">
    <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
  </p>
<?php  
}

function kk_pricing_admin() {?>
  
  <div class="wrap">
    
    <?php if ( isset( $_GET['settings-updated'] ) ) {
               echo "<div class='updated'><p>Theme settings updated successfully.</p></div>";
    } ?>
          
    <?php if ( function_exists('screen_icon') ) screen_icon(); ?>
    
    <h2>Katherine Kendall Pricing</h2>
    
    <form method="post" action="options.php">
        <div class="metabox-holder">
          <div class="postbox-container" style="width: 50%;">
            <div class="meta-box-sortables ui-sortable">

               <?php 
                 wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
                 settings_fields('kkelegant_options_group'); $options = get_option('kkelegant_options');
                 wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false );

                 kk_postbox_fields('kkhaircuts', 'Hair Cuts', kk_haircut_section_text(), 'kkhaircuts'); 
                 kk_options_save_button();
                 kk_postbox_fields('kkwaxing', 'Waxing', kk_waxing_section_text(), 'kkwaxing'); 
                 kk_options_save_button();
                 kk_postbox_fields('kkmassage', 'Massage', kk_massage_section_text(), 'kkmassage'); 
                 kk_options_save_button();
                 kk_postbox_fields('kkfaceandbody', 'Face and body', kk_facebody_section_text(), 'kkfaceandbody'); 
                 kk_options_save_button();
                 //kk_postbox_fields('kkspecialties', 'Specialties', kk_specialties_section_text(), 'kkspecialties');
                 //kk_options_save_button();
               ?>

            </div>
          </div>
       </div>   
       
    </form>
  </div><!--.wrap-->
<?php  
}


function kk_admin_init() {
 
  wp_enqueue_style('dashboard');
  wp_enqueue_style('wp-admin');
  wp_enqueue_script('postbox');
  wp_enqueue_script('dashboard');
}

function add_theme_admin() {
  
  //$pagenow = add_theme_page("KK Pricing", "KK Pricing", 'edit_themes', basename(__FILE__), 'kk_pricing_admin');
  $pagehook = add_theme_page("KK Pricing", "KK Pricing", 'administrator', basename(__FILE__), 'kk_pricing_admin');
  add_action('load-'.$pagehook,'kk_admin_init');
  //echo $pagenow;
}

add_action('admin_menu','add_theme_admin');
add_action('admin_init','kk_register_mysettings');
add_action('admin_init','kk_add_options');
//add_action('admin_init','kk_admin_init');

?>