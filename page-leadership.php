<?php
/**
 * Template Name: Leadership Page
*
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package United_South_End_Settlements
 */

get_header();

?>
<div class="secondary-menu">
<?php
$ThirdMenu = array(
    'menu'=> 'Third Menu',
    'container'       => false,
    'container_class' => false,
    'menu_class' => false,
);
wp_nav_menu($ThirdMenu);
?>
</div>

<section class="main-container wrapper flexbox position">
    <?php
    //Set current page category
    $category = get_category(get_query_var('cat'), false);
    $cat_id = $category->cat_ID;
    // Query for all of the posts that have same category as the current page
    $args = array(
        // Arguments for your query.
        'category_name' => 'Leadership'
    );
    // adds single text not looped
    $ceo = false;
    $staff = false;
    // Custom query.
    $query = new WP_Query($args);
    // Check that we have query results.
    if ( $query->have_posts() ) {
        // Start looping over the query results.
        while ($query->have_posts()) {
            $query->the_post();
            if (has_tag('president-post')) {
              if (!$ceo){
                echo '<h3 class="ceo">President and CEO</h3>';
                $ceo = true;
              }
                echo '<section class ="president-ceo">';
                echo '<div class= "president-image">';
                $szPostContent = $post->post_content;
                $szSearchPattern = '~<img [^\>]*\ />~';

                // Run preg_match_all to grab all the images and save the results in $aPics
                preg_match_all( $szSearchPattern, $szPostContent, $aPics );

                // Check to see if we have at least 1 image
                $iNumberOfPics = count($aPics[0]);

                if ( $iNumberOfPics > 0 ) {
                    // Now here you would do whatever you need to do with the images
                    // For this example the images are just displayed
                    for ( $i=0; $i < $iNumberOfPics ; $i++ ) {
                        echo $aPics[0][$i];
                    }
                }
                echo '</div>';
                echo '<div class= "staff-content">';
                echo only_content();
                echo '</div>';
                echo '</section >';
              }else if (has_tag ('president-content')){
                echo '<section class ="president-content">';
                echo '<div>';
                echo the_content();
                echo '</div>';
                echo '</section >';
              }else if (has_tag('staff-post')) {
                if (!$staff){
                  echo '<h3 class="staff-title">Leadership Team</h3>';
                  $staff = true;
                }
                  echo '<section class ="staff">';
                  echo '<div class= "staff-image">';
                  $szPostContent = $post->post_content;
                  $szSearchPattern = '~<img [^\>]*\ />~';

                  // Run preg_match_all to grab all the images and save the results in $aPics
                  preg_match_all( $szSearchPattern, $szPostContent, $aPics );

                  // Check to see if we have at least 1 image
                  $iNumberOfPics = count($aPics[0]);

                  if ( $iNumberOfPics > 0 ) {
                      // Now here you would do whatever you need to do with the images
                      // For this example the images are just displayed
                      for ( $i=0; $i < $iNumberOfPics ; $i++ ) {
                          echo $aPics[0][$i];
                      }
                  }
                  echo '</div>';
                  echo '<div class= "staff-content">';
                  echo only_content();
                  echo '</div>';
                  echo '</section >';
                }else if(has_tag('board-post')){
                  echo '<section class ="board-post">';
                  echo '<div>';
                  echo the_content();
                  echo '</div>';
                  echo '</section >';
                }
            }
          }

          // Restore original post data.
          wp_reset_postdata();
          ?>
      </section>

      <?php get_footer(); ?>
