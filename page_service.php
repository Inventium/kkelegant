<?php

/**
 * Template Name: Service Link Page
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

          $args = array( 'post_type' => 'service');
          $the_query = new WP_Query( $args );
          // The Loop
          while ( $the_query->have_posts() ) : $the_query->the_post();
              echo '<h2>';
              echo kk_format_link(get_permalink( $brand), get_the_title(), '', '');
              echo '</h2>';
              echo '<div>';
              the_excerpt();
              echo '</div>';
          endwhile;
          wp_reset_postdata();

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