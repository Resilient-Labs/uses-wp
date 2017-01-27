<?php
/**
 * Template Name: News & Events Page
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

<section class="main-container news wrapper flex-side">
    <?php
    //Set current page category
    $category = get_category(get_query_var('cat'), false);
    $cat_id = $category->cat_ID;
    // Query for all of the posts that have same category as the current page
    $args = array(
        // Arguments for your query.
        'category_name' => 'News'
    );
    // adds single text not looped
    $news = false;
    $events = false;
    $blog = false;
    // Custom query.
    $query = new WP_Query($args);
    // Check that we have query results.
    if ( $query->have_posts() ) {
        // Start looping over the query results.
        while ($query->have_posts()) {
            $query->the_post();
            if (has_tag('news-post')) {
              if (!$news){
                echo '<h3 class="title-news">News</h3>';
                $news = true;
              }
                echo '<section class ="news-post">';
                echo '<div class= "news-image">';
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
                echo '<div class= "news-content">';
                echo '<a href ="'.get_post_permalink().'">'.only_content().'</a>';
                echo '</div>';
                echo '</section >';
            }else if (has_tag('events-post')) {
              if (!$events){
                echo '<h3 class="title-news">Events</h3>';
                $events = true;
              }
                echo '<section class ="news-post">';
                echo '<div class= "news-image">';
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
                echo '<div class= "news-content">';
                echo '<a href ="'.get_post_permalink().'">'.only_content().'</a>';
                echo '</div>';
                echo '</section>';
            }else if (has_tag('blog-post')) {
      if (!$blog){
        echo '<h3 class="title-news">Blog</h3>';
        $blog = true;
      }
        echo '<section  class ="news-post">';
        echo '<div class= "news-image">';
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
        echo '<div class= "news-content">';
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
