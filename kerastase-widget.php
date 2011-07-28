<?php
/*
 * Plugin name: Karestase Widget
 * Plugin URI: http://katherinekendall.com/
 * Description: Plugin file Karestase image Widget.
 * Version: 0.1
 * Author: Dave Doolin
 * Author URI: http://dool.in/
 */

// Codex: http://codex.wordpress.org/Widgets_API#Developing_Widgets
if (!class_exists('kerastase_widget')) {

  class kerastase_widget extends WP_Widget {


  /* FIXME: These class and id names are broken. */
    var $css_class        = 'Karestase_widget';
    var $base_id          = 'Karestase_widget';

    var $description      = 'Displays Kerastase image in sidebar widget';
    var $name             = 'Kerastase Widget';
    var $default_title    = 'Karestase Widget';


    function kerastase_widget() {

      $widget_ops = array('classname' => $this->css_class, 
                          'description' => $this->description);
      $this->WP_Widget($this->base_id, $this->name, $widget_ops);
      add_action('display-related-links', array($this, 'display'));
    }


    /* This is the code that gets displayed on the UI side,
     * what readers see.
     */
    function widget($args, $instance) {

      extract($args, EXTR_SKIP);
      echo $before_widget;
      $title = (empty($instance['title'])) ? $this->default_title : apply_filters('widget_title', $instance['title']); 
      echo $before_title . $title . $after_title; 
      do_action('display-related-links');
      echo $after_widget;
    }


    function display() {
      
      $themeroot = get_bloginfo('stylesheet_directory');
      $display = <<<EOD
      <img src="$themeroot/images/Kerastase-Reflection09.jpg" />
      <p>Katherine Kendall is a registered Kerastase salon.</p>
EOD;
      echo $display;
    }

    function update($new_instance, $old_instance) {
      
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      return $instance;
    }


    /* Back end, the interface shown in Appearance -> Widgets
     * administration interface.
     */
    function form($instance) {

      $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'demotext' => '' ) );

      $title    = esc_attr(strip_tags($instance['title']));
      $title_id = $this->get_field_id('title');
      $title_name = $this->get_field_name('title');
 
      echo "<p>";
      echo $this->text_input_instance($instance, 'title', 'Title');
      echo "</p>";
    }


    // Clean everything up...
    function text_input_instance($instance, $key, $label) {

      $value    = esc_attr(strip_tags($instance[$key]));    
      $id = $this->get_field_id($key);
      $name = $this->get_field_name($key);
      return $this->text_input($id, $name, $value, $label);
    }


    // This is where overloading would be real handy...
    function text_input($id, $name, $value, $label) {

      $input = <<<EOI
      <label for="$id">$label: 
        <input class="widefat" id="$id" name="$name" type="text" value="$value" />
      </label>
EOI;
      return $input;
    }

  } // Close class definition...



  function kerastase_widget_init() {
    // http://codex.wordpress.org/Function_Reference/register_widget
    register_widget('kerastase_widget');
  }
  add_action('widgets_init', 'kerastase_widget_init');

} // class_exists()...


?>
