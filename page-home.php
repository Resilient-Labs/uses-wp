<?php
/**
 * Template Name: Home Page
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

<section class="home-page">
<?php
  //Set current page category
  $category = get_category(get_query_var('cat'), false);
  $cat_id = $category->cat_ID;
  // Query for all of the posts that have same category as the current page
  $args = array(
    // Arguments for your query.
    'category_name' => 'Home'
  );
  // Custom query.
  $query = new WP_Query($args);
  if ( $query->have_posts() ) {
    // Start looping over the query results.
    while ($query->have_posts()) {
      $query->the_post();
      if (has_tag('why-home-content')) {
        echo '<section class="top-container">';
        echo '<div class="gray-accent"></div>';
        echo '<div class="why-home-content">';
        echo the_content();
        echo '</div>';
        echo '</section>';
      }else if (has_tag('how-home-content')) {
        echo '<section class="middle-container">';
        echo '<div class="gray-accent"></div>';
        echo '<div class="home-image">';
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
        echo '<div class="home-post">';
        echo only_content();
        echo '</div>';
        echo '</section>';
    }else if (has_tag('what-home-content')) {
        echo '<section class="bottom-container home-image-position">';
        echo '<div class="gray-accent"></div>';
        echo '<div class="home-image">';
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
        echo '<div class="home-post">';
        echo only_content();
        echo '</div>';
        echo '</section>';
      }
    }
}


  // Restore original post data.
  wp_reset_postdata();
  ?>
</section>
<?php get_footer(); ?>
