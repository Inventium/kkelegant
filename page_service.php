<?php

/**
 * Template Name: Product Link Page
 */
    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();

?>

    <div id="container">
    
      <?php thematic_abovecontent(); ?>
    
      <div id="content">
  
              <?php
          
              // calling the widget area 'page-top'
              get_sidebar('page-top');
  
              the_post();
              
              thematic_abovepost();
          
              ?>
              
        <div id="post-<?php the_ID();
          echo '" ';
          if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
            post_class();
            echo '>';
          } else {
            echo 'class="';
            thematic_post_class();
            echo '">';
          }
            // creating the post header
            thematic_postheader();
          ?>

          <div class="entry-content">
            <?php the_content(); ?>
          </div><!-- .entry-content -->
        </div><!-- #post -->

          <?php
    global $wp_query;
    $bc = get_terms('brand');
    foreach($bc as $brand){
        echo '<div class="post taxonomy brand">';
        echo '<h2 class="entry_title">';        
        echo kk_format_link(get_term_link( $brand), $brand->name, '', ''); 
        echo '</h2>';
        echo '<div class="entry_content">';
        echo $brand->description;
        echo '</div></div>';
    }

          thematic_belowpost();
          // calling the widget area 'page-bottom'
          //get_sidebar('page-bottom');          
          ?>
  
      </div><!-- #content -->
      
      <?php thematic_belowcontent(); ?> 
      
    </div><!-- #container -->

<?php 

    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling the standard sidebar 
    thematic_sidebar();
    
    // calling footer.php
    get_footer();

?>