<?php

/////// XHR

add_action('admin_menu', 'test_add_theme_page');

function test_add_theme_page() {
  if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {

    add_action('admin_head', 'test_theme_page_head');
  }
  add_theme_page(__('Test Admin'), __('Test Admin'), 'edit_themes', basename(__FILE__), 'test_theme_page');
}

 

function test_theme_page_head() {
?>

    <script type="text/javascript">
  jQuery(document).ready(function($) {

    jQuery('form#test_form').submit(function() {
      var data = jQuery(this).serialize();
      jQuery.post(ajaxurl, data, function(response) {
        if(response == 1) {
          show_message(1);
          t = setTimeout('fade_message()', 2000);
        } else {
          show_message(2);
          t = setTimeout('fade_message()', 2000);
        }
      });
      return false;
    });

  });

  function show_message(n) {
    if(n == 1) {
      jQuery('#saved').html('<div id="message" class="updated fade"><p><strong><?php _e('Options saved.'); ?></strong></p></div>').show();
    } else {
      jQuery('#saved').html('<div id="message" class="error fade"><p><strong><?php _e('Options could not be saved.'); ?></strong></p></div>').show();
    }
  }

  function fade_message() {
    jQuery('#saved').fadeOut(1000);
    clearTimeout(t);
  }
  </script>

<?php
}



function test_theme_page() {
?>

<div class="wrap">
  <h2><?php _e('Test Admin'); ?></h2>

    <div id="saved"></div>
    <?php $options = get_option('test_theme'); ?>
    <form action="/" name="test_form" id="test_form">
      <input type="text" name="test_text" value="<?php echo $options['test_text']; ?>" /><br />
        <input type="checkbox" name="test_check" <?php echo ($options['test-check'] == 'on') ? 'checked' : ''; ?> /><br />
        <input type="hidden" name="action" value="test_theme_data_save" />
        <input type="hidden" name="security" value="<?php echo wp_create_nonce('test-theme-data'); ?>" />
        <input type="submit" value="Submit" />
    </form>

</div>

<?php
}


function test_theme_save_ajax() {

  check_ajax_referer('test-theme-data', 'security');

  $data = $_POST;
  unset($data['security'], $data['action']);

  if(!is_array(get_option('test_theme'))) {
    $options = array();
  } else {
    $options = get_option('test_theme');
  }

  if(!empty($data)) {
    $diff = array_diff($options, $data);
    $diff2 = array_diff($data, $options);
    $diff = array_merge($diff, $diff2);
  } else {
    $diff = array();
  }

  if(!empty($diff)) {
    if(update_option('test_theme', $data)) {
      die('1');
    } else {
      die('0');
    }
  } else {
    die('1');
  }
}
add_action('wp_ajax_test_theme_data_save', 'test_theme_save_ajax');

/////// XHR
?>