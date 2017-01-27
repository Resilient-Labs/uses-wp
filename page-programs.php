<?php
/**
 * Template Name: Programs Page
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

<section class="wrapper flexbox position">
    <?php
    //Set current page category
    $category = get_category(get_query_var('cat'), false);
    $cat_id = $category->cat_ID;
    // Query for all of the posts that have same category as the current page
    $args = array(
        // Arguments for your query.
        'category_name' => 'Programs'
    );
    // adds single text not looped
    $children = false;
    $adults = false;
    $seniors = false;
    // Custom query.
    $query = new WP_Query($args);
    // Check that we have query results.
    if ( $query->have_posts() ) {
        // Start looping over the query results.
        while ($query->have_posts()) {
            $query->the_post();
            if (has_tag('children-post')) {
              if (!$children){
                echo '<h3 class="title-children">Children</h3>';
                $children = true;
              }
                echo '<section class ="program-post children">';
                echo '<div class= "program-image">';
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
                        echo '<a href ="'.get_post_permalink().'">'.$aPics[0][$i].'</a>';
                    }
                }
                echo '</div>';
                echo '<div class= "program-content">';
                echo '<a href ="'.get_post_permalink().'">'.only_content().'</a>';
                echo '</div>';
                echo '</section >';
            }else if (has_tag('adults-post')) {
              if (!$adults){
                echo '<h3 class="title-adults">Adults</h3>';
                $adults = true;
              }
                echo '<section class ="program-post adults">';
                echo '<div class= "program-image">';
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
                        echo '<a href ="'.get_post_permalink().'">'.$aPics[0][$i].'</a>';
                    }
                }
                echo '</div>';
                echo '<div class= "program-content">';
                echo '<a href ="'.get_post_permalink().'">'.only_content().'</a>';
                echo '</div>';
                echo '</section>';
            }else if (has_tag('seniors-post')) {
      if (!$seniors){
        echo '<h3 class="title-seniors">Seniors</h3>';
        $seniors = true;
      }
        echo '<section  class ="program-post seniors">';
        echo '<div class= "program-image">';
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
                echo '<a href ="'.get_post_permalink().'">'.$aPics[0][$i].'</a>';
            }
        }
        echo '</div>';
        echo '<div class= "program-content">';
        echo '<a href ="'.get_post_permalink().'">'.only_content().'</a>';
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
